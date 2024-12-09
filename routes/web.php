<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardNasabah;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RegisterNasabahController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\TarikSaldoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
















Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function(){
    return view('profile');
});
Route::get('/data-sampah', function(){
    return view('data-sampah');
});

Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard-admin');


Route::resource('nasabah', NasabahController::class);
Route::resource('admins', AdminController::class);
Route::resource('sampah', SampahController::class);
Route::get('/show-data-nasabah', [NasabahController::class, 'showAll']);

Route::get('/login', [LoginController::class, 'showNasabahLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginNasabah']);
Route::get('/register-nasabah', [RegisterNasabahController::class, 'showNasabahRegisterForm'])->name('register.nasabah');
Route::post('/register-nasabah', [RegisterNasabahController::class, 'nasabahRegister']);
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('admin'); // Pastikan middleware 'admin' ada di Kernel.php

Route::get('/api/nasabah', [NasabahController::class, 'index']); // Mengambil semua nasabah
Route::get('/api/nasabah/{id}', [NasabahController::class, 'show']); // Mengambil detail nasabah berdasarkan ID

Route::get('/data-sampah', [SampahController::class, 'indexNasabah']);
Route::prefix('sampah')->group(function () {
    Route::get('/', [SampahController::class, 'index'])->name('sampah.index');
    Route::get('/create', [SampahController::class, 'create'])->name('sampah.create');
    Route::post('/store', [SampahController::class, 'store'])->name('sampah.store');
    Route::get('/{sampah}', [SampahController::class, 'show'])->name('sampah.show');
    Route::get('/{sampah}/edit', [SampahController::class, 'edit'])->name('sampah.edit');
    Route::put('/{sampah}/edit', [SampahController::class, 'update'])->name('sampah.update');
    Route::delete('/{sampah}', [SampahController::class, 'destroy'])->name('sampah.destroy');
});

// Route::get('/admin', [SampahController::class,'index'])->name('admins');
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{admin}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{admin}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Route::get('/nasabah', [SampahController::class,'index'])->name('nasabahs');
Route::prefix('nasabah')->group(function () {
    Route::get('/', [NasabahController::class, 'index'])->name('nasabah.index');
    Route::get('/create', [NasabahController::class, 'create'])->name('nasabah.create');
    Route::post('/store', [NasabahController::class, 'store'])->name('nasabah.store');
    Route::get('/{nasabah}', [NasabahController::class, 'show'])->name('nasabah.show');
    Route::get('/{nasabah}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::put('/{nasabah}/edit', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::delete('/{nasabah}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');
});

// Route::get('/setoran', [SampahController::class,'index'])->name('setorans');
Route::prefix('setoran')->group(function () {
    Route::get('/', [SetoranController::class, 'index'])->name('setoran.index');
    Route::get('/create', [SetoranController::class, 'create'])->name('setoran.create');
    Route::post('/store', [SetoranController::class, 'store'])->name('setoran.store');
    Route::get('/{setoran}', [SetoranController::class, 'show'])->name('setoran.show');
    Route::get('/{setoran}/edit', [SetoranController::class, 'edit'])->name('setoran.edit');
    Route::put('/{setoran}/edit', [SetoranController::class, 'update'])->name('setoran.update');
    Route::delete('/{setoran}', [SetoranController::class, 'destroy'])->name('setoran.destroy');
});
Route::get('/riwayat', [SetoranController::class, 'riwayatSetoran'])->name('riwayat.setoran');
Route::get('/setoran-detail/{id}', [SetoranController::class, 'show'])->name('setoran-detail');

Route::get('/riwayatNasabah', [SetoranController::class, 'riwayatSetoranNasabah'])->name('riwayat.setoranNasabah');
Route::get('/setoran-detailNasabah/{id}', [SetoranController::class, 'showNasabah'])->name('setoran-detailNasabah');
Route::get('/dashboard-nasabah', [DashboardNasabah::class,  'DashboardNasabah'])->name('dashboard-nasabah');


Route::prefix('permintaan-penarikan')->group(function () {
    Route::get('/', [TarikSaldoController::class, 'index'])->name('tarik_saldo.index');
    Route::get('/create', [TarikSaldoController::class, 'create'])->name('tarik_saldo.create');
    Route::post('/store', [TarikSaldoController::class, 'store'])->name('tarik_saldo.store');
});

Route::get('/penarikan-saldo', [TarikSaldoController::class, 'index2'])->name('tarik_saldo2.index2');
Route::patch('/update-status/{id}', [TarikSaldoController::class, 'updateStatus'])->name('penarikan.update-status');

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/addpenjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/store', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/add-to-penjualan/{id}', [PenjualanController::class, 'addTopenjualan'])->name('penjualan.add');
Route::get('/checkout', [PenjualanController::class, 'checkout'])->name('penjualan.checkout');