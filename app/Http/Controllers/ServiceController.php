<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $type)
    {
        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Dynamically render a view based on the type
        return view('admin.tentang.' . $type, compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $type)
    {
        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Strip HTML tags from the description
        $request->merge([
            'description' => strip_tags($request->input('description')),
        ]);

        // Validate the request data
        $request->validate([
            'description' => 'required|string|min:8',
        ]);

        // Update the service description
        $service->update([
            'banner' => 'default-banner.jpg',
            'description' => $request->description,
            'type' => $type,
            'lang' => 'id',
        ]);

         // Return the same view with a success message
         return redirect()->route('admin.tentang.type', ['type' => $type])->with(['success' => 'Data successfully updated!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
