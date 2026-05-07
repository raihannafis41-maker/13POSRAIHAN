<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelShift;
use App\Models\ModelPenjualan;

class ControllerShift extends Controller
{
    // ==========================
    // INDEX SHIFT
    // ==========================
    public function index()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        return view('kasir.shift.index', compact('shiftAktif'));
    }

    // ==========================
    // FORM BUKA SHIFT
    // ==========================
    public function bukaShift()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        if ($shiftAktif) {
            return redirect()->route('kasir.shift.index')
                ->with('error', 'Shift masih OPEN, tidak bisa buka shift baru!');
        }

        return view('kasir.shift.bukashift');
    }

    // ==========================
    // PROSES BUKA SHIFT
    // ==========================
    public function prosesBukaShift(Request $request)
    {
        $request->validate([
            'saldoawal' => 'required|numeric|min:0',
        ]);

        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        if ($shiftAktif) {
            return redirect()->route('kasir.shift.index')
                ->with('error', 'Shift masih OPEN, tidak bisa buka shift baru!');
        }

        ModelShift::create([
            'userid' => Auth::id(),
            'shiftmulai' => now(),
            'shiftselesai' => null,
            'saldoawal' => $request->saldoawal,
            'saldoakhir' => null,
            'totaltransaksi' => 0,
            'status' => 'open',
        ]);

        return redirect()->route('kasir.shift.index')
            ->with('success', 'Shift berhasil dibuka!');
    }

    // ==========================
    // FORM TUTUP SHIFT (REALTIME)
    // ==========================
    public function tutupShift()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        if (!$shiftAktif) {
            return redirect()->route('kasir.shift.index')
                ->with('error', 'Tidak ada shift OPEN untuk ditutup!');
        }

        // ✅ HITUNG TRANSAKSI BERDASARKAN SHIFTID
        $totalTransaksi = ModelPenjualan::where('shiftid', $shiftAktif->id)
            ->where('status', 'paid')
            ->count();

        $totalPendapatan = ModelPenjualan::where('shiftid', $shiftAktif->id)
            ->where('status', 'paid')
            ->sum('total');

        $saldoAkhirOtomatis = $shiftAktif->saldoawal + $totalPendapatan;

        return view('kasir.shift.tutupshift', compact(
            'shiftAktif',
            'totalTransaksi',
            'totalPendapatan',
            'saldoAkhirOtomatis'
        ));
    }

    // ==========================
    // PROSES TUTUP SHIFT (AUTO UPDATE)
    // ==========================
    public function prosesTutupShift(Request $request)
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        if (!$shiftAktif) {
            return redirect()->route('kasir.shift.index')
                ->with('error', 'Tidak ada shift OPEN untuk ditutup!');
        }

        // ✅ HITUNG TRANSAKSI BERDASARKAN SHIFTID
        $totalTransaksi = ModelPenjualan::where('shiftid', $shiftAktif->id)
            ->where('status', 'paid')
            ->count();

        $totalPendapatan = ModelPenjualan::where('shiftid', $shiftAktif->id)
            ->where('status', 'paid')
            ->sum('total');

        $saldoAkhirOtomatis = $shiftAktif->saldoawal + $totalPendapatan;

        // UPDATE SHIFT
        $shiftAktif->update([
            'shiftselesai' => now(),
            'saldoakhir' => $saldoAkhirOtomatis,
            'totaltransaksi' => $totalTransaksi,
            'status' => 'closed',
        ]);

        return redirect()->route('kasir.shift.index')
            ->with('success', 'Shift berhasil ditutup! Total transaksi: ' . $totalTransaksi);
    }
}