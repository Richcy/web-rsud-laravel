<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model product
use App\Models\Admin; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // Display a listing of the admins
    public function index() : View
    {
        //get all admins
        $admins = Admin::get();

        //render view with admins
        return view('admin.admins.index', compact('admins'));
    }

    // Show the form for creating a new admin
    public function create() : View
    {
        return view('admin.admins.create');
    }

    // Store a newly created admin in the database
    public function store(Request $request) : RedirectResponse
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
        //get admin by ID
        $admin = Admin::findOrFail($id);

        //render view with admin
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(string $id): View
    {
        //get admin by ID
        $admin = Admin::findOrFail($id);

        //render view with admin
        return view('admin.admins.edit', compact('admin'));
    }

    // Update an admin's details in the database
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

    // Delete an admin
    public function destroy($id) : RedirectResponse
    {
        //get admin by ID
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

