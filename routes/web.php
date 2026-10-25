<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HitungController;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/Persegi', function () {
    return view('Persegi');
});

Route::get('/Segitiga', function () {
    return view('Segitiga');
});

Route::get('/Lingkaran', function () {
    return view('Lingkaran');
});

Route::post('/Persegi', [HitungController::class, 'LuasPersegi']);

Route::get('/Persegipanjang', function () {
    return view('Pers_panjang');
});

Route::post('/Persegipanjang', [HitungController::class,'Persegipanjang']);

Route::post('/Lingkaran', [HitungController::class, 'Lingkaran']);

Route::post('/Segitiga', [HitungController::class,'Segitiga']);
