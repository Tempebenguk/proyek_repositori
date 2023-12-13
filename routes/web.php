<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

Route::view('/', 'welcome')->name('home');

// Authentication routes
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerSimpan'])->name('register.simpan');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginAksi'])->name('login.aksi');

Route::middleware('auth:admin,dosen,mahasiswa')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/datamhs', [AdminController::class, 'showMahasiswa'])->name('admin.mahasiswa.index');
        Route::get('/datamhs/tambah', [AdminController::class, 'createMahasiswa'])->name('admin.mahasiswa.tambah');
        Route::post('/datamhs/store', [AdminController::class, 'storeMahasiswa'])->name('admin.mahasiswa.store');
        Route::get('/datamhs/edit/{id}', [AdminController::class, 'editMahasiswa'])->name('admin.mahasiswa.edit');
	    Route::put('/datamhs/update/{id}', [AdminController::class, 'updateMahasiswa'])->name('admin.mahasiswa.update');
	    Route::get('/datamhs/hapus/{id}', [AdminController::class, 'destroyMahasiswa'])->name('admin.mahasiswa.hapus');

        Route::get('/datadosen', [AdminController::class, 'showDosen'])->name('admin.dosen.index');
        Route::get('/datadosen/tambah', [AdminController::class, 'createDosen'])->name('admin.dosen.tambah');
        Route::post('/datadosen/store', [AdminController::class, 'storeDosen'])->name('admin.dosen.store');
        Route::get('/datadsn/edit/{id}', [AdminController::class, 'editDosen'])->name('admin.dosen.edit');
	    Route::put('/datadsn/update/{id}', [AdminController::class, 'updateDosen'])->name('admin.dosen.update');
	    Route::get('/datadsn/hapus/{id}', [AdminController::class, 'destroyDosen'])->name('admin.dosen.hapus');

        Route::get('/dataadm', [AdminController::class, 'showAdmin'])->name('admin.admin.index');
        Route::get('/dataadm/tambah', [AdminController::class, 'createAdmin'])->name('admin.admin.tambah');
        Route::post('/dataadm/store', [AdminController::class, 'storeAdmin'])->name('admin.admin.store');
        Route::get('/dataadm/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.admin.edit');
	    Route::put('/dataadm/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.admin.update');
	    Route::get('/dataadm/hapus/{id}', [AdminController::class, 'destroyAdmin'])->name('admin.admin.hapus');

        Route::get('/datata', [AdminController::class, 'showTa'])->name('admin.tugasakhir.index');
    });

    Route::prefix('dosen')->group(function () {
        Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
    });

    Route::prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
       
    });
});