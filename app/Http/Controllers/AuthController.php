<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->route('auth.index')->withErrors(['msg' => 'Email atau password salah']);
    }

    public function signup(Request $request)
    {
        return view('auth.signup');
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'hp' => 'required',
            'no_identitas' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole('user');

        return redirect()->route('auth.index')->with('msg', 'User berhasil dibuat, Silahkan cek email untuk verifikasi akun anda');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.index');
    }
}
