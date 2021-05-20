<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login']);

Route::get('karyawan/tampil', [KaryawanController::class, 'index']);
Route::post('karyawan/tambah', [KaryawanController::class, 'input']);
Route::get('karyawan/hapus/{id}', [KaryawanController::class, 'hapus']);
Route::get('karyawan/aktif/{id}', [KaryawanController::class, 'aktif']);
Route::put('karyawan/update/{id}', [KaryawanController::class, 'update']);

Route::get('pelanggan/tampil', [PelangganController::class, 'index']);
Route::post('pelanggan/tambah', [PelangganController::class, 'input']);
Route::put('pelanggan/update/{id}', [PelangganController::class, 'update']);

Route::get('menu/tampil', [MenuController::class, 'index']);
Route::post('menu/tambah', [MenuController::class, 'input']);
Route::put('menu/update/{id}', [MenuController::class, 'update']);
Route::get('menu/hapus/{id}', [MenuController::class, 'hapus']);

Route::get('meja/tampil', [MejaController::class, 'index']);
Route::post('meja/tambah', [MejaController::class, 'input']);
Route::put('meja/update/{id}', [MejaController::class, 'update']);
Route::get('meja/hapus/{id}', [MejaController::class, 'hapus']);

Route::get('reservasi/tampil', [ReservasiController::class, 'index']);
Route::post('reservasi/tambah', [ReservasiController::class, 'input']);
Route::put('reservasi/update/{id}', [ReservasiController::class, 'update']);
Route::get('reservasi/hapus/{id}', [ReservasiController::class, 'hapus']);

Route::get('pesanan/tampil', [PesananController::class, 'index']);
Route::post('pesanan/tambah', [PesananController::class, 'input']);
Route::put('pesanan/update/{id}', [PesananController::class, 'update']);
Route::get('pesanan/hapus/{id}', [PesananController::class, 'hapus']);

Route::get('detailpesanan/tampil', [DetailPesananController::class, 'index']);
Route::post('detailpesanan/tambah', [DetailPesananController::class, 'input']);
Route::put('detailpesanan/update/{id}', [DetailPesananController::class, 'update']);
Route::get('detailpesanan/hapus/{id}', [DetailPesananController::class, 'hapus']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
