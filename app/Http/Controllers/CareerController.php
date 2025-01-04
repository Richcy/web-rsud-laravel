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
            'url' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
        ]);

        $img = $request->file('img');
        $careerName = $request->title;
        $imgName = $careerName . '.' . $request->file('img')->getClientOriginalExtension();
        $path = $img->storeAs('careers', $imgName, 'public');

        Career::create([
            'title' => $request->title,
            'sub_desc' => $request->sub_desc,
            'description' => $request->description,
            'url' => $request->url,
            'img' => $path,
            'status' => $request->status,
        ]);

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
            'url' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
        ]);

        $career = Career::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $img->storeAs('public/careers', $img->hashName());

            Storage::delete('public/careers/' . $career->img);

            $career->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'url' => $request->url,
                'img' => $img->hashName(),
                'status' => $request->status,
            ]);
        } else {
            $career->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'url' => $request->url,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('karir.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $career = Career::findOrFail($id);
        Storage::delete('public/careers/' . $career->image);
        $career->delete();
        return redirect()->route('karir.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
