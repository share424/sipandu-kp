<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PPKPController@index')->name('pelayanan.ppkp.index');
Route::get('/{id}/form', 'PPKPController@form')->name('pelayanan.ppkp.form');