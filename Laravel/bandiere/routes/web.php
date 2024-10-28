<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlagsController;

Route::resource('flags', FlagsController::class);
Route::get('/', function () {
    return view('welcome');
});
