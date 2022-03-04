<?php

namespace App\Pelayanan;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;

abstract class PelayananProvider {

    const PELAYANAN_GRATIS = 'Gratis';
    const PELAYANAN_BERBAYAR = 'Berbayar';

    /**
     * Nama pelayanan
     * 
     * @var string
     */
    public $nama;

    /**
     * Laravel application instance
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Tipe pelayanan (Gratis/Berbayar)
     *
     * @var string
     */
    public $type;

    /**
     * Namespace controller
     * 
     * @var string
     */
    protected $namespace;

    /**
     * Nama unik pelayanan (nama folder pelayanan)
     *
     * @var string
     */
    public $slug;

    /**
     * Home route name pelayanan
     *
     * @var string
     */
    public $home;

    /**
     * Get ID pelayanan
     *
     * @return string
     */
    public function getID(): string
    {
        return hash('sha256', get_class($this));
    }

    /**
     * Register Laravel Application
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @return void
     */
    public function register(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Mendaftarkan routing
     */
    public function mapRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('pelayanan/' . strtolower($this->slug))
            ->group(base_path("app/Pelayanan/Providers/{$this->slug}/routes.php"));
    }

}