<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

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

// KAMAR
Route::get('/',  [KamarController::class, 'index'])->name('dokter_pasien');

// DOKTER
Route::get('/dokter', [DokterController::class, 'dokter']);
//Route::get('/add/dokter', [DokterController::class, 'dokter']);
Route::post('/dokter/store', [DokterController::class, 'store']);
Route::post('/dokter/update', [DokterController::class, 'update']);
Route::get('/editDokter/{id}', [DokterController::class, 'edit']);;
Route::get('/dokter/hapus/{id}', [DokterController::class, 'destroy']);
Route::get('/createDokter', [DokterController::class, 'create_dokter'])->name('create');

//PASIEN
Route::get('/pasien', [PasienController::class, 'pasien']);
Route::post('/pasien/store', [PasienController::class, 'store']);
Route::post('/pasien/update', [PasienController::class, 'update']);
Route::get('/editPasien/{id}', [PasienController::class, 'edit']);;
Route::get('/pasien/hapus/{id}', [PasienController::class, 'destroy']);
Route::get('/createPasien', [PasienController::class, 'create_pasien'])->name('create');

//IMPORT DOKTER
Route::post('/import', [DokterController::class, 'import'])->name('import');
Route::get('/dokterimport', [DokterController::class, 'dokterimport'])->name('dokterimport');

//IMPORT PASIEN
Route::post('/import', [PasienController::class, 'import'])->name('import');
Route::get('/pasienimport', [PasienController::class, 'pasienimport'])->name('pasienimport');


