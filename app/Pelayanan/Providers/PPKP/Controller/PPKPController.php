<?php

namespace App\Pelayanan\Providers\PPKP\Controller;

use App\Http\Controllers\Controller;
use App\Models\Kapal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PPKPController extends Controller
{
    public function index()
    {
        $kapal = auth()->user()->kapal;
        return view('pelayanan.ppkp.pilih-kapal', compact('kapal'));
    }

    public function form(Request $request, $id)
    {
        $kapal = Kapal::findOrFail($id);
        $user = $kapal->user->first();
        if ($user->id != auth()->user()->id) {
            throw new NotFoundHttpException('Halaman tidak ditemukan');
        }
        return view('pelayanan.ppkp.form', compact('kapal'));
    }
}