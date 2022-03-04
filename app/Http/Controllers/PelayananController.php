<?php

namespace App\Http\Controllers;

use App\Pelayanan\Facades\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanan = Pelayanan::getAllPelayanan();

        return view('pelayanan.index', compact('pelayanan'));
    }
}
