<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelStokKeluar;

class ControllerStokKeluar extends Controller
{
    public function index()
    {
        $data = ModelStokKeluar::orderBy('id', 'desc')->get();
        return view('admin.inventory.stokkeluar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stokkeluar.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('stokkeluar.index')->with('success', 'Stok Keluar berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = ModelStokKeluar::findOrFail($id);
        return view('admin.inventory.stokkeluar.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelStokKeluar::findOrFail($id);
        return view('admin.inventory.stokkeluar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('stokkeluar.index')->with('success', 'Stok Keluar berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelStokKeluar::findOrFail($id);
        $data->delete();

        return redirect()->route('stokkeluar.index')->with('success', 'Stok Keluar berhasil dihapus!');
    }
}