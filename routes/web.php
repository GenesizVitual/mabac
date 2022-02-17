<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Metode;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PekerjaanOrtuController;
use App\Http\Controllers\PenghasilanOrtuController;
use App\Http\Controllers\TanggunganController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('dashboard.index');
});

Route::resource('siswa', SiswaController::class);
Route::resource('pekerjaan-ortu', PekerjaanOrtuController::class);
Route::resource('penghasilan-ortu', PenghasilanOrtuController::class);
Route::resource('tanggungan', TanggunganController::class);
