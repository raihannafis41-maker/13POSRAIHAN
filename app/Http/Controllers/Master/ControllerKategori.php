<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKategori;

class ControllerKategori extends Controller
{
    public function index()
    {
        $data = ModelKategori::orderBy('id', 'desc')->get();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required',
        ]);

        ModelKategori::create([
            'namakategori' => $request->namakategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelKategori::findOrFail($id);
        return view('admin.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelKategori::findOrFail($id);

        $request->validate([
            'namakategori' => 'required',
        ]);

        $data->update([
            'namakategori' => $request->namakategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelKategori::findOrFail($id);
        $data->delete();

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}