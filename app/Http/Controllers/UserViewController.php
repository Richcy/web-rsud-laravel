<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\FieldDoctor;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Article;
use App\Models\ArticleCategory;

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

    public function showPage(string $slug, Request $request)
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

        $articlePages = [
            'artikel' => 'article', // Slug for events
            'cimanews' => 'cimanews'
        ];

        $contactPages = [
            'kontak' => 'contact', // Slug for events
        ];

        $careerPages = [
            'karir' => 'career', // Slug for events
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
            $s = $request->get('s', '');
            $fieldSelected = $request->get('field');
            $doctors = Doctor::with('field')
                ->when($fieldSelected, function ($query, $fieldSelected) {
                    return $query->where('field_id', $fieldSelected);
                })
                ->when($s, function ($query, $s) {
                    return $query->where('name', 'like', '%' . $s . '%');
                })
                ->paginate(8);
            $doctorFields = FieldDoctor::all();
            return view('doctor.' . $file, compact('doctors', 'doctorFields', 'fieldSelected', 's'));
        } elseif (array_key_exists($slug, $eventPages)) {
            // Identify the view file to use
            $file = $eventPages[$slug];

            // Retrieve search and filter parameters
            $s = $request->get('s', '');
            $categorySelected = $request->get('category');

            // Query events with filters
            $events = Event::with('category') // Assuming a 'category' relationship exists
                ->when($categorySelected, function ($query, $categorySelected) {
                    return $query->where('category_id', $categorySelected);
                })
                ->when($s, function ($query, $s) {
                    return $query->where('title', 'like', '%' . $s . '%'); // Assuming 'title' is the searchable field
                })
                ->paginate(8); // Adjust pagination as needed

            // Fetch all categories for filtering
            $eventCategories = EventCategory::all();

            // Pass data to the view
            return view('event.' . $file, compact('events', 'eventCategories', 'categorySelected', 's'));
        } elseif (array_key_exists($slug, $articlePages)) {
            // Identify the view file to use
            $file = $articlePages[$slug];

            // Retrieve search and filter parameters
            $s = $request->get('s', '');
            $categorySelected = $request->get('category');

            // Query events with filters
            $articles = Article::with('category') // Assuming a 'category' relationship exists
                ->when($categorySelected, function ($query, $categorySelected) {
                    return $query->where('category_id', $categorySelected);
                })
                ->when($s, function ($query, $s) {
                    return $query->where('title', 'like', '%' . $s . '%'); // Assuming 'title' is the searchable field
                })
                ->paginate(8); // Adjust pagination as needed

            // Fetch all categories for filtering
            $articleCategories = ArticleCategory::all();

            // Pass data to the view
            return view('article.' . $file, compact('articles', 'articleCategories', 'categorySelected', 's'));
        }

        // If no match is found, return 404
        return abort(404);
    }

    public function doctorDetail($id)
    {
        $doctor = Doctor::with('schedule')->findOrFail($id);
        $relatedDoctors = Doctor::whereNotIn('id', [$id])->limit(4)->get();
        return view('doctor.doctorDetail', compact('doctor', 'relatedDoctors'));
    }

    public function eventDetail($id)
    {
        $event = Event::with('category')->findOrFail($id); // Load event and its related category
        $relatedEvents = Event::whereNotIn('id', [$id])->limit(4)->get(); // Fetch related events excluding the current one
        return view('event.eventDetail', compact('event', 'relatedEvents'));
    }

    public function articleDetail($id)
    {
        $article = Article::with('category')->findOrFail($id); // Load article and its related category
        $relatedArticles = Article::whereNotIn('id', [$id])->limit(4)->get(); // Fetch related articles excluding the current one
        return view('article.articleDetail', compact('article', 'relatedArticles'));
    }
}
