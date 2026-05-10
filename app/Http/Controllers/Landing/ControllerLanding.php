<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelPromo;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelKontak;

class ControllerLanding extends Controller
{
    public function home()
    {
        return view('landing.home');
    }

    public function menu(Request $request)
    {
        $query = ModelProduk::query();

        // hanya produk aktif
        $query->where('status', 'aktif');

        // search
        if ($request->q) {
            $query->where('namaproduk', 'like', '%' . $request->q . '%');
        }

        $produk = $query->orderBy('id', 'desc')->get();

        return view('landing.menu', compact('produk'));
    }

    public function promo(Request $request)
    {
        $query = ModelPromo::query();

        // hanya promo aktif
        $query->where('status', 'aktif');

        // search promo
        if ($request->q) {
            $query->where('namapromo', 'like', '%' . $request->q . '%');
        }

        $promo = $query->orderBy('id', 'desc')->get();

        return view('landing.promo', compact('promo'));
    }

    public function tentang()
    {
        return view('landing.tentang');
    }

    public function kontak()
    {
        return view('landing.kontak');
    }

    // ===============================
    // STORE KONTAK (POST /kontak)
    // ===============================
    public function storeKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subjek' => 'required|string|max:150',
            'pesan' => 'required|string|max:1000',
        ]);

        ModelKontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'tanggal' => date('Y-m-d'),
        ]);

        return redirect()
            ->route('landing.kontak')
            ->with('success', 'Pesan berhasil dikirim! Terima kasih sudah menghubungi kami.');
    }
}