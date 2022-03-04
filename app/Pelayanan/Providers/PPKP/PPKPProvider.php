<?php

namespace App\Pelayanan\Providers\PPKP;

use App\Pelayanan\PelayananProvider;

class PPKPProvider extends PelayananProvider
{

    public function __construct()
    {
        $this->nama = 'PERSETUJUAN PENGADAAN KAPAL PERIKANAN (PPKP)';
        $this->type = PelayananProvider::PELAYANAN_GRATIS;
        $this->namespace = 'App\Pelayanan\Providers\PPKP\Controller';
        $this->slug = 'PPKP';
        $this->home = 'pelayanan.ppkp.index';
    }

}