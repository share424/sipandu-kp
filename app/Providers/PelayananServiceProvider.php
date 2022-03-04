<?php

namespace App\Providers;

use App\Pelayanan\PelayananRegister;
use App\Pelayanan\Providers\BKP\BKPProvider;
use App\Pelayanan\Providers\PPKP\PPKPProvider;
use App\Pelayanan\Providers\STKA\STKAProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PelayananServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pelayanan', function ($app) {
            $pelayanan = new PelayananRegister($app);
            $pelayanan->register(PPKPProvider::class);
            $pelayanan->register(BKPProvider::class);
            $pelayanan->register(STKAProvider::class);

            return $pelayanan;
        });

        // trigger create pelayanan
        App::make('pelayanan');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
