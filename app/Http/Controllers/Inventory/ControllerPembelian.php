<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelPembelian;

class ControllerPembelian extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.inventory.pembelian.$file";
        }

        return "admin.inventory.pembelian.$file";
    }

    public function index()
    {
        $data = ModelPembelian::with(['supplier', 'user'])->orderBy('id', 'desc')->get();
        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        // jika manager tidak boleh create pembelian
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Manager tidak punya izin membuat pembelian.');
        }

        return view($this->viewPath('create'));
    }

    public function edit($id)
    {
        // jika manager tidak boleh edit pembelian
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Manager tidak punya izin edit pembelian.');
        }

        $data = ModelPembelian::findOrFail($id);
        return view($this->viewPath('edit'), compact('data'));
    }

    public function show($id)
    {
        $data = ModelPembelian::with(['supplier', 'user'])->findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }
}