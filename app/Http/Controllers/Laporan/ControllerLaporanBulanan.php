<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelLaporanBulanan;

class ControllerLaporanBulanan extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;
        if ($role == 'manager') return "manager.laporan.bulanan.$file";
        return "admin.laporan.bulanan.$file";
    }

    public function index()
    {
        $data = ModelLaporanBulanan::with('user')
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->get();

        return view($this->viewPath('index'), compact('data'));
    }

    public function show($id)
    {
        $data = ModelLaporanBulanan::with('user')->findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }
}