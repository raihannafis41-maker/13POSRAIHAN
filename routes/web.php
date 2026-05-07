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

// MASTER (OWNER ONLY)
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerKategori;
use App\Http\Controllers\Master\ControllerProduk;
use App\Http\Controllers\Master\ControllerMeja;
use App\Http\Controllers\Master\ControllerSupplier;
use App\Http\Controllers\Master\ControllerMetodePembayaran;
use App\Http\Controllers\Master\ControllerPromo;
use App\Http\Controllers\Master\ControllerPajak;

// INVENTORY (OWNER + MANAGER)
use App\Http\Controllers\Inventory\ControllerBahanBaku;
use App\Http\Controllers\Inventory\ControllerStok;
use App\Http\Controllers\Inventory\ControllerStokMasuk;
use App\Http\Controllers\Inventory\ControllerStokKeluar;
use App\Http\Controllers\Inventory\ControllerPembelian;

// TRANSAKSI (KASIR)
use App\Http\Controllers\Transaksi\ControllerPenjualan;
use App\Http\Controllers\Transaksi\ControllerShift;
use App\Http\Controllers\Transaksi\ControllerRiwayatKasir;

// LAPORAN (OWNER + MANAGER)
use App\Http\Controllers\Laporan\ControllerLaporan;
use App\Http\Controllers\Laporan\ControllerLaporanHarian;
use App\Http\Controllers\Laporan\ControllerLaporanBulanan;
use App\Http\Controllers\Laporan\ControllerLaporanProduk;
use App\Http\Controllers\Laporan\ControllerLaporanKasir;
use App\Http\Controllers\Laporan\ControllerLaporanShift;
use App\Http\Controllers\Laporan\ControllerLaporanKeuntungan;

// ZONA KASIR (OWNER ONLY)
use App\Http\Controllers\ZonaKasir\ControllerZonaKasir;



/*
|--------------------------------------------------------------------------
| LANDING (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', [ControllerLanding::class, 'home'])->name('landing.home');
Route::get('/menu', [ControllerLanding::class, 'menu'])->name('landing.menu');
Route::get('/promo', [ControllerLanding::class, 'promo'])->name('landing.promo');
Route::get('/tentang', [ControllerLanding::class, 'tentang'])->name('landing.tentang');
Route::get('/kontak', [ControllerLanding::class, 'kontak'])->name('landing.kontak');



/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [ControllerAuthUser::class, 'login'])->name('auth.login');
Route::post('/login', [ControllerAuthUser::class, 'loginProses'])->name('auth.loginproses');
Route::get('/logout', [ControllerAuthUser::class, 'logout'])->name('auth.logout');



/*
|--------------------------------------------------------------------------
| OWNER ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:owner'])->group(function () {

    // DASHBOARD OWNER
    Route::get('/dashboardowner', [ControllerDashboardOwner::class, 'index'])
        ->name('dashboard.owner');

    // LOGIN HISTORY
    Route::get('/loginhistory', [ControllerAuthLoginHistory::class, 'index'])
        ->name('loginhistory.index');

    // MASTER DATA
    Route::prefix('master')->name('master.')->group(function () {

        // USER CRUD
        Route::get('/user', [ControllerUser::class, 'index'])->name('user.index');
        Route::get('/user/create', [ControllerUser::class, 'create'])->name('user.create');
        Route::post('/user/store', [ControllerUser::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [ControllerUser::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [ControllerUser::class, 'update'])->name('user.update');
        Route::get('/user/delete/{id}', [ControllerUser::class, 'delete'])->name('user.delete');

        // MASTER LAINNYA
        Route::get('/kategori', [ControllerKategori::class, 'index'])->name('kategori.index');
        Route::get('/produk', [ControllerProduk::class, 'index'])->name('produk.index');
        Route::get('/meja', [ControllerMeja::class, 'index'])->name('meja.index');
        Route::get('/supplier', [ControllerSupplier::class, 'index'])->name('supplier.index');
        Route::get('/metodepembayaran', [ControllerMetodePembayaran::class, 'index'])->name('metodepembayaran.index');
        Route::get('/promo', [ControllerPromo::class, 'index'])->name('promo.index');
        Route::get('/pajak', [ControllerPajak::class, 'index'])->name('pajak.index');
    });

    // ZONA KASIR
    Route::get('/zonakasir', [ControllerZonaKasir::class, 'index'])
        ->name('zonakasir.index');
});



/*
|--------------------------------------------------------------------------
| MANAGER ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/dashboardmanager', [ControllerDashboardManager::class, 'index'])
        ->name('dashboard.manager');
});



/*
|--------------------------------------------------------------------------
| OWNER + MANAGER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:owner,manager'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | INVENTORY
    |--------------------------------------------------------------------------
    */
    Route::prefix('inventory')->name('inventory.')->group(function () {

        Route::get('/bahanbaku', [ControllerBahanBaku::class, 'index'])->name('bahanbaku.index');
        Route::get('/stok', [ControllerStok::class, 'index'])->name('stok.index');
        Route::get('/stokmasuk', [ControllerStokMasuk::class, 'index'])->name('stokmasuk.index');
        Route::get('/stokkeluar', [ControllerStokKeluar::class, 'index'])->name('stokkeluar.index');
        Route::get('/pembelian', [ControllerPembelian::class, 'index'])->name('pembelian.index');
    });


    /*
    |--------------------------------------------------------------------------
    | LAPORAN (OWNER + MANAGER)
    |--------------------------------------------------------------------------
    */
    Route::prefix('laporan')->name('laporan.')->group(function () {

        // HALAMAN UTAMA LAPORAN
        Route::get('/', [ControllerLaporan::class, 'index'])->name('index');
        Route::get('/create', [ControllerLaporan::class, 'create'])->name('create');
        Route::post('/store', [ControllerLaporan::class, 'store'])->name('store');

        Route::get('/show/{id}', [ControllerLaporan::class, 'show'])->name('show');

        Route::get('/edit/{id}', [ControllerLaporan::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ControllerLaporan::class, 'update'])->name('update');

        Route::get('/delete/{id}', [ControllerLaporan::class, 'delete'])->name('delete');

        // LAPORAN HARIAN
        Route::prefix('harian')->name('harian.')->group(function () {
            Route::get('/', [ControllerLaporanHarian::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanHarian::class, 'show'])->name('show');
        });

        // LAPORAN BULANAN
        Route::prefix('bulanan')->name('bulanan.')->group(function () {
            Route::get('/', [ControllerLaporanBulanan::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanBulanan::class, 'show'])->name('show');
        });

        // LAPORAN PRODUK
        Route::prefix('produk')->name('produk.')->group(function () {
            Route::get('/', [ControllerLaporanProduk::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanProduk::class, 'show'])->name('show');
        });

        // LAPORAN KASIR
        Route::prefix('kasir')->name('kasir.')->group(function () {
            Route::get('/', [ControllerLaporanKasir::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanKasir::class, 'show'])->name('show');
        });

        // LAPORAN SHIFT
        Route::prefix('shift')->name('shift.')->group(function () {
            Route::get('/', [ControllerLaporanShift::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanShift::class, 'show'])->name('show');
        });

        // LAPORAN KEUNTUNGAN
        Route::prefix('keuntungan')->name('keuntungan.')->group(function () {
            Route::get('/', [ControllerLaporanKeuntungan::class, 'index'])->name('index');
            Route::get('/show/{id}', [ControllerLaporanKeuntungan::class, 'show'])->name('show');
        });
    });
});



