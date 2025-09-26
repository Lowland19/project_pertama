<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/ubahdata', [PegawaiController::class,'tambah']);

Route::get('/datapegawai', [PegawaiController::class,'index']);

Route::get('/simpandata', [PegawaiController::class,'simpan']);

Route::resource('pegawai',App\Http\Controllers\PegawaiController::class);

Route::delete('/pegawai/{id}',[PegawaiController::class,'hapus'])->name('pegawai.hapus');

Route::get('/tempatsampah', [PegawaiController::class,'trash']);

Route::post('/pegawai/restore/{id}',[PegawaiController::class,'restore'])->name('pegawai.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profilpengguna', [App\Http\Controllers\UserController::class,'lihat'])->name('profilpengguna');

Route::post('/profilpengguna/ubah', [App\Http\Controllers\UserController::class,'ubah'])->name('pengguna.ubah');