<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PekerjaanOrtuController;
use App\Http\Controllers\PenghasilanOrtuController;
use App\Http\Controllers\TanggunganController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
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
    return view('login');
});

Route::post('/', [AuthController::class,'post']);
Route::get('logout', [AuthController::class,'logout']);

Route::resource('siswa', SiswaController::class);
Route::resource('pekerjaan-ortu', PekerjaanOrtuController::class);
Route::resource('penghasilan-ortu', PenghasilanOrtuController::class);
Route::resource('tanggungan', TanggunganController::class);
Route::resource('penentuan-kriteria', AlternatifController::class);
Route::get('laporan-perengkingan',[AlternatifController::class,'preview']);
Route::get('cetak-perengkingan',[AlternatifController::class,'cetak']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
