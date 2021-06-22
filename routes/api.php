<?php

use App\Http\Controllers\PermintanBarangController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barangapis', [PermintanBarangController::class,'apis'])->name('permintaanbrg.apis');
Route::get('/permintaanbrg', [PermintanBarangController::class,'index'])->name('permintaanbrg.index');
Route::post('/permintaanbrg', [PermintanBarangController::class,'store'])->name('permintaanbrg.store');
Route::get('/permintaanbrg/{PermintaanBarang:id}', [PermintanBarangController::class,'show'])->name('permintaanbrg.show');
Route::delete('/permintaanbrg/{PermintaanBarang:id}', [PermintanBarangController::class,'destroy'])->name('permintaanbrg.destroy');
Route::put('/permintaanbrg/{PermintaanBarang:id}', [PermintanBarangController::class,'update'])->name('permintaanbrg.update');

Route::get('/approvebrg/{PermintaanBarang:id}',[PermintanBarangController::class,'approval'])->name('permintaanbrg.approve');

Route::get('/datalogis',[PermintanBarangController::class,'datalogis'])->name('logistic');
Route::get('/datapromosi',[PermintanBarangController::class,'datapromosi'])->name('promosi');
Route::get('/listpesanan',[PermintanBarangController::class,'listpesanan'])->name('listpesanan');
Route::get('/pangkat',[PermintanBarangController::class,'pangkat'])->name('pangkat');


Route::get('/create',[PermintanBarangController::class,'indexs'])->name('permintaanbrg.create');

Route::post('/storepesanan',[PermintanBarangController::class,'postDataPesanan'])->name('storepesanan');
Route::get('/pesanan',[PermintanBarangController::class,'pesananUi'])->name('pesanan');