<?php

namespace App\Http\Controllers;

use App\Models\BahanKapal;
use App\Models\Kapal;
use App\Models\TipeKapal;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT * FROM kapal INNER JOIN user_kapal ON kapal.id = user_kapal.id_kapal INNER JOIN users ON user_kapal.id_user = users.id WHERE users.id = 1
        $kapal = auth()->user()->kapal;
        return view('kapal.index', compact('kapal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe_kapal = TipeKapal::all();
        $bahan_kapal = BahanKapal::all();
        return view('kapal.create', compact('tipe_kapal', 'bahan_kapal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kapal' => 'string',
            'tipe_kapal' => 'required',
            'bahan_kapal' => 'required',
            'merk' => 'required',
            'ukuran' => 'required',
            'lebar' => 'required',
            'panjang' => 'required',
            'dalam' => 'required',
            'tempat_pembuatan' => 'required',
            'tahun_pembuatan' => 'required',
            'tempat_pendaftaran' => 'required',
            'loa' => 'required',
            'nomor_mesin' => 'required',
            'merk_mesin' => 'required',
            'tipe_mesin' => 'required',
            'daya_mesin' => 'required',
            'akta' => 'required',
            'jumlah_palka' => 'required',
            'tanda_pengenal_kapal' => 'required',
            'gt' => 'required|numeric',
            'nt' => 'required|numeric',
            'nama_kapal_sebelum' => ''
        ]);
        // dd($request->all());
        $kapal = Kapal::create([
            'nama_kapal' => $request->nama_kapal,
            'merk_kapal' => $request->merk,
            'ukuran_kapal' => $request->ukuran,
            'lebar_kapal' => $request->lebar,
            'panjang_kapal' => $request->panjang,
            'dalam_kapal' => $request->dalam,
            'tempat_pembuatan' => $request->tempat_pembuatan,
            'loa' => $request->loa,
            'nomor_mesin' => $request->nomor_mesin,
            'merk_mesin' => $request->merk_mesin,
            'tipe_mesin' => $request->tipe_mesin,
            'daya_mesin' => $request->daya_mesin,
            'grosse_akta' => $request->akta,
            'jumlah_palka' => $request->jumlah_palka,
            'tanda_pengenal_kapal' => $request->tanda_pengenal_kapal,
            'gt' => $request->gt,
            'nt' => $request->nt,
            'nama_kapal_sebelum' => $request->nama_kapal_sebelum,
            'id_tipe_kapal' => $request->tipe_kapal,
            'id_bahan_kapal' => $request->bahan_kapal,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'tempat_pendaftaran' => $request->tempat_pendaftaran,
        ]);

        $user = auth()->user();
        $user->kapal()->attach($kapal->id);

        return redirect()->route('kapal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kapal' => 'string',
            'tipe_kapal' => 'required',
            'bahan_kapal' => 'required',
            'merk' => 'required',
            'ukuran' => 'required',
            'lebar' => 'required',
            'panjang' => 'required',
            'dalam' => 'required',
            'tempat_pembuatan' => 'required',
            'tahun_pembuatan' => 'required',
            'tempat_pendaftaran' => 'required',
            'loa' => 'required',
            'nomor_mesin' => 'required',
            'merk_mesin' => 'required',
            'tipe_mesin' => 'required',
            'daya_mesin' => 'required',
            'akta' => 'required',
            'jumlah_palka' => 'required',
            'tanda_pengenal_kapal' => 'required',
            'gt' => 'required|numeric',
            'nt' => 'required|numeric',
            'nama_kapal_sebelum' => ''
        ]);

        $kapal = Kapal::findOrFail($id);
        $kapal->update([
            'nama_kapal' => $request->nama_kapal,
            'merk_kapal' => $request->merk,
            'ukuran_kapal' => $request->ukuran,
            'lebar_kapal' => $request->lebar,
            'panjang_kapal' => $request->panjang,
            'dalam_kapal' => $request->dalam,
            'tempat_pembuatan' => $request->tempat_pembuatan,
            'loa' => $request->loa,
            'nomor_mesin' => $request->nomor_mesin,
            'merk_mesin' => $request->merk_mesin,
            'tipe_mesin' => $request->tipe_mesin,
            'daya_mesin' => $request->daya_mesin,
            'grosse_akta' => $request->akta,
            'jumlah_palka' => $request->jumlah_palka,
            'tanda_pengenal_kapal' => $request->tanda_pengenal_kapal,
            'gt' => $request->gt,
            'nt' => $request->nt,
            'nama_kapal_sebelum' => $request->nama_kapal_sebelum,
            'id_tipe_kapal' => $request->tipe_kapal,
            'id_bahan_kapal' => $request->bahan_kapal,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'tempat_pendaftaran' => $request->tempat_pendaftaran,
        ]);

        return redirect()->route('kapal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
