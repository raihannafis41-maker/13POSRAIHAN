<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelLaporan;

class ControllerLaporan extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.laporan.$file";
        }

        return "admin.laporan.$file"; // default owner
    }

    public function index()
    {
        $data = ModelLaporan::orderBy('id', 'desc')->get();
        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        return view($this->viewPath('create'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenislaporan' => 'required',
            'periodeawal' => 'nullable|date',
            'periodeakhir' => 'nullable|date',
            'totaldata' => 'nullable|numeric'
        ]);

        ModelLaporan::create([
            'userid' => Auth::id(),
            'jenislaporan' => $request->jenislaporan,
            'periodeawal' => $request->periodeawal,
            'periodeakhir' => $request->periodeakhir,
            'totaldata' => $request->totaldata ?? 0,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = ModelLaporan::findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }

    public function edit($id)
    {
        $data = ModelLaporan::findOrFail($id);
        return view($this->viewPath('edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelLaporan::findOrFail($id);

        $request->validate([
            'jenislaporan' => 'required',
            'periodeawal' => 'nullable|date',
            'periodeakhir' => 'nullable|date',
            'totaldata' => 'nullable|numeric'
        ]);

        $data->update([
            'jenislaporan' => $request->jenislaporan,
            'periodeawal' => $request->periodeawal,
            'periodeakhir' => $request->periodeakhir,
            'totaldata' => $request->totaldata ?? 0,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelLaporan::findOrFail($id);
        $data->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus!');
    }
}