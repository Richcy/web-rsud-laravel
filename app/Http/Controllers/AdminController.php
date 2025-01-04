<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Admin;


use Illuminate\View\View;


use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function index(): View
    {

        $admins = Admin::get();


        return view('admin.admins.index', compact('admins'));
    }


    public function create(): View
    {
        return view('admin.admins.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'role' => 'required'
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {

        $admin = Admin::findOrFail($id);


        return view('admin.admins.show', compact('admin'));
    }

    public function edit(string $id): View
    {

        $admin = Admin::findOrFail($id);


        return view('admin.admins.edit', compact('admin'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'role' => 'required'
        ]);

        $admin->update([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {

        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