/*
|--------------------------------------------------------------------------
| KASIR ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:kasir'])->group(function () {

    // DASHBOARD KASIR
    Route::get('/dashboardkasir', [ControllerDashboardKasir::class, 'index'])
        ->name('dashboard.kasir');

    Route::prefix('kasir')->name('kasir.')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | POS
        |--------------------------------------------------------------------------
        */
        Route::get('/pos', [ControllerPenjualan::class, 'index'])->name('pos');
        Route::post('/pos/tambah', [ControllerPenjualan::class, 'tambah'])->name('pos.tambah');
        Route::post('/pos/hapus', [ControllerPenjualan::class, 'hapus'])->name('pos.hapus');
        Route::post('/pos/reset', [ControllerPenjualan::class, 'reset'])->name('pos.reset');

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */
        Route::get('/pembayaran', [ControllerPenjualan::class, 'pembayaran'])->name('pembayaran');
        Route::post('/pembayaran/proses', [ControllerPenjualan::class, 'proses'])->name('pembayaran.proses');

        /*
        |--------------------------------------------------------------------------
        | STRUK & SUKSES
        |--------------------------------------------------------------------------
        */
        Route::get('/sukses/{id}', [ControllerPenjualan::class, 'sukses'])->name('sukses');
        Route::get('/struk/{id}', [ControllerPenjualan::class, 'struk'])->name('struk');

        /*
        |--------------------------------------------------------------------------
        | SHIFT
        |--------------------------------------------------------------------------
        */
        Route::prefix('shift')->name('shift.')->group(function () {

            Route::get('/', [ControllerShift::class, 'index'])->name('index');

            Route::get('/buka', [ControllerShift::class, 'bukaShift'])->name('buka');
            Route::post('/buka', [ControllerShift::class, 'prosesBukaShift'])->name('buka.proses');

            Route::get('/tutup', [ControllerShift::class, 'tutupShift'])->name('tutup');
            Route::post('/tutup', [ControllerShift::class, 'prosesTutupShift'])->name('tutup.proses');
        });

        /*
        |--------------------------------------------------------------------------
        | RIWAYAT TRANSAKSI
        |--------------------------------------------------------------------------
        */
        Route::prefix('riwayat')->name('riwayat.')->group(function () {

            Route::get('/', [ControllerRiwayatKasir::class, 'index'])->name('index');
            Route::get('/{id}', [ControllerRiwayatKasir::class, 'show'])->name('show');
        });
    });
});
