<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelStok;

class ControllerStok extends Controller
{
    public function index()
    {
        $data = ModelStok::orderBy('id', 'desc')->get();
        return view('admin.inventory.stok.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stok.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = ModelStok::findOrFail($id);
        return view('admin.inventory.stok.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelStok::findOrFail($id);
        return view('admin.inventory.stok.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('stok.index')->with('success', 'Stok berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelStok::findOrFail($id);
        $data->delete();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus!');
    }
}