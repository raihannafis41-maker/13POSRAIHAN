<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\ModelUser;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelMeja;
use App\Models\ModelPenjualan;
use App\Models\ModelShift;

// LAPORAN
use App\Models\ModelLaporanHarian;
use App\Models\ModelLaporanBulanan;
use App\Models\ModelLaporanProduk;
use App\Models\ModelLaporanKasir;
use App\Models\ModelLaporanShift;
use App\Models\ModelLaporanKeuntungan;

class ControllerDashboardOwner extends Controller
{
    public function index()
    {
        // total master data
        $totalUser     = ModelUser::count();
        $totalProduk   = ModelProduk::count();
        $totalKategori = ModelKategori::count();
        $totalMeja     = ModelMeja::count();

        // transaksi hari ini
        $transaksiHariIni = ModelPenjualan::whereDate('tanggalpenjualan', today())->count();

        $pendapatanHariIni = ModelPenjualan::whereDate('tanggalpenjualan', today())
            ->where('status', 'paid')
            ->sum('total');

        $diskonHariIni = ModelPenjualan::whereDate('tanggalpenjualan', today())
            ->where('status', 'paid')
            ->sum('diskon');

        $pajakHariIni = ModelPenjualan::whereDate('tanggalpenjualan', today())
            ->where('status', 'paid')
            ->sum('pajak');

        // shift aktif
        $shiftAktif = ModelShift::where('status', 'open')->latest()->first();


        /*
        |--------------------------------------------------------------------------
        | 5 LAPORAN TERBARU (NO DUMMY, REAL DB)
        |--------------------------------------------------------------------------
        */

        $laporanHarian = ModelLaporanHarian::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Harian',
                'tanggal' => $item->tanggal ?? $item->created_at,
                'total' => $item->totalpendapatan ?? $item->total ?? 0,
                'route' => route('laporan.harian.show', $item->id),
                'created_at' => $item->created_at
            ];
        });

        $laporanBulanan = ModelLaporanBulanan::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Bulanan',
                'tanggal' => $item->bulan ?? $item->created_at,
                'total' => $item->totalpendapatan ?? $item->total ?? 0,
                'route' => route('laporan.bulanan.show', $item->id),
                'created_at' => $item->created_at
            ];
        });

        $laporanProduk = ModelLaporanProduk::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Produk',
                'tanggal' => $item->tanggal ?? $item->created_at,
                'total' => $item->totalpenjualan ?? $item->total ?? 0,
                'route' => route('laporan.produk.show', $item->id),
                'created_at' => $item->created_at
            ];
        });

        $laporanKasir = ModelLaporanKasir::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Kasir',
                'tanggal' => $item->tanggal ?? $item->created_at,
                'total' => $item->totalpendapatan ?? $item->total ?? 0,
                'route' => route('laporan.kasir.show', $item->id),
                'created_at' => $item->created_at
            ];
        });

        $laporanShift = ModelLaporanShift::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Shift',
                'tanggal' => $item->tanggal ?? $item->created_at,
                'total' => $item->totalpendapatan ?? $item->total ?? 0,
                'route' => route('laporan.shift.show', $item->id),
                'created_at' => $item->created_at
            ];
        });

        $laporanKeuntungan = ModelLaporanKeuntungan::latest()->take(5)->get()->map(function ($item) {
            return [
                'jenis' => 'Keuntungan',
                'tanggal' => $item->tanggal ?? $item->created_at,
                'total' => $item->keuntungan ?? $item->total ?? 0,
                'route' => route('laporan.keuntungan.show', $item->id),
                'created_at' => $item->created_at
            ];
        });


        // gabungkan semua laporan jadi 1 collection lalu ambil 5 terbaru
        $laporanTerbaru = collect()
            ->merge($laporanHarian)
            ->merge($laporanBulanan)
            ->merge($laporanProduk)
            ->merge($laporanKasir)
            ->merge($laporanShift)
            ->merge($laporanKeuntungan)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();


        return view('admin.dashboard.dashboardadmin', compact(
            'totalUser',
            'totalProduk',
            'totalKategori',
            'totalMeja',
            'transaksiHariIni',
            'pendapatanHariIni',
            'diskonHariIni',
            'pajakHariIni',
            'shiftAktif',
            'laporanTerbaru'
        ));
    }
}