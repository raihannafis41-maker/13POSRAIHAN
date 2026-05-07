<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelLaporanProduk;

class ControllerLaporanProduk extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;
        if ($role == 'manager') return "manager.laporan.produk.$file";
        return "admin.laporan.produk.$file";
    }

    public function index()
    {
        $data = ModelLaporanProduk::with(['user', 'produk'])
            ->orderBy('totalterjual', 'desc')
            ->get();

        return view($this->viewPath('index'), compact('data'));
    }

    public function show($id)
    {
        $data = ModelLaporanProduk::with(['user', 'produk'])->findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }
}