<?php

namespace App\Pelayanan\Providers\BKP;

use App\Pelayanan\PelayananProvider;

class BKPProvider extends PelayananProvider
{

    public function __construct()
    {
        $this->nama = 'PENERBITAN BUKU KAPAL PERIKANAN (BKP) 10-30 GT';
        $this->type = PelayananProvider::PELAYANAN_GRATIS;
        $this->namespace = 'App\Pelayanan\Providers\BKP\Controller';
        $this->slug = 'BKP';
        $this->home = 'pelayanan.bkp.index';
    }

}