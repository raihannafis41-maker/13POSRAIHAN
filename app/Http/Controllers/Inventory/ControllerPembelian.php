<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPembelian;
use App\Models\ModelDetailPembelian;
use App\Models\ModelSupplier;
use App\Models\ModelBahanBaku;

class ControllerPembelian extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.inventory.pembelian.$file";
        }

        return "admin.inventory.pembelian.$file";
    }

    // GENERATE KODE PEMBELIAN OTOMATIS
    private function generateKodePembelian()
    {
        $last = ModelPembelian::orderBy('id', 'desc')->first();
        $nextNumber = $last ? $last->id + 1 : 1;

        return 'PB-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function index()
    {
        $data = ModelPembelian::with('supplier', 'user')
            ->orderBy('id', 'desc')
            ->get();

        return view(
            $this->viewPath('index'),
            compact('data')
        );
    }

    public function create()
    {
        $supplier = ModelSupplier::orderBy('id', 'desc')->get();
        $bahanbaku = ModelBahanBaku::orderBy('id', 'desc')->get();

        return view(
            $this->viewPath('create'),
            compact('supplier', 'bahanbaku')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplierid' => 'required',
            'tanggalpembelian' => 'required|date',
            'total' => 'required|numeric|min:0'
        ]);

        $kode = $this->generateKodePembelian();

        $pembelian = ModelPembelian::create([
            'kodepembelian' => $kode,
            'supplierid' => $request->supplierid,
            'userid' => Auth::id(),
            'tanggalpembelian' => $request->tanggalpembelian,
            'total' => $request->total,
        ]);

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembelian = ModelPembelian::with('supplier', 'user')
            ->findOrFail($id);

        $detail = ModelDetailPembelian::with('bahanbaku')
            ->where('pembelianid', $id)
            ->get();

        return view(
            $this->viewPath('show'),
            compact('pembelian', 'detail')
        );
    }

    public function edit($id)
    {
        $pembelian = ModelPembelian::findOrFail($id);
        $supplier = ModelSupplier::all();

        return view(
            $this->viewPath('edit'),
            compact('pembelian', 'supplier')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplierid' => 'required',
            'tanggalpembelian' => 'required|date',
            'total' => 'required|numeric|min:0'
        ]);

        $pembelian = ModelPembelian::findOrFail($id);

        $pembelian->update([
            'supplierid' => $request->supplierid,
            'tanggalpembelian' => $request->tanggalpembelian,
            'total' => $request->total,
        ]);

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pembelian = ModelPembelian::findOrFail($id);

        // hapus detail pembelian dulu supaya aman (kalau ada foreign key)
        ModelDetailPembelian::where('pembelianid', $id)->delete();

        $pembelian->delete();

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil dihapus.');
    }
}