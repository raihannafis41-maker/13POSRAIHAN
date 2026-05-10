<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\ModelPenjualan;
use App\Models\ModelDetailPenjualan;
use App\Models\ModelPembayaran;
use App\Models\ModelCetakStruk;
use Carbon\Carbon;

class ControllerCetakStruk extends Controller
{
    public function index()
    {
        $data = ModelPenjualan::orderBy('id', 'desc')->get();

        return view('kasir.pos.showstruk', compact('data'));
    }

 public function show($id)
{
    $penjualan = ModelPenjualan::with([
        'detailpenjualan.produk',
        'pembayaran.metode'
    ])->findOrFail($id);

    $detail = $penjualan->detailpenjualan;
    $pembayaran = $penjualan->pembayaran;

    return view('kasir.pos.struk', compact(
        'penjualan',
        'detail',
        'pembayaran'
    ));
}

public function print($id)
{
    $penjualan = ModelPenjualan::with([
        'detailpenjualan.produk',
        'pembayaran.metode'
    ])->findOrFail($id);

    ModelCetakStruk::create([
        'penjualanid'  => $penjualan->id,
        'strukfile'    => null,
        'tanggalcetak' => Carbon::now(),
    ]);

    $detail = $penjualan->detailpenjualan;
    $pembayaran = $penjualan->pembayaran;

    return view('kasir.pos.strukprint', compact(
        'penjualan',
        'detail',
        'pembayaran'
    ));
}
}