<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelMetodePembayaran;

class ControllerMetodePembayaran extends Controller
{
    public function index()
    {
        $data = ModelMetodePembayaran::orderBy('id', 'desc')->get();
        return view('admin.metodepembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('admin.metodepembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namametode' => 'required',
            'jenis' => 'required',
        ]);

        ModelMetodePembayaran::create([
            'namametode' => $request->namametode,
            'jenis' => $request->jenis,
            'status' => 'aktif',
        ]);

        return redirect('/admin/metodepembayaran')->with('success', 'Metode pembayaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelMetodePembayaran::findOrFail($id);
        return view('admin.metodepembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelMetodePembayaran::findOrFail($id);

        $request->validate([
            'namametode' => 'required',
            'jenis' => 'required',
            'status' => 'required',
        ]);

        $data->update([
            'namametode' => $request->namametode,
            'jenis' => $request->jenis,
            'status' => $request->status,
        ]);

        return redirect('/admin/metodepembayaran')->with('success', 'Metode pembayaran berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelMetodePembayaran::findOrFail($id);
        $data->delete();

        return redirect('/admin/metodepembayaran')->with('success', 'Metode pembayaran berhasil dihapus!');
    }
}