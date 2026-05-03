<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelPembelian;

class ControllerPembelian extends Controller
{
    public function index()
    {
        $data = ModelPembelian::orderBy('id', 'desc')->get();
        return view('admin.inventory.pembelian.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.pembelian.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = ModelPembelian::findOrFail($id);
        return view('admin.inventory.pembelian.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelPembelian::findOrFail($id);
        return view('admin.inventory.pembelian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelPembelian::findOrFail($id);
        $data->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus!');
    }
}