<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        $doctorSchedules = DoctorSchedule::with('doctor')->get();

        return view('admin.doctors.doctor_schedule.index', compact('doctors', 'doctorSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $filterDoctor = DoctorSchedule::pluck('doctor_id')->toArray();
        $filterDoctor = $doctors->whereNotIn('id', $filterDoctor);
        return view('admin.doctors.doctor_schedule.create', compact('filterDoctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DoctorSchedule::create([
            'doctor_id' => $request->doctor_id,
            'senin' => $request->senin_merged,
            'selasa' => $request->selasa_merged,
            'rabu' => $request->rabu_merged,
            'kamis' => $request->kamis_merged,
            'jumat' => $request->jumat_merged,
            'sabtu' => $request->sabtu_merged,
            'minggu' => $request->minggu_merged
        ]);



        return redirect()->route('jadwal-dokter.index')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctorSchedule = DoctorSchedule::findOrFail($id);
        $senin = $doctorSchedule->senin;
        $selasa = $doctorSchedule->selasa;
        $rabu = $doctorSchedule->rabu;
        $kamis = $doctorSchedule->kamis;
        $jumat = $doctorSchedule->jumat;
        $sabtu = $doctorSchedule->sabtu;
        $minggu = $doctorSchedule->minggu;
        if ($senin) {
            list($senin1, $senin2) = explode(' - ', $senin);
        } else {
            $senin1 = $senin2 = null;
        }
        if ($selasa) {
            list($selasa1, $selasa2) = explode(' - ', $selasa);
        } else {
            $selasa1 = $selasa2 = null;
        }
        if ($rabu) {
            list($rabu1, $rabu2) = explode(' - ', $rabu);
        } else {
            $rabu1 = $rabu2 = null;
        }
        if ($kamis) {
            list($kamis1, $kamis2) = explode(' - ', $kamis);
        } else {
            $kamis1 = $kamis2 = null;
        }
        if ($jumat) {
            list($jumat1, $jumat2) = explode(' - ', $jumat);
        } else {
            $jumat1 = $jumat2 = null;
        }
        if ($sabtu) {
            list($sabtu1, $sabtu2) = explode(' - ', $sabtu);
        } else {
            $sabtu1 = $sabtu2 = null;
        }
        if ($minggu) {
            list($minggu1, $minggu2) = explode(' - ', $minggu);
        } else {
            $minggu1 = $minggu2 = null;
        }
        return view('admin.doctors.doctor_schedule.edit', compact(
            'doctorSchedule',
            'senin1',
            'senin2',
            'selasa1',
            'selasa2',
            'rabu1',
            'rabu2',
            'kamis1',
            'kamis2',
            'jumat1',
            'jumat2',
            'sabtu1',
            'sabtu2',
            'minggu1',
            'minggu2'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctorSchedule = DoctorSchedule::findOrFail($id);

        $doctorSchedule->update([
            'senin' => $request->senin_merged ?? $doctorSchedule->senin,
            'selasa' => $request->selasa_merged ?? $doctorSchedule->selasa,
            'rabu' => $request->rabu_merged ?? $doctorSchedule->rabu,
            'kamis' => $request->kamis_merged ?? $doctorSchedule->kamis,
            'jumat' => $request->jumat_merged ?? $doctorSchedule->jumat,
            'sabtu' => $request->sabtu_merged ?? $doctorSchedule->sabtu,
            'minggu' => $request->minggu_merged ?? $doctorSchedule->minggu,
        ]);

        return redirect()->route('jadwal-dokter.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctorSchedule = DoctorSchedule::findOrFail($id);
        $doctorSchedule->delete();
        return redirect()->route('jadwal-dokter.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
