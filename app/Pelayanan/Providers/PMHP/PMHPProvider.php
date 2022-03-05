<?php

namespace App\Pelayanan\Providers\PMHP;

use App\Pelayanan\PelayananProvider;

class PMHPProvider extends PelayananProvider
{

    public function __construct()
    {
        $this->nama = 'PENGUJIAN MUTU HASIL PERIKANAN (PMHP)';
        $this->type = PelayananProvider::PELAYANAN_BERBAYAR;
        $this->namespace = 'App\Pelayanan\Providers\PMHP\Controller';
        $this->slug = 'PMHP';
        $this->home = 'pelayanan.pmhp.index';
    }

}