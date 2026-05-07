<?php

namespace App\Http\Controllers\ZonaKasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelZonaKasir;

class ControllerZonaKasir extends Controller
{
    public function index()
    {
        $userid = Auth::id();

        $data = ModelZonaKasir::where('userid', $userid)->first();

        // kalau belum ada data zonakasir untuk user, buat otomatis
        if (!$data) {
            $data = ModelZonaKasir::create([
                'userid' => $userid,
                'statusaktif' => 'aktif',
                'catatan' => 'Zona kasir aktif',
            ]);
        }

        // layout berdasarkan role
        $role = Auth::user()->role;

        if ($role == 'owner') {
            return view('admin.zonakasir.index', compact('data'));
        }

        if ($role == 'manager') {
            return view('manager.zonakasir.index', compact('data'));
        }

        // kasir
        return view('kasir.zonakasir.index', compact('data'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'statusaktif' => 'required|in:aktif,nonaktif',
            'catatan' => 'nullable|string',
        ]);

        $data = ModelZonaKasir::where('userid', Auth::id())->first();

        if (!$data) {
            $data = ModelZonaKasir::create([
                'userid' => Auth::id(),
                'statusaktif' => $request->statusaktif,
                'catatan' => $request->catatan,
            ]);
        } else {
            $data->update([
                'statusaktif' => $request->statusaktif,
                'catatan' => $request->catatan,
            ]);
        }

        return redirect()->back()->with('success', 'Zona kasir berhasil diupdate!');
    }
}