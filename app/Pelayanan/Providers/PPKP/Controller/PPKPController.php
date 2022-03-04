<?php

namespace App\Pelayanan\Providers\PPKP\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PPKPController extends Controller
{
    public function index()
    {
        Log::debug('test');
        return 'Hello';
    }
}