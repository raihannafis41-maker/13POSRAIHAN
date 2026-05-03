<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelStokMasuk;

class ControllerStokMasuk extends Controller
{
    public function index()
    {
        $data = ModelStokMasuk::orderBy('id', 'desc')->get();
        return view('admin.inventory.stokmasuk.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stokmasuk.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('stokmasuk.index')->with('success', 'Stok Masuk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = ModelStokMasuk::findOrFail($id);
        return view('admin.inventory.stokmasuk.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelStokMasuk::findOrFail($id);
        return view('admin.inventory.stokmasuk.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('stokmasuk.index')->with('success', 'Stok Masuk berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelStokMasuk::findOrFail($id);
        $data->delete();

        return redirect()->route('stokmasuk.index')->with('success', 'Stok Masuk berhasil dihapus!');
    }
}