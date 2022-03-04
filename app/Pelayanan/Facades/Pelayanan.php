<?php

namespace App\Pelayanan\Facades;

use Illuminate\Support\Facades\Facade;

class Pelayanan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pelayanan';
    }
}