<?php

namespace App\Pelayanan;

class PelayananRegister {

    protected $loadedPelayanan = [];

    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function getPelayanan($key = '', $isClass = true)
    {
        if (empty($key)) {
            $output = [];
            foreach($this->loadedPelayanan as $pelayanan) {
                $output[] = $pelayanan;
            }
            return $output;
        }
        $key = $isClass ? hash('sha256', $key) : $key;
        if (array_key_exists($key, $this->loadedPelayanan)) {
            return $this->loadedPelayanan[$key];
        }

        throw new \Exception("Pelayanan dengan key {$key} tidak ditemukan");
    }

    public function getAllPelayanan()
    {
        return $this->getPelayanan();
    }

    public function register($pelayanan)
    {
        if (!$pelayanan instanceof PelayananProvider) {
            $pelayanan = new $pelayanan();
        }

        if (array_key_exists($key = $pelayanan->getID(), $this->loadedPelayanan)) {
            return;
        }
        $this->loadedPelayanan[$key] = $pelayanan;

        $pelayanan->register($this->app);
        $pelayanan->mapRoutes();
    }

}