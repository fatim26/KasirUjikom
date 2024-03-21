<?php

use App\Http\Controllers\DatapenjualanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProduktitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

route::get('/',[HomeController::class,'index']);
route::resource('/jenis',JenisController::class);
route::resource('/menu',MenuController::class);
route::resource('/pemesanan',PemesananController::class);
route::resource('/transaksi',TransaksiController::class); 
route::resource('/meja',MejaController::class);
route::resource('/stok',StokController::class);
route::resource('/karyawan',KaryawanController::class);
route::resource('/kategori',KategoriController::class);
route::resource('/pelanggan',PelangganController::class);
route::resource('/produktitipan',ProduktitipanController::class);
