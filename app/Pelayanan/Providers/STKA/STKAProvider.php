<?php

namespace App\Pelayanan\Providers\STKA;

use App\Pelayanan\PelayananProvider;

class STKAProvider extends PelayananProvider
{

    public function __construct()
    {
        $this->nama = 'SURAT TANDA KETERANGAN ANDON (STKA)';
        $this->type = PelayananProvider::PELAYANAN_GRATIS;
        $this->namespace = 'App\Pelayanan\Providers\STKA\Controller';
        $this->slug = 'STKA';
        $this->home = 'pelayanan.stka.index';
    }

}