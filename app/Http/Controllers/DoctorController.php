<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Doctor;
use App\Models\FieldDoctor;
use App\Models\FeaturedDoctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index(): View
    {
        $doctors = Doctor::get();
        return view('admin.doctors.doctor.index', compact('doctors'));
    }

    public function create(): View
    {
        return view('admin.doctors.doctor.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'office' => 'required',
            'nip' => 'required',
            'sip' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $img = $request->file('img');
        $doctorName = $request->name;
        $imgName = $doctorName . '.' . $request->file('img')->getClientOriginalExtension();
        $path = $img->storeAs('doctors', $imgName, 'public');

        Doctor::create([
            'name' => $request->name,
            'field' => $request->field,
            'office' => $request->office,
            'nip' => $request->nip,
            'sip' => $request->sip,
            'img' => $path,
            'lang' => 'id',
        ]);

        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.doctor.show', compact('doctor'));
    }

    public function edit(string $id): View
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'office' => 'required',
            'nip' => 'required',
            'sip' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
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
                'nip' => $request->nip,
                'sip' => $request->sip,
                'img' => $img->hashName(),
            ]);
        } else {
            $doctor->update([
                'name' => $request->name,
                'field' => $request->field,
                'office' => $request->office,
                'nip' => $request->nip,
                'sip' => $request->sip,
            ]);
        }

        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $doctor = Doctor::findOrFail($id);
        Storage::delete('public/doctors/' . $doctor->image);
        $doctor->delete();
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showFieldDoctor(): View
    {
        $fieldDoctors = FieldDoctor::get();
        return view('admin.doctors.doctorfield.index', compact('fieldDoctors'));
    }

    public function storeFieldDoctor(Request $request): RedirectResponse
    {
        FieldDoctor::create([
            'name' => $request->name,
            'lang' => 'id',
        ]);

        return redirect()->route('dokter.showDoctorField')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function updateFieldDoctor(Request $request, string $id): RedirectResponse
    {

        $fieldDoctor = FieldDoctor::findOrFail($id);

        $fieldDoctor->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dokter.showDoctorField')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroyFieldDoctor(string $id): RedirectResponse
    {
        $fieldDoctor = FieldDoctor::findOrFail($id);
        $fieldDoctor->delete();
        return redirect()->route('dokter.showDoctorField')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showFeaturedDoctor(): View
    {
        $doctors = Doctor::all();
        $featuredDoctors = FeaturedDoctor::with('doctor')->get();
        $filterDoctor = FeaturedDoctor::pluck('doctor_id')->toArray();
        $filterDoctor = $doctors->whereNotIn('id', $filterDoctor);
        $featuredDoctorCount = $featuredDoctors->count();

        return view('admin.doctors.featureddoctor.index', compact('doctors', 'featuredDoctors', 'filterDoctor', 'featuredDoctorCount'));
    }


    public function storeFeaturedDoctor(Request $request): RedirectResponse
    {
        FeaturedDoctor::create([
            'doctor_id' => $request->doctor_id
        ]);

        return redirect()->route('dokter.showFeaturedDoctor')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function destroyFeaturedDoctor(string $id): RedirectResponse
    {
        $featuredDoctor = FeaturedDoctor::findOrFail($id);
        $featuredDoctor->delete();
        return redirect()->route('dokter.showFeaturedDoctor')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
