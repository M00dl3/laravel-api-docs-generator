<?php

use Illuminate\Support\Facades\Route;

Route::get(config('documentor.route'), ['uses' => 'DocumentController@index']);