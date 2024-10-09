<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Doctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $doctors = Doctor::get();

        //render view with products
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'office' => 'required',
            'experience' => 'required|numeric',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'alumni' => 'required',
            'nip' => 'required',
            'str' => 'required',
            'sip' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
            'lang' => 'required'
        ]);

        $img = $request->file('img');
        $imgname = $request->name . '.' . $request->file('img')->getClientOriginalExtension();
        $img->storeAs('public/doctors', $imgname);

        Doctor::create([
            'name' => $request->name,
            'field' => $request->field,
            'office' => $request->office,
            'experience' => $request->experience,
            'year' => $request->year,
            'month' => $request->month,
            'alumni' => $request->alumni,
            'nip' => $request->nip,
            'str' => $request->str,
            'sip' => $request->sip,
            'img' => $img,
            'status' => $request->status,
            'lang' => $request->lang,
        ]);

        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'office' => 'required',
            'experience' => 'required|numeric',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'alumni' => 'required',
            'nip' => 'required',
            'str' => 'required',
            'sip' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
            'lang' => 'required'
        ]);

        $doctor = Doctor::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $img->storeAs('public/doctors', $img->hashName());

            Storage::delete('public/doctors/' . $doctor->img);

            $doctor->update([
                'name' => $request->name,
                'field' => $request->field,
                'office' => $request->office,
                'experience' => $request->experience,
                'year' => $request->year,
                'month' => $request->month,
                'alumni' => $request->alumni,
                'nip' => $request->nip,
                'str' => $request->str,
                'sip' => $request->sip,
                'img' => $img->hashName(),
                'status' => $request->status,
                'lang' => $request->lang,
            ]);
        } else {
            $doctor->update([
                'name' => $request->name,
                'field' => $request->field,
                'office' => $request->office,
                'experience' => $request->experience,
                'year' => $request->year,
                'month' => $request->month,
                'alumni' => $request->alumni,
                'nip' => $request->nip,
                'str' => $request->str,
                'sip' => $request->sip,
                'status' => $request->status,
                'lang' => $request->lang,
            ]);
        }

        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $doctor = Doctor::findOrFail($id);
        Storage::delete('public/doctors/' . $doctor->image);
        $doctor->delete();
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
