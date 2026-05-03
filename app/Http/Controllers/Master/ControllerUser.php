<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\ModelUser;

class ControllerUser extends Controller
{
    public function index()
    {
        $data = ModelUser::orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user,username',
            'email' => 'nullable|unique:user,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        ModelUser::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'foto' => null,
            'isactive' => 'active',
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelUser::findOrFail($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelUser::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user,username,' . $data->id,
            'email' => 'nullable|unique:user,email,' . $data->id,
            'role' => 'required',
        ]);

        $updateData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'isactive' => $request->isactive,
        ];

        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $data->update($updateData);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = ModelUser::findOrFail($id);
        $data->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}