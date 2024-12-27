<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\EventCategory;

class EventCategoryController extends Controller
{
    public function showEventCategory(): View
    {
        $eventCategories = EventCategory::get();
        return view('admin.events.event_category.index', compact('eventCategories'));
    }

    public function storeEventCategory(Request $request): RedirectResponse
    {
        EventCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('event.showEventCategory')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function updateEventCategory(Request $request, string $id): RedirectResponse
    {

        $eventCategory = EventCategory::findOrFail($id);

        $eventCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('event.showEventCategory')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroyEventCategory(string $id): RedirectResponse
    {
        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->delete();
        return redirect()->route('event.showEventCategory')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
