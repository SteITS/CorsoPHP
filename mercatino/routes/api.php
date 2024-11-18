<?php
use App\Http\Controllers\Api\ProductControllerApi;

Route::get('/products', [ProductControllerApi::class, 'index']);
Route::get('/products/{id}', [ProductControllerApi::class, 'show']);
Route::post('/products', [ProductControllerApi::class, 'store']);
Route::put('/products/{id}', [ProductControllerApi::class, 'update']);
Route::delete('/products/{id}', [ProductControllerApi::class, 'destroy']);