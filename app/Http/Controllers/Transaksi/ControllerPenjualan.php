<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelProduk;
use App\Models\ModelMeja;
use App\Models\ModelPromo;
use App\Models\ModelPajak;
use App\Models\ModelPenjualan;
use App\Models\ModelDetailPenjualan;
use App\Models\ModelPembayaran;
use App\Models\ModelMetodePembayaran;

class ControllerPenjualan extends Controller
{
    public function index(Request $request)
    {
        $produk = ModelProduk::where('status', 'aktif')->get();
        $meja = ModelMeja::all();

        $cart = session()->get('cart', []);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }

        return view('kasir.pos.index', compact('produk', 'meja', 'cart', 'subtotal'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'produkid' => 'required'
        ]);

        $produk = ModelProduk::findOrFail($request->produkid);

        $cart = session()->get('cart', []);

        if (isset($cart[$produk->id])) {
            $cart[$produk->id]['qty'] += 1;
            $cart[$produk->id]['subtotal'] = $cart[$produk->id]['qty'] * $cart[$produk->id]['harga'];
        } else {
            $cart[$produk->id] = [
                'produkid' => $produk->id,
                'namaproduk' => $produk->namaproduk,
                'harga' => $produk->hargajual,
                'qty' => 1,
                'subtotal' => $produk->hargajual
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('kasir.pos')->with('success', 'Produk ditambahkan');
    }

    public function hapus(Request $request)
    {
        $request->validate([
            'produkid' => 'required'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->produkid])) {
            unset($cart[$request->produkid]);
            session()->put('cart', $cart);
        }

        return redirect()->route('kasir.pos')->with('success', 'Produk dihapus');
    }

    public function reset()
    {
        session()->forget('cart');
        return redirect()->route('kasir.pos')->with('success', 'Transaksi direset');
    }

    public function pembayaran()
    {
        $cart = session()->get('cart', []);

        if (count($cart) < 1) {
            return redirect()->route('kasir.pos')->with('error', 'Keranjang masih kosong');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }

        $metode = ModelMetodePembayaran::where('status', 'aktif')->get();

        return view('kasir.pos.pembayaran', compact('cart', 'subtotal', 'metode'));
    }

    public function proses(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) < 1) {
            return redirect()->route('kasir.pos')->with('error', 'Keranjang kosong');
        }

        $request->validate([
            'metodepembayaranid' => 'required',
            'jumlahbayar' => 'required|numeric|min:0'
        ]);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }

        $total = $subtotal;
        $jumlahbayar = $request->jumlahbayar;
        $kembalian = $jumlahbayar - $total;

        if ($kembalian < 0) {
            return redirect()->back()->with('error', 'Uang pembayaran kurang!');
        }

        DB::beginTransaction();
        try {

            $penjualan = ModelPenjualan::create([
                'kodeinvoice' => 'INV-' . date('YmdHis'),
                'userid' => Auth::user()->id,
                'mejaid' => null,
                'promoid' => null,
                'pajakid' => null,
                'subtotal' => $subtotal,
                'diskon' => 0,
                'pajak' => 0,
                'total' => $total,
                'status' => 'paid',
                'tanggalpenjualan' => now()
            ]);

            foreach ($cart as $item) {
                ModelDetailPenjualan::create([
                    'penjualanid' => $penjualan->id,
                    'produkid' => $item['produkid'],
                    'qty' => $item['qty'],
                    'harga' => $item['harga'],
                    'subtotal' => $item['subtotal']
                ]);
            }

            ModelPembayaran::create([
                'penjualanid' => $penjualan->id,
                'metodepembayaranid' => $request->metodepembayaranid,
                'jumlahbayar' => $jumlahbayar,
                'kembalian' => $kembalian,
                'buktibayar' => null,
                'status' => 'paid'
            ]);

            DB::commit();

            session()->forget('cart');

            return redirect()->route('kasir.sukses', $penjualan->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('kasir.pos')->with('error', 'Gagal transaksi: ' . $e->getMessage());
        }
    }

    public function sukses($id)
    {
        $penjualan = ModelPenjualan::findOrFail($id);
        return view('kasir.pos.sukses', compact('penjualan'));
    }

    public function struk($id)
    {
        $penjualan = ModelPenjualan::findOrFail($id);

        $detail = ModelDetailPenjualan::where('penjualanid', $penjualan->id)->get();
        $pembayaran = ModelPembayaran::where('penjualanid', $penjualan->id)->first();

        return view('kasir.pos.struk', compact('penjualan', 'detail', 'pembayaran'));
    }
}