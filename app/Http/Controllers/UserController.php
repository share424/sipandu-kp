<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'hp' => 'required',
            'no_identitas' => 'required',
            'alamat' => 'required',
            'role' => 'required|in_array:'.Role::SUPER_ADMIN.','.Role::UPTD.','.Role::ADMIN_BIDANG.','.Role::KEPALA_DINAS.','.Role::USER,
        ]);

        // user can't create user
        if (auth()->user()->isUser()) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki hak akses untuk membuat user']);
        }

        // only super admin can create super admin
        if (!auth()->user()->isSuperAdmin() && $request->role == Role::SUPER_ADMIN) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki hak akses untuk membuat super admin']);
        }

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'hp' => 'required',
            'no_identitas' => 'required',
            'role' => [
                'required',
                function($attribute, $value, $fail) {
                    if (!in_array($value, Role::availableRoles())) {
                        return $fail('Role tidak valid');
                    }
                },
            ],
            'alamat' => 'required',
        ]);

        $user = User::findOrFail($id);
        
        // user only can update their own profile
        if (auth()->user()->isUser() && auth()->user()->id != $user->id) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki hak akses untuk mengubah data user']);
        }

        // only superadmin can update himself
        if (auth()->user()->isSuperAdmin() && auth()->user()->id == $user->id) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki hak akses untuk mengubah data user']);
        }

        if ($user->isSuperAdmin()) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki hak akses untuk mengubah data user']);
        }

        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'hp' => $request->hp,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Super Admin tidak bisa dihapus');
        }
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
