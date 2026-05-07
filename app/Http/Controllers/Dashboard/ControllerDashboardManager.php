<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// MODELS
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelMeja;
use App\Models\ModelUser;
use App\Models\ModelShift;
use App\Models\ModelStok;
use App\Models\ModelPenjualan;

class ControllerDashboardManager extends Controller
{
    public function index()
    {
        /*
        |----------------------------------------------------------------------
        | TOTAL PRODUK
        |----------------------------------------------------------------------
        */
        $totalProduk = ModelProduk::count();

        /*
        |----------------------------------------------------------------------
        | TOTAL KATEGORI
        |----------------------------------------------------------------------
        */
        $totalKategori = ModelKategori::count();

        /*
        |----------------------------------------------------------------------
        | TOTAL MEJA
        |----------------------------------------------------------------------
        */
        $totalMeja = ModelMeja::count();

        /*
        |----------------------------------------------------------------------
        | TOTAL KASIR
        |----------------------------------------------------------------------
        */
        $totalKasir = ModelUser::where('role', 'kasir')->count();

        /*
        |----------------------------------------------------------------------
        | SHIFT AKTIF (OPEN)
        |----------------------------------------------------------------------
        */
        $shiftAktif = ModelShift::where('status', 'open')->count();

        /*
        |----------------------------------------------------------------------
        | TRANSAKSI HARI INI
        |----------------------------------------------------------------------
        */
        $penjualanHariIni = ModelPenjualan::whereDate('tanggalpenjualan', now()->toDateString())
            ->count();

        /*
        |----------------------------------------------------------------------
        | PENDAPATAN HARI INI (TOTAL PENJUALAN PAID)
        |----------------------------------------------------------------------
        */
        $pendapatanHariIni = ModelPenjualan::whereDate('tanggalpenjualan', now()->toDateString())
            ->where('status', 'paid')
            ->sum('total');

        /*
        |----------------------------------------------------------------------
        | PENDAPATAN BULAN INI
        |----------------------------------------------------------------------
        */
        $pendapatanBulanIni = ModelPenjualan::whereMonth('tanggalpenjualan', now()->month)
            ->whereYear('tanggalpenjualan', now()->year)
            ->where('status', 'paid')
            ->sum('total');

        /*
        |----------------------------------------------------------------------
        | PRODUK TERLARIS (TOP 5 HARI INI)
        |----------------------------------------------------------------------
        | FIX AMBIGUOUS COLUMN: gunakan detailpenjualan.subtotal
        */
        $produkTerlaris = DB::table('detailpenjualan')
            ->join('penjualan', 'detailpenjualan.penjualanid', '=', 'penjualan.id')
            ->join('produk', 'detailpenjualan.produkid', '=', 'produk.id')
            ->whereDate('penjualan.tanggalpenjualan', now()->toDateString())
            ->where('penjualan.status', 'paid')
            ->select(
                'detailpenjualan.produkid',
                'produk.namaproduk',
                DB::raw('SUM(detailpenjualan.qty) as total_qty'),
                DB::raw('SUM(detailpenjualan.subtotal) as total_pendapatan')
            )
            ->groupBy('detailpenjualan.produkid', 'produk.namaproduk')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        /*
        |----------------------------------------------------------------------
        | STOK MENIPIS
        |----------------------------------------------------------------------
        | stoktersedia <= stokminimal
        */
        $stokMenipis = DB::table('stok')
            ->join('bahanbaku', 'stok.bahanbakuid', '=', 'bahanbaku.id')
            ->whereColumn('stok.stoktersedia', '<=', 'stok.stokminimal')
            ->select(
                'stok.id',
                'bahanbaku.namabahan',
                'stok.stoktersedia',
                'stok.stokminimal'
            )
            ->orderBy('stok.stoktersedia', 'asc')
            ->get();

        /*
        |----------------------------------------------------------------------
        | RETURN VIEW MANAGER
        |----------------------------------------------------------------------
        */
        return view('manager.dashboard.dashboardmanager', compact(
            'totalProduk',
            'totalKategori',
            'totalMeja',
            'totalKasir',
            'shiftAktif',
            'penjualanHariIni',
            'pendapatanHariIni',
            'pendapatanBulanIni',
            'produkTerlaris',
            'stokMenipis'
        ));
    }
}