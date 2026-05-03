<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

// LANDING
use App\Http\Controllers\Landing\ControllerLanding;

// AUTH
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthLoginHistory;

// DASHBOARD
use App\Http\Controllers\Dashboard\ControllerDashboardOwner;
use App\Http\Controllers\Dashboard\ControllerDashboardManager;
use App\Http\Controllers\Dashboard\ControllerDashboardKasir;

// MASTER
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerKategori;
use App\Http\Controllers\Master\ControllerProduk;
use App\Http\Controllers\Master\ControllerMeja;
use App\Http\Controllers\Master\ControllerSupplier;
use App\Http\Controllers\Master\ControllerMetodePembayaran;
use App\Http\Controllers\Master\ControllerPromo;
use App\Http\Controllers\Master\ControllerPajak;

// INVENTORY
use App\Http\Controllers\Inventory\ControllerBahanBaku;
use App\Http\Controllers\Inventory\ControllerStok;
use App\Http\Controllers\Inventory\ControllerStokMasuk;
use App\Http\Controllers\Inventory\ControllerStokKeluar;
use App\Http\Controllers\Inventory\ControllerPembelian;

// TRANSAKSI (POS)
use App\Http\Controllers\Transaksi\ControllerPenjualan;
use App\Http\Controllers\Transaksi\ControllerShift;

// LAPORAN
use App\Http\Controllers\Laporan\ControllerLaporan;

// ZONA KASIR
use App\Http\Controllers\ZonaKasir\ControllerZonaKasir;


/*
|--------------------------------------------------------------------------
| ROUTE LANDING (PUBLIC / GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/', [ControllerLanding::class, 'home'])->name('landing.home');
Route::get('/menu', [ControllerLanding::class, 'menu'])->name('landing.menu');
Route::get('/promo', [ControllerLanding::class, 'promo'])->name('landing.promo');
Route::get('/tentang', [ControllerLanding::class, 'tentang'])->name('landing.tentang');
Route::get('/kontak', [ControllerLanding::class, 'kontak'])->name('landing.kontak');


/*
|--------------------------------------------------------------------------
| ROUTE AUTH (JANGAN DIUBAH)
|--------------------------------------------------------------------------
*/
Route::get('/login', [ControllerAuthUser::class, 'login'])->name('auth.login');
Route::post('/login', [ControllerAuthUser::class, 'loginProses'])->name('auth.loginproses');
Route::get('/logout', [ControllerAuthUser::class, 'logout'])->name('auth.logout');


