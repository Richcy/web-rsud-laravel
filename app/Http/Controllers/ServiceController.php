<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function showAbout(string $about)
    {

        // Create an associative array to map the values
        $typeMapping = [
            'profil-rumah-sakit' => 'aboutProfile',
            'sambutan-direktur' => 'aboutDirectur',
            'struktur-organisasi' => 'aboutOrganization',
            'denah-rumah-sakit' => 'aboutSketch',
            'penilaian-mutu' => 'aboutQuality',
            'hak-dan-kewajiban-pasien' => 'aboutRight',
            'maklumat-pelayanan' => 'aboutNotice',
            'standard-pelayanan' => 'aboutStandard'
        ];

        // Use the mapping to get the type; default to $tentang if not found
        $type = $typeMapping[$about] ?? $$about; // Use null coalescing operator

        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Dynamically render a view based on the type
        return view('admin.about.' . $type, compact('service'));
    }

    public function showService(string $service)
    {

        // Create an associative array to map the values
        $typeMapping = [
            'layanan-unggulan' => 'serviceSuperior',
            'instalasi-rawat-jalan' => 'serviceOutpatientInstallation',
            'instalasi-rawat-inap' => 'serviceInpatientInstallation',
            'instalasi-gawat-darurat' => 'serviceEmergencyInstallation',
            'laboratorium' => 'serviceLaboratorium',
            'hemodialisis' => 'serviceHemodialysis',
            'rehabilitasi-medik' => 'serviceMedicalRehabilitation',
            'radiologi' => 'serviceRadiology',
            'farmasi' => 'servicePharmacy',
            'ambulan' => 'serviceAmbulance',
            'pengaduan' => 'serviceComplaint'
        ];

        // Use the mapping to get the type; default to $tentang if not found
        $type = $typeMapping[$service] ?? $$service; // Use null coalescing operator

        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Dynamically render a view based on the type
        return view('admin.service.' . $type, compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAbout(Request $request, string $type)
    {
        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Strip HTML tags from the description
        $request->merge([
            'description' => strip_tags($request->input('description')),
        ]);

        // Validate the request data
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable' allows the banner to be skipped
            'description' => 'required|string|min:8',
        ]);

         // Handle the file upload
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '.' . $banner->getClientOriginalExtension();
            
            // Store the banner
            $path = $banner->storeAs('banners', $bannerName, 'public');

            // Delete the old banner file
            if ($service->banner) {
                Storage::delete('public/' . $service->banner);
            }

        }else {
            // If no file is uploaded, keep the existing banner
            $path = $service->banner;
        }

        // Update the service description
        $service->update([
            'banner' => $path,
            'description' => $request->description,
            'type' => $type,
            'lang' => 'id',
        ]);

         // Return the same view with a success message
         return redirect()->route('admin.about.type', ['type' => $type])->with(['success' => 'Data successfully updated!']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateService(Request $request, string $type)
    {
        // Find the service by type or fail if not found
        $service = Service::where('type', $type)->first();

        // Strip HTML tags from the description
        $request->merge([
            'description' => strip_tags($request->input('description')),
        ]);

        // Validate the request data
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable' allows the banner to be skipped
            'description' => 'required|string|min:8',
        ]);

         // Handle the file upload
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '.' . $banner->getClientOriginalExtension();
            
            // Store the banner
            $path = $banner->storeAs('banners', $bannerName, 'public');

            // Delete the old banner file
            if ($service->banner) {
                Storage::delete('public/' . $service->banner);
            }

        }else {
            // If no file is uploaded, keep the existing banner
            $path = $service->banner;
        }

        // Update the service description
        $service->update([
            'banner' => $path,
            'description' => $request->description,
            'type' => $type,
            'lang' => 'id',
        ]);

         // Return the same view with a success message
         return redirect()->route('admin.service.type', ['type' => $type])->with(['success' => 'Data successfully updated!']);
    }
}
