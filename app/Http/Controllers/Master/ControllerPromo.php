<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelPromo;

class ControllerPromo extends Controller
{
    public function index()
    {
        $data = ModelPromo::orderBy('id', 'desc')->get();
        return view('admin.promo.index', compact('data'));
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapromo' => 'required',
            'jenis' => 'required',
            'nilaidiskon' => 'required|numeric',
        ]);

        ModelPromo::create([
            'namapromo' => $request->namapromo,
            'jenis' => $request->jenis,
            'nilaidiskon' => $request->nilaidiskon,
            'minimalbelanja' => $request->minimalbelanja,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalselesai' => $request->tanggalselesai,
            'status' => 'aktif',
        ]);

        return redirect('/admin/promo')->with('success', 'Promo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelPromo::findOrFail($id);
        return view('admin.promo.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelPromo::findOrFail($id);

        $request->validate([
            'namapromo' => 'required',
            'jenis' => 'required',
            'nilaidiskon' => 'required|numeric',
            'status' => 'required',
        ]);

        $data->update([
            'namapromo' => $request->namapromo,
            'jenis' => $request->jenis,
            'nilaidiskon' => $request->nilaidiskon,
            'minimalbelanja' => $request->minimalbelanja,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalselesai' => $request->tanggalselesai,
            'status' => $request->status,
        ]);

        return redirect('/admin/promo')->with('success', 'Promo berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelPromo::findOrFail($id);
        $data->delete();

        return redirect('/admin/promo')->with('success', 'Promo berhasil dihapus!');
    }
}