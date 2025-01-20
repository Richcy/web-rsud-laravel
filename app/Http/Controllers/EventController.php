<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::get();


        return view('admin.events.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $eventCategories = EventCategory::get();
        return view('admin.events.event.create', compact('eventCategories'));
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
            'img' => 'nullable|image|mimes:jpeg,jpg,png',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'required'
        ]);

        if ($request->img) {
            $img = $request->file('img');
            $eventName = $request->title;
            $timestamp = now()->format('d-m-Y_H-i-s');
            $imgName = $eventName . '_' . $timestamp . '.' . $img->getClientOriginalExtension();
            $path = $img->storeAs('events', $imgName, 'public');

            Event::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category_id' => $request->category,
                'url' => $request->url,
                'img' => $path,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'location' => $request->location,
            ]);
        } else {
            Event::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category_id' => $request->category,
                'url' => $request->url,
                'img' => 'default.jpg',
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'location' => $request->location,
            ]);
        }

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.events.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $event = Event::findOrFail($id);
        $eventCategories = EventCategory::get();
        return view('admin.events.event.edit', compact('event', 'eventCategories'));
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
            'img' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'required',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $eventName = $request->title;
            $timestamp = now()->format('d-m-Y_H-i-s');
            $imgName = $eventName . '_' . $timestamp . '.' . $img->getClientOriginalExtension();

            $path = $img->storeAs('events', $imgName, 'public');
            if ($event->img && !str_contains($event->img, 'default.jpg')) {

                Storage::delete('public/' . $event->img);
            }

            $event->update([
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
            ]);
        }

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $event = event::findOrFail($id);

        if ($event->img && !str_contains($event->img, 'default.jpg')) {

            $path = 'public/' . $event->img;
            if (Storage::exists($path)) {
                Storage::delete($path);
            } else {
                Log::warning("File not found for deletion: " . $path);
            }
        }
        $event->delete();

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
