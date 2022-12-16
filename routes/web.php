<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterWilayahController;
use App\Http\Controllers\MasterObatController;
use App\Http\Controllers\MasterPegawaiController;
use App\Http\Controllers\MasterTindakanController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('welcome');
});
Route::POST('/doLogin', [App\Http\Controllers\Auth\LoginController::class, 'doLogin'])->name('doLogin');

Auth::routes();
Route::get('/postLogout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('post-logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'master/'], function () {
    Route::get('wilayah', [MasterWilayahController::class, 'index']);
    Route::get('addWilayah/{wilayah}', [MasterWilayahController::class, 'store']);
    Route::get('getList', [MasterWilayahController::class, 'getList']);
    Route::get('editWilayah/{kode}', [MasterWilayahController::class, 'editWilayah']);
    Route::get('updateWilayah/{wilayah}/{id}', [MasterWilayahController::class, 'updateWilayah']);
    Route::get('deleteWilayah/{kode}', [MasterWilayahController::class, 'deleteWilayah']);

    Route::get('obat', [MasterObatController::class, 'index']);
    Route::POST('addObat', [MasterObatController::class, 'store']);
    Route::get('editObat/{id}', [MasterObatController::class, 'editobat']);
    Route::get('deleteObat/{id}', [MasterObatController::class, 'deleteobat']);
    Route::POST('updateObat', [MasterObatController::class, 'updateObat']);

    Route::get('tindakan', [MasterTindakanController::class, 'index']);
    Route::get('addTindakan/{tindakan}', [MasterTindakanController::class, 'store']);
    Route::get('getList', [MasterTindakanController::class, 'getList']);
    Route::get('editTindakan/{kode}', [MasterTindakanController::class, 'editTindakan']);
    Route::get('updateTindakan/{tindakan}/{id}', [MasterTindakanController::class, 'updateTindakan']);
    Route::get('deleteTindakan/{kode}', [MasterTindakanController::class, 'deleteTindakan']);

    Route::get('pegawai', [MasterPegawaiController::class, 'index']);
    Route::POST('addPegawai', [MasterPegawaiController::class, 'store']);
    Route::get('editPegawai/{id}', [MasterPegawaiController::class, 'editPegawai']);
    Route::get('deletePegawai/{id}', [MasterPegawaiController::class, 'deletePegawai']);
    Route::POST('updatePegawai', [MasterPegawaiController::class, 'updatePegawai']);

    Route::get('user', [MasterUserController::class, 'index']);
    Route::POST('adduser', [MasterUserController::class, 'store']);
    Route::get('edituser/{id}', [MasterUserController::class, 'editUser']);
    Route::get('deleteuser/{id}', [MasterUserController::class, 'deleteUser']);
    Route::POST('updateuser', [MasterUserController::class, 'updateuser']);
});

Route::prefix('permission/')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/add', [PermissionController::class, 'store'])->name('permission.add');
    Route::post('/add_group', [PermissionController::class, 'add_group'])->name('permission.add_group');
    Route::get('/lihat_permission/{id}', [PermissionController::class, 'lihat_permission']);
    Route::post('/add_group_permission', [PermissionController::class, 'add_group_permission'])->name('permission.add_group_permission');
    Route::get('/hapus_permission/{kategori}/{id}', [PermissionController::class, 'hapus_permission']);
    Route::get('/update_permission/{kategori}/{nama}/{id}', [PermissionController::class, 'update_permission']);
});

Route::prefix('pasien/')->group(function () {
    Route::get('/', [PasienController::class, 'index']);
    Route::POST('/add', [PasienController::class, 'store']);
    Route::get('invoice/{id}', [PasienController::class, 'invoice']);
    Route::get('report', [PasienController::class, 'report']);
});
