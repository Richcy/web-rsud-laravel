<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Career;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $careers = Career::get();


        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'sub_desc' => 'required',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        if ($request->img) {
            $img = $request->file('img');
            $careerName = $request->title;
            $timestamp = now()->format('d-m-Y_H-i-s');
            $imgName = $careerName . '_' . $timestamp . '.' . $img->getClientOriginalExtension();
            $path = $img->storeAs('careers', $imgName, 'public');

            Career::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'img' => $path,
            ]);
        } else {
            Career::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'img' => 'default.jpg'
            ]);
        }

        return redirect()->route('karir.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $career = Career::findOrFail($id);

        return view('admin.careers.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $career = Career::findOrFail($id);

        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'sub_desc' => 'required',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $career = Career::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $careerName = $request->title;
            $timestamp = now()->format('d-m-Y_H-i-s');
            $imgName = $careerName . '_' . $timestamp . '.' . $img->getClientOriginalExtension();
            $path = $img->storeAs('careers', $imgName, 'public');
            if ($career->img && !str_contains($career->img, 'default.jpg')) {

                Storage::delete('public/' . $career->img);
            }

            $career->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'img' => $path
            ]);
        } else {
            $career->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('karir.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $career = career::findOrFail($id);

        if ($career->img && !str_contains($career->img, 'default.jpg')) {

            $path = 'public/' . $career->img;
            if (Storage::exists($path)) {
                Storage::delete($path);
            } else {
                Log::warning("File not found for deletion: " . $path);
            }
        }
        $career->delete();

        return redirect()->route('karir.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
