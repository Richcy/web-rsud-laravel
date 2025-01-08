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
use App\Models\Career;

class UserViewController extends Controller
{

    public function index()
    {

        $groupedServices = Service::whereIn('type', ['aboutDirectur', 'aboutNotice', 'aboutQuality', 'aboutOrganization'])
            ->get()
            ->keyBy('type');


        $doctors = Doctor::with('field')->get();
        $articles = Article::whereHas('category', function ($query) {
            $query->where('name', 'cimanews'); // Assuming 'name' is the category column
        })
            ->limit(4) // Limit the results to 4 articles
            ->get();



        return view('index', [
            'directur' => $groupedServices->get('aboutDirectur'),
            'notice' => $groupedServices->get('aboutNotice'),
            'quality' => $groupedServices->get('aboutQuality'),
            'organization' => $groupedServices->get('aboutOrganization'),
            'doctors' => $doctors,
            'articles' => $articles
        ]);
    }

    public function showPage(string $slug, Request $request)
    {

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


        $eventPages = [
            'event' => 'event',
        ];

        $articlePages = [
            'artikel' => 'article',
            'cimanews' => 'cimanews'
        ];

        $contactPages = [
            'kontak' => 'contact',
        ];

        $careerPages = [
            'karir' => 'career',
        ];


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


            $file = $aboutFiles[$type] ?? $type;


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


            $file = $serviceFiles[$type] ?? $type;


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

            $file = $eventPages[$slug];


            $s = $request->get('s', '');
            $categorySelected = $request->get('category');


            $events = Event::with('category')
                ->when($categorySelected, function ($query, $categorySelected) {
                    return $query->where('category_id', $categorySelected);
                })
                ->when($s, function ($query, $s) {
                    return $query->where('title', 'like', '%' . $s . '%');
                })
                ->paginate(8);


            $eventCategories = EventCategory::all();


            return view('event.' . $file, compact('events', 'eventCategories', 'categorySelected', 's'));
        } elseif (array_key_exists($slug, $articlePages)) {


            $s = $request->get('s', '');
            $categorySelected = $request->get('category');


            $isCimanews = ($slug === 'cimanews');
            $pageTitle = $isCimanews ? 'Cimanews' : 'Artikel';


            $articles = Article::with('category')
                ->when($categorySelected, function ($query, $categorySelected) {
                    return $query->where('category_id', $categorySelected);
                })
                ->when($pageTitle === 'Cimanews', function ($query) {

                    return $query->whereHas('category', function ($query) {
                        $query->where('name', 'Cimanews');
                    });
                })
                ->when($pageTitle !== 'Cimanews', function ($query) {

                    return $query->whereDoesntHave('category', function ($query) {
                        $query->where('name', 'Cimanews');
                    });
                })
                ->when($s, function ($query, $s) {
                    return $query->where('title', 'like', '%' . $s . '%');
                })
                ->paginate(8);


            $articleCategories = ArticleCategory::where('name', '!=', 'Cimanews')->get();


            return view('article.article', compact('articles', 'articleCategories', 'categorySelected', 's', 'pageTitle'));
        } elseif (array_key_exists($slug, $contactPages)) {

            return view('contact.contact');
        } elseif (array_key_exists($slug, $careerPages)) {

            $s = $request->get('s', '');

            $careers = Career::query()
                ->when($s, function ($query, $s) {
                    return $query->where('title', 'like', '%' . $s . '%');
                })
                ->paginate(8);

            return view('career.career', compact('careers', 's'));
        }

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
        $event = Event::with('category')->findOrFail($id);
        $relatedEvents = Event::whereNotIn('id', [$id])->limit(4)->get();
        return view('event.eventDetail', compact('event', 'relatedEvents'));
    }

    public function articleDetail($id)
    {
        $article = Article::with('category')->findOrFail($id);

        $pageTitle = $article->category->name == 'Cimanews' ? 'Cimanews' : 'Artikel';


        if ($pageTitle === 'Cimanews') {

            $relatedArticles = Article::where('category_id', $article->category_id)
                ->whereNotIn('id', [$id])
                ->limit(4)
                ->get();
        } else {

            $relatedArticles = Article::whereDoesntHave('category', function ($query) {
                $query->where('name', 'Cimanews');
            })
                ->whereNotIn('id', [$id])
                ->limit(4)
                ->get();
        }

        return view('article.articleDetail', compact('article', 'relatedArticles', 'pageTitle'));
    }

    public function careerDetail($id)
    {
        $career = Career::findOrFail($id);
        $relatedCareers = Career::whereNotIn('id', [$id])->limit(4)->get();
        return view('career.careerDetail', compact('career', 'relatedCareers'));
    }
}
