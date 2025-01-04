<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::get();


        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.events.create');
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
            'category' => 'required',
            'url' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'required',
            'status' => 'required',

        ]);

        $img = $request->file('img');
        $eventName = $request->title;
        $imgName = $eventName . '.' . $request->file('img')->getClientOriginalExtension();
        $path = $img->storeAs('events', $imgName, 'public');

        Event::create([
            'title' => $request->title,
            'sub_desc' => $request->sub_desc,
            'description' => $request->description,
            'category' => $request->category,
            'url' => $request->url,
            'img' => $path,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event'));
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
            'category' => 'required',
            'url' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'required',
            'status' => 'required',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $img->storeAs('public/events', $img->hashName());

            Storage::delete('public/events/' . $event->img);

            $event->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'url' => $request->url,
                'img' => $img->hashName(),
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'location' => $request->location,
                'status' => $request->status,
            ]);
        } else {
            $event->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'url' => $request->url,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'location' => $request->location,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        Storage::delete('public/events/' . $event->image);
        $event->delete();
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