/*
|--------------------------------------------------------------------------
| ROUTE OWNER (ROLE: owner)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:owner'])->group(function () {

    // DASHBOARD OWNER
    Route::get('/dashboardowner', [ControllerDashboardOwner::class, 'index'])
        ->name('dashboard.owner');

    // LOGIN HISTORY
    Route::get('/loginhistory', [ControllerAuthLoginHistory::class, 'index'])
        ->name('loginhistory.index');


    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */
    Route::prefix('master')->group(function () {

        // USER CRUD
        Route::get('/user', [ControllerUser::class, 'index'])->name('user.index');
        Route::get('/user/create', [ControllerUser::class, 'create'])->name('user.create');
        Route::post('/user/store', [ControllerUser::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [ControllerUser::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [ControllerUser::class, 'update'])->name('user.update');
        Route::get('/user/delete/{id}', [ControllerUser::class, 'delete'])->name('user.delete');

        // KATEGORI
        Route::get('/kategori', [ControllerKategori::class, 'index'])->name('kategori.index');

        // PRODUK
        Route::get('/produk', [ControllerProduk::class, 'index'])->name('produk.index');

        // MEJA
        Route::get('/meja', [ControllerMeja::class, 'index'])->name('meja.index');

        // SUPPLIER
        Route::get('/supplier', [ControllerSupplier::class, 'index'])->name('supplier.index');

        // METODE PEMBAYARAN
        Route::get('/metodepembayaran', [ControllerMetodePembayaran::class, 'index'])->name('metodepembayaran.index');

        // PROMO
        Route::get('/promo', [ControllerPromo::class, 'index'])->name('promo.index');

        // PAJAK
        Route::get('/pajak', [ControllerPajak::class, 'index'])->name('pajak.index');
    });


    /*
    |--------------------------------------------------------------------------
    | INVENTORY
    |--------------------------------------------------------------------------
    */
    Route::prefix('inventory')->group(function () {

        Route::get('/bahanbaku', [ControllerBahanBaku::class, 'index'])->name('bahanbaku.index');
        Route::get('/stok', [ControllerStok::class, 'index'])->name('stok.index');
        Route::get('/stokmasuk', [ControllerStokMasuk::class, 'index'])->name('stokmasuk.index');
        Route::get('/stokkeluar', [ControllerStokKeluar::class, 'index'])->name('stokkeluar.index');
        Route::get('/pembelian', [ControllerPembelian::class, 'index'])->name('pembelian.index');
    });


    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI (POS + SHIFT)
    |--------------------------------------------------------------------------
    */
    Route::prefix('kasir')->group(function () {

        Route::get('/pos', [ControllerPenjualan::class, 'index'])->name('kasir.pos');

        Route::post('/pos/tambah', [ControllerPenjualan::class, 'tambah'])->name('kasir.pos.tambah');
        Route::post('/pos/hapus', [ControllerPenjualan::class, 'hapus'])->name('kasir.pos.hapus');
        Route::post('/pos/reset', [ControllerPenjualan::class, 'reset'])->name('kasir.pos.reset');

        Route::get('/pembayaran', [ControllerPenjualan::class, 'pembayaran'])->name('kasir.pembayaran');
        Route::post('/pembayaran/proses', [ControllerPenjualan::class, 'proses'])->name('kasir.pembayaran.proses');

        Route::get('/sukses/{id}', [ControllerPenjualan::class, 'sukses'])->name('kasir.sukses');
        Route::get('/struk/{id}', [ControllerPenjualan::class, 'struk'])->name('kasir.struk');

        Route::get('/shift', [ControllerShift::class, 'index'])->name('owner.shift.index');
    });


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */
    Route::get('/laporan', [ControllerLaporan::class, 'index'])->name('laporan.index');


    /*
    |--------------------------------------------------------------------------
    | ZONA KASIR
    |--------------------------------------------------------------------------
    */
    Route::get('/zonakasir', [ControllerZonaKasir::class, 'index'])->name('zonakasir.index');
});


/*
|--------------------------------------------------------------------------
| ROUTE MANAGER (ROLE: manager)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/dashboardmanager', [ControllerDashboardManager::class, 'index'])
        ->name('dashboard.manager');
});


/*
|--------------------------------------------------------------------------
| ROUTE KASIR (ROLE: kasir)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:kasir'])->group(function () {

    Route::get('/dashboardkasir', [ControllerDashboardKasir::class, 'index'])
        ->name('dashboard.kasir');

    Route::prefix('kasir')->group(function () {

        Route::get('/pos', [ControllerPenjualan::class, 'index'])->name('kasir.pos');

        Route::post('/pos/tambah', [ControllerPenjualan::class, 'tambah'])->name('kasir.pos.tambah');
        Route::post('/pos/hapus', [ControllerPenjualan::class, 'hapus'])->name('kasir.pos.hapus');
        Route::post('/pos/reset', [ControllerPenjualan::class, 'reset'])->name('kasir.pos.reset');

        Route::get('/pembayaran', [ControllerPenjualan::class, 'pembayaran'])->name('kasir.pembayaran');
        Route::post('/pembayaran/proses', [ControllerPenjualan::class, 'proses'])->name('kasir.pembayaran.proses');

        Route::get('/sukses/{id}', [ControllerPenjualan::class, 'sukses'])->name('kasir.sukses');
        Route::get('/struk/{id}', [ControllerPenjualan::class, 'struk'])->name('kasir.struk');

        Route::get('/shift', [ControllerShift::class, 'index'])->name('shift.index');
    });
});