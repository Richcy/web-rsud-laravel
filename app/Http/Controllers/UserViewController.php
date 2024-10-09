<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Doctor;

class UserViewController extends Controller
{

    public function index() 
    {
        // Retrieve all required services in one query
        $services = Service::whereIn('type', ['aboutDirectur', 'aboutNotice', 'aboutQuality', 'aboutOrganization'])->get();

        // Group services by their 'type'
        $groupedServices = $services->keyBy('type');

        // Pass the grouped services to the view
        return view('index', [
            'services' => Service::all(),
            'directur' => $groupedServices->get('aboutDirectur'),
            'notice' => $groupedServices->get('aboutNotice'),
            'quality' => $groupedServices->get('aboutQuality'),
            'organization' => $groupedServices->get('aboutOrganization')
        ]);
    }

    public function showPage(string $slug)
    {
         // Create an associative array to map the values
        $aboutPages = [
            'profil-rumah-sakit' => 'aboutProfile',
            'sambutan-direktur' => 'aboutDirectur',
            'struktur-organisasi' => 'aboutOrganization',
            'denah-rumah-sakit' => 'aboutSketch',
            'penilaian-mutu' => 'aboutQuality',
            'hak-dan-kewajiban-pasien' => 'aboutRight',
            'maklumat-pelayanan' => 'aboutNotice',
            'standard-pelayanan' => 'aboutStandard'
        ];

        // Create an associative array to map the URL slug to the service type
        $servicePages = [
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

        $doctorPages = [
            'dokter' => 'doctor',
        ];

         // Check if the slug is in the 'about' or 'service' array
        if (array_key_exists($slug, $aboutPages)) {
            $type = $aboutPages[$slug];
            $service = Service::where('type', $type)->first();

            if (!$service) {
                return abort(404);
            }

            $aboutFiles = [
                'aboutProfile' => 'profile',
                'aboutDirectur' => 'directur',
                'aboutOrganization' => 'organization',
                'aboutSketch' => 'sketch',
                'aboutQuality' => 'quality',
                'aboutRight' => 'right',
                'aboutNotice' => 'notice',
                'aboutStandard' => 'standard'
            ];
    
            // Use the mapping to get the type; default to $type if not found
            $file = $aboutFiles[$type] ?? $type; // Use null coalescing operator

            // Dynamically render a view based on the type
            return view('about.' . $file, compact('service'));

        } elseif (array_key_exists($slug, $servicePages)) {
            $type = $servicePages[$slug];
            $service = Service::where('type', $type)->first();

            if (!$service) {
                return abort(404);
            }

            $serviceFiles = [
                'serviceSuperior' => 'superior',
                'serviceOutpatientInstallation' => 'outpatientInstallation',
                'serviceInpatientInstallation' => 'inpatientInstallation',
                'serviceEmergencyInstallation' => 'emergencyInstallation',
                'serviceLaboratorium' => 'laboratorium',
                'serviceHemodialysis' => 'hemodialysis',
                'serviceMedicalRehabilitation' => 'medicalRehabilitation',
                'serviceRadiology' => 'radiology',
                'servicePharmacy' => 'pharmacy',
                'serviceAmbulance' => 'ambulance',
                'serviceComplaint' => 'complaint'
            ];

            // Use the mapping to get the type; default to $type if not found
            $file = $serviceFiles[$type] ?? $type; // Use null coalescing operator

            // Dynamically render a view based on the type
            return view('service.' . $file, compact('service'));
        } else {

            $file = $doctorPages[$slug];

            $doctor = Doctor::all();

            return view('doctor.' . $file, compact('doctor'));
        }



        // If no match is found, return 404
        return abort(404);
    }

}
