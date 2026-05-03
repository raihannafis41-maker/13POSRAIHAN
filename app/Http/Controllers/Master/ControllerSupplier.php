<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelSupplier;

class ControllerSupplier extends Controller
{
    public function index()
    {
        $data = ModelSupplier::orderBy('id', 'desc')->get();
        return view('admin.supplier.index', compact('data'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namasupplier' => 'required',
        ]);

        ModelSupplier::create([
            'namasupplier' => $request->namasupplier,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelSupplier::findOrFail($id);
        return view('admin.supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelSupplier::findOrFail($id);

        $request->validate([
            'namasupplier' => 'required',
        ]);

        $data->update([
            'namasupplier' => $request->namasupplier,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/supplier')->with('success', 'Supplier berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelSupplier::findOrFail($id);
        $data->delete();

        return redirect('/admin/supplier')->with('success', 'Supplier berhasil dihapus!');
    }
}