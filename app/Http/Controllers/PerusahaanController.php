<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        // ambil user yang login saat ini
        $user = auth()->user();
        // ambil data perusahaan untuk user yg login saat ini
        $perusahaan = $user->perusahaan->first();

        // jika perusahaanya belum dibuat, maka tendang dia
        // ke halaman buat perusahaan
        if (!$perusahaan) {
            return redirect()->route('perusahaan.create');
        }
        return view('perusahaan.index', compact('perusahaan'));
    }

    public function masterIndex()
    {
        $perusahaan = Perusahaan::all();
        return view('perusahaan.master-index', compact('perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required|string',
            'nama_pemilik' => 'required|string',
            'website' => '',
            'npwp' => 'required|numeric',
            'alamat_perusahaan' => 'required|string'
        ]);

        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_pemilik' => $request->nama_pemilik,
            'website' => $request->website,
            'npwp' => $request->npwp,
            'alamat_perusahaan' => $request->alamat_perusahaan
        ]);

        // ambil user yg login saat ini
        $user = auth()->user();

        // hubungkan dengan perusahaanya
        $user->perusahaan()->sync([$perusahaan->id]);

        return redirect()->route('perusahaan.index');
    }
}
