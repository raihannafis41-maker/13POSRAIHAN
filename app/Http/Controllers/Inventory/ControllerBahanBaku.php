<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelBahanBaku;

class ControllerBahanBaku extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.inventory.bahanbaku.$file";
        }

        return "admin.inventory.bahanbaku.$file"; // default owner
    }

    public function index()
    {
        $data = ModelBahanBaku::orderBy('id', 'desc')->get();
        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        // manager boleh lihat halaman create, tapi tidak boleh simpan (optional)
        return view($this->viewPath('create'));
    }

    public function store(Request $request)
    {
        // jika manager tidak boleh tambah data, aktifkan ini
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Akses ditolak! Manager tidak boleh menambah bahan baku.');
        }

        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan',
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'nullable',
            'hargabeli' => 'required|numeric'
        ]);

        ModelBahanBaku::create($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view($this->viewPath('edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // jika manager tidak boleh edit data, aktifkan ini
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Akses ditolak! Manager tidak boleh mengubah bahan baku.');
        }

        $data = ModelBahanBaku::findOrFail($id);

        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan,' . $data->id,
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'nullable',
            'hargabeli' => 'required|numeric'
        ]);

        $data->update($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil diupdate!');
    }

    public function show($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }

    public function delete($id)
    {
        // jika manager tidak boleh delete data, aktifkan ini
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Akses ditolak! Manager tidak boleh menghapus bahan baku.');
        }

        $data = ModelBahanBaku::findOrFail($id);
        $data->delete();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil dihapus!');
    }
}