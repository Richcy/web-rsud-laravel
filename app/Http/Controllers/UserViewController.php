<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Event;

class UserViewController extends Controller
{

    public function index()
    {
        // Retrieve and group required services by type
        $groupedServices = Service::whereIn('type', ['aboutDirectur', 'aboutNotice', 'aboutQuality', 'aboutOrganization'])
            ->get()
            ->keyBy('type');

        // Retrieve all doctors
        $doctors = Doctor::all();

        // Pass only the required variables to the view
        return view('index', [
            'directur' => $groupedServices->get('aboutDirectur'),
            'notice' => $groupedServices->get('aboutNotice'),
            'quality' => $groupedServices->get('aboutQuality'),
            'organization' => $groupedServices->get('aboutOrganization'),
            'doctors' => $doctors,
        ]);
    }

    public function showPage(string $slug)
    {
        // Create an associative array to map the values for about pages
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

        // Add the event page mapping
        $eventPages = [
            'event' => 'event', // Slug for events
        ];

        // Check if the slug is in the 'about' array
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
            $file = $aboutFiles[$type] ?? $type;

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
            $file = $serviceFiles[$type] ?? $type;

            // Dynamically render a view based on the type
            return view('service.' . $file, compact('service'));
        } elseif (array_key_exists($slug, $doctorPages)) {
            $file = $doctorPages[$slug];
            $doctors = Doctor::paginate(2);
            return view('doctor.' . $file, compact('doctors'));
        } elseif (array_key_exists($slug, $eventPages)) {
            $file = $eventPages[$slug];
            $events = Event::all(); // Fetch all events or use the relevant method to get a specific event
            return view('event.' . $file, compact('events'));
        }

        // If no match is found, return 404
        return abort(404);
    }

    public function doctorDetail($id)
    {
        // Retrieve the doctor's details using the ID
        $doctor = Doctor::find($id);

        // Return the view with doctor details
        return view('doctor.doctorDetail', compact('doctor'));
    }
}
