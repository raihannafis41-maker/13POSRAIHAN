<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelMeja;

class ControllerMeja extends Controller
{
    public function index()
    {
        $data = ModelMeja::orderBy('id', 'desc')->get();
        return view('admin.meja.index', compact('data'));
    }

    public function create()
    {
        return view('admin.meja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomormeja' => 'required|unique:meja,nomormeja',
            'kapasitas' => 'required|numeric',
        ]);

        ModelMeja::create([
            'nomormeja' => $request->nomormeja,
            'kapasitas' => $request->kapasitas,
            'status' => 'kosong',
        ]);

        return redirect('/admin/meja')->with('success', 'Meja berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelMeja::findOrFail($id);
        return view('admin.meja.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelMeja::findOrFail($id);

        $request->validate([
            'nomormeja' => 'required|unique:meja,nomormeja,' . $data->id,
            'kapasitas' => 'required|numeric',
            'status' => 'required',
        ]);

        $data->update([
            'nomormeja' => $request->nomormeja,
            'kapasitas' => $request->kapasitas,
            'status' => $request->status,
        ]);

        return redirect('/admin/meja')->with('success', 'Meja berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelMeja::findOrFail($id);
        $data->delete();

        return redirect('/admin/meja')->with('success', 'Meja berhasil dihapus!');
    }
}