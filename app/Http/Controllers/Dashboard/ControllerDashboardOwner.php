<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelUser;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelMeja;
use App\Models\ModelPenjualan;
use App\Models\ModelShift;

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

        return view('admin.dashboard.dashboardadmin', compact(
            'totalUser',
            'totalProduk',
            'totalKategori',
            'totalMeja',
            'transaksiHariIni',
            'pendapatanHariIni',
            'diskonHariIni',
            'pajakHariIni',
            'shiftAktif'
        ));
    }
}