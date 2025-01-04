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
    public function showPage(string $slug)
    {

        $pages = [

            'profil-rumah-sakit' => ['type' => 'aboutProfile', 'folder' => 'about', 'file' => 'profile'],
            'sambutan-direktur' => ['type' => 'aboutDirectur', 'folder' => 'about', 'file' => 'directur'],
            'struktur-organisasi' => ['type' => 'aboutOrganization', 'folder' => 'about', 'file' => 'organization'],
            'denah-rumah-sakit' => ['type' => 'aboutSketch', 'folder' => 'about', 'file' => 'sketch'],
            'penilaian-mutu' => ['type' => 'aboutQuality', 'folder' => 'about', 'file' => 'quality'],
            'hak-dan-kewajiban-pasien' => ['type' => 'aboutRight', 'folder' => 'about', 'file' => 'right'],
            'maklumat-pelayanan' => ['type' => 'aboutNotice', 'folder' => 'about', 'file' => 'notice'],
            'standard-pelayanan' => ['type' => 'aboutStandard', 'folder' => 'about', 'file' => 'standard'],


            'layanan-unggulan' => ['type' => 'serviceSuperior', 'folder' => 'service', 'file' => 'superior'],
            'instalasi-rawat-jalan' => ['type' => 'serviceOutpatientInstallation', 'folder' => 'service', 'file' => 'outpatientInstallation'],
            'instalasi-rawat-inap' => ['type' => 'serviceInpatientInstallation', 'folder' => 'service', 'file' => 'inpatientInstallation'],
            'instalasi-gawat-darurat' => ['type' => 'serviceEmergencyInstallation', 'folder' => 'service', 'file' => 'emergencyInstallation'],
            'laboratorium' => ['type' => 'serviceLaboratorium', 'folder' => 'service', 'file' => 'laboratorium'],
            'hemodialisis' => ['type' => 'serviceHemodialysis', 'folder' => 'service', 'file' => 'hemodialysis'],
            'rehabilitasi-medik' => ['type' => 'serviceMedicalRehabilitation', 'folder' => 'service', 'file' => 'medicalRehabilitation'],
            'radiologi' => ['type' => 'serviceRadiology', 'folder' => 'service', 'file' => 'radiology'],
            'farmasi' => ['type' => 'servicePharmacy', 'folder' => 'service', 'file' => 'pharmacy'],
            'ambulan' => ['type' => 'serviceAmbulance', 'folder' => 'service', 'file' => 'ambulance'],
            'pengaduan' => ['type' => 'serviceComplaint', 'folder' => 'service', 'file' => 'complaint']
        ];


        if (isset($pages[$slug])) {
            $pageInfo = $pages[$slug];
            $service = Service::where('type', $pageInfo['type'])->first();


            if (!$service) {
                return abort(404);
            }


            return view('admin.' . $pageInfo['folder'] . '.' . $pageInfo['file'], compact('service'));
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function updatePage(Request $request, string $slug)
    {

        $service = Service::where('type', $slug)->first();


        $request->merge([
            'description' => strip_tags($request->input('description')),
        ]);


        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|min:8',
        ]);


        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '.' . $banner->getClientOriginalExtension();


            $path = $banner->storeAs('banners', $bannerName, 'public');


            if ($service->banner) {
                Storage::delete('public/' . $service->banner);
            }
        } else {

            $path = $service->banner;
        }


        $service->update([
            'banner' => $path,
            'description' => $request->description,
            'type' => $slug,
            'lang' => 'id',
        ]);

        $slugRoute = [
            'aboutProfile' => 'profil-rumah-sakit',
            'aboutDirectur' => 'sambutan-direktur',
            'aboutOrganization' => 'struktur-organisasi',
            'aboutSketch' => 'denah-rumah-sakit',
            'aboutQuality' => 'penilaian-mutu',
            'aboutRight' => 'hak-dan-kewajiban-pasien',
            'aboutNotice' => 'maklumat-pelayanan',
            'aboutStandard' => 'standard-pelayanan',
            'serviceSuperior' => 'layanan-unggulan',
            'serviceOutpatientInstallation' => 'instalasi-rawat-jalan',
            'serviceInpatientInstallation' => 'instalasi-rawat-inap',
            'serviceEmergencyInstallation' => 'instalasi-gawat-darurat',
            'serviceLaboratorium' => 'laboratorium',
            'serviceHemodialysis' => 'hemodialisis',
            'serviceMedicalRehabilitation' => 'rehabilitasi-medik',
            'serviceRadiology' => 'radiologi',
            'servicePharmacy' => 'farmasi',
            'serviceAmbulance' => 'ambulan',
            'serviceComplaint' => 'pengaduan'
        ];


        $route = $slugRoute[$slug] ?? $slug;


        return redirect()->route('admin.page.type', ['slug' => $route])->with(['success' => 'Data successfully updated!']);
    }
}
