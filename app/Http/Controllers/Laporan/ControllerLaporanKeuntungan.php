<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelLaporanKeuntungan;

class ControllerLaporanKeuntungan extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;
        if ($role == 'manager') return "manager.laporan.keuntungan.$file";
        return "admin.laporan.keuntungan.$file";
    }

    public function index()
    {
        $data = ModelLaporanKeuntungan::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view($this->viewPath('index'), compact('data'));
    }

    public function show($id)
    {
        $data = ModelLaporanKeuntungan::with('user')->findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }
}