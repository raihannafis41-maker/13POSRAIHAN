<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelStok;

class ControllerStok extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.inventory.stok.$file";
        }

        return "admin.inventory.stok.$file";
    }

    public function index()
    {
        $data = ModelStok::with('bahanbaku')->orderBy('id', 'desc')->get();
        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        // jika manager tidak boleh create, kamu bisa kasih error
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Manager tidak punya izin menambah stok.');
        }

        return view($this->viewPath('create'));
    }

    public function edit($id)
    {
        // jika manager tidak boleh edit, aktifkan ini
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Manager tidak punya izin edit stok.');
        }

        $data = ModelStok::findOrFail($id);
        return view($this->viewPath('edit'), compact('data'));
    }

    public function show($id)
    {
        $data = ModelStok::with('bahanbaku')->findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }
}