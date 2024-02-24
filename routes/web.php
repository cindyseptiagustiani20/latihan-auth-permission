<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PotonganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TunjanganController;
use App\Http\Controllers\TunjanganPegawaiController;
use App\Http\Controllers\PotonganPegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PTKPController;
use App\Http\Controllers\PKPController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticate'])->name('post_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:superadmin,accounting']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function () {

    // Start: Data User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/json', [UserController::class, 'json'])->name('user.json');
    Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
    Route::post('/user/insert', [UserController::class, 'insert'])->name('user.insert');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    // End: Data User
});

Route::group(['middleware' => ['auth', 'checkRole:accounting']], function () {

    // Start: Data Jabatan
    Route::get('/jabatan', [UserController::class, 'index'])->name('jabatan');
    Route::get('/jabatan/json', [UserController::class, 'json'])->name('jabatan.json');
    Route::get('/jabatan/tambah', [UserController::class, 'tambah'])->name('jabatan.tambah');
    Route::post('/jabatan/insert', [UserController::class, 'insert'])->name('jabatan.insert');
    Route::get('/jabatan/edit/{id}', [UserController::class, 'edit'])->name('jabatan.edit');
    Route::post('/jabatan/update', [UserController::class, 'update'])->name('jabatan.update');
    Route::get('/jabatan/delete/{id}', [UserController::class, 'delete'])->name('jabatan.delete');
    // End: Data User

    // Start: Data Potongan
    Route::get('/potongan', [PotonganController::class, 'index'])->name('potongan');
    Route::get('/potongan/json', [PotonganController::class, 'json'])->name('potongan.json');
    Route::get('/potongan/tambah', [PotonganController::class, 'tambah'])->name('potongan.tambah');
    Route::post('/potongan/insert', [PotonganController::class, 'insert'])->name('potongan.insert');
    Route::get('/potongan/edit/{id}', [PotonganController::class, 'edit'])->name('potongan.edit');
    Route::post('/potongan/update', [PotonganController::class, 'update'])->name('potongan.update');
    Route::get('/potongan/delete/{id}', [PotonganController::class, 'delete'])->name('potongan.delete');
    // End: Data Potongan

    // Start: Data Tunjangan
    Route::get('/tunjangan', [TunjanganController::class, 'index'])->name('tunjangan');
    Route::get('/tunjangan/json', [TunjanganController::class, 'json'])->name('tunjangan.json');
    Route::get('/tunjangan/tambah', [TunjanganController::class, 'tambah'])->name('tunjangan.tambah');
    Route::post('/tunjangan/insert', [TunjanganController::class, 'insert'])->name('tunjangan.insert');
    Route::get('/tunjangan/edit/{id}', [TunjanganController::class, 'edit'])->name('tunjangan.edit');
    Route::post('/tunjangan/update', [TunjanganController::class, 'update'])->name('tunjangan.update');
    Route::get('/tunjangan/delete/{id}', [TunjanganController::class, 'delete'])->name('tunjangan.delete');
    // End: Data Tunjangan

    // Start: Data tunjangan Pegawai
    Route::get('/tunjangan_pegawai', [TunjanganPegawaiController::class, 'index'])->name('tunjangan_pegawai');
    Route::get('/tunjangan_pegawai/json', [TunjanganPegawaiController::class, 'json'])->name('tunjangan_pegawai.json');
    Route::get('/tunjangan_pegawai/tambah', [TunjanganPegawaiController::class, 'tambah'])->name('tunjangan_pegawai.tambah');
    Route::post('/tunjangan_pegawai/insert', [TunjanganPegawaiController::class, 'insert'])->name('tunjangan_pegawai.insert');
    Route::get('/tunjangan_pegawai/edit/{id}', [TunjanganPegawaiController::class, 'edit'])->name('tunjangan_pegawai.edit');
    Route::post('/tunjangan_pegawai/update', [TunjanganPegawaiController::class, 'update'])->name('tunjangan_pegawai.update');
    Route::get('/tunjangan_pegawai/delete/{id}', [TunjanganPegawaiController::class, 'delete'])->name('tunjangan_pegawai.delete');
    // End: Data tunjangan Pegawai

     // Start: Data potongan Pegawai
     Route::get('/potongan_pegawai', [potonganPegawaiController::class, 'index'])->name('potongan_pegawai');
     Route::get('/potongan_pegawai/json', [potonganPegawaiController::class, 'json'])->name('potongan_pegawai.json');
     Route::get('/potongan_pegawai/tambah', [potonganPegawaiController::class, 'tambah'])->name('potongan_pegawai.tambah');
     Route::post('/potongan_pegawai/insert', [potonganPegawaiController::class, 'insert'])->name('potongan_pegawai.insert');
     Route::get('/potongan_pegawai/edit/{id}', [potonganPegawaiController::class, 'edit'])->name('potongan_pegawai.edit');
     Route::post('/potongan_pegawai/update', [potonganPegawaiController::class, 'update'])->name('potongan_pegawai.update');
     Route::get('/potongan_pegawai/delete/{id}', [potonganPegawaiController::class, 'delete'])->name('potongan_pegawai.delete');
     // End: Data potongan Pegawai

     // Start: Data jabatan
    Route::get('/jabatan', [jabatanController::class, 'index'])->name('jabatan');
    Route::get('/jabatan/json', [jabatanController::class, 'json'])->name('jabatan.json');
    Route::get('/jabatan/tambah', [jabatanController::class, 'tambah'])->name('jabatan.tambah');
    Route::post('/jabatan/insert', [jabatanController::class, 'insert'])->name('jabatan.insert');
    Route::get('/jabatan/edit/{id}', [jabatanController::class, 'edit'])->name('jabatan.edit');
    Route::post('/jabatan/update', [jabatanController::class, 'update'])->name('jabatan.update');
    Route::get('/jabatan/delete/{id}', [jabatanController::class, 'delete'])->name('jabatan.delete');
    // End: Data jabatan

    // Start: Data PTKP
    Route::get('/PTKP', [PTKPController::class, 'index'])->name('PTKP');
    Route::get('/PTKP/json', [PTKPController::class, 'json'])->name('PTKP.json');
    Route::get('/PTKP/tambah', [PTKPController::class, 'tambah'])->name('PTKP.tambah');
    Route::post('/PTKP/insert', [PTKPController::class, 'insert'])->name('PTKP.insert');
    Route::get('/PTKP/edit/{id}', [PTKPController::class, 'edit'])->name('PTKP.edit');
    Route::post('/PTKP/update', [PTKPController::class, 'update'])->name('PTKP.update');
    Route::get('/PTKP/delete/{id}', [PTKPController::class, 'delete'])->name('PTKP.delete');
    // End: Data PTKP

    // Start: Data PKP
    Route::get('/PKP', [PKPController::class, 'index'])->name('PKP');
    Route::get('/PKP/json', [PKPController::class, 'json'])->name('PKP.json');
    Route::get('/PKP/tambah', [PKPController::class, 'tambah'])->name('PKP.tambah');
    Route::post('/PKP/insert', [PKPController::class, 'insert'])->name('PKP.insert');
    Route::get('/PKP/edit/{id}', [PKPController::class, 'edit'])->name('PKP.edit');
    Route::post('/PKP/update', [PKPController::class, 'update'])->name('PKP.update');
    Route::get('/PKP/delete/{id}', [PKPController::class, 'delete'])->name('PKP.delete');
    // End: Data PKP
    
    // Start: Data Pegawai
    Route::get('/pegawai', [pegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/json', [pegawaiController::class, 'json'])->name('pegawai.json');
    Route::get('/pegawai/pph21/{id}', [pegawaiController::class, 'pph21'])->name('pegawai.pph21');
    Route::get('/pegawai/print_pph21/{id}', [pegawaiController::class, 'print_pph21'])->name('pegawai.print_pph21');

    // End: Data Pegawai

    // Start: Data Pegawai
    Route::get('/pegawai/tambah', [pegawaiController::class, 'tambah'])->name('pegawai.tambah');
    Route::post('/pegawai/insert', [pegawaiController::class, 'insert'])->name('pegawai.insert');
    Route::get('/pegawai/edit/{id}', [pegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/pegawai/update', [pegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/pegawai/delete/{id}', [pegawaiController::class, 'delete'])->name('pegawai.delete');
    // End: Data Pegawai
});
