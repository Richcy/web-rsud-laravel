@extends('layouts.app')

@section('title', 'RSUD Cimacan | Dokter')

@section('content')

<!-- ======= Hero Section ======= -->
<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Dokter</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">{{ $doctor->name }}</a>
    </div>
    <!-- End breadcumb -->
</div>
<!-- End Hero -->
<main id="main">
    <section id="doctors" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">{{ $doctor->name }}</h1>
            </div>
            <!-- Doctor details -->
            <div class="row">
                <div class="col-md-5 center-img">
                    <a href="{{ $doctor->img ? asset('storage/' . $doctor->img) : asset('assets/uploads/doctor.jpg') }}" class="gallery-lightbox">
                        <img class="size-img-detail" src="{{ $doctor->img ? asset('storage/' . $doctor->img) : asset('assets/uploads/doctor.jpg') }}">
                    </a>
                </div>
                <div class="col-md-7">
                    <table class="margin-top-table-doctor">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $doctor->name }}</td>
                            </tr>
                            <tr>
                                <td>Bidang Keahlian</td>
                                <td>{{ $doctor->field->name ?? 'No Field Assigned' }}</td>
                            </tr>
                            <tr>
                                <td>Kantor/Unit Kerja</td>
                                <td>{{ $doctor->office }}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>{{ $doctor->nip ? $doctor->nip : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Nomor SIP</td>
                                <td>{{ $doctor->sip ? $doctor->sip : '-' }}</td>
                            </tr>
                            <tr>
                                <td class="padding-button-schedule" colspan="2">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctor-detail">Cek Jadwal</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Doctor details -->

            <!-- Other Doctors -->

            <div class="section-title-other">
                <h2 class="title-page">Dokter Lainnya</h2>
            </div>
            <section id="doctors" class="doctors">
                <div class="row" id="list">
                    @foreach ($relatedDoctors as $rd)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <a href="{{ route('doctor.detail', ['id' => $rd->id]) }}">
                                <div class="member-img">
                                    <img src="{{ $rd->img ? asset('storage/' . $rd->img) : asset('storage/doctor-default.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $rd->name }}</h4>
                                    <span>{{ $rd->field->name ?? 'No Field Assigned' }}</span>
                                </div>

                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="event-home-all">
                    <a href="{{ url('dokter/') }}">Lihat Lainnya</a>
                </div>
            </section>
        </div>
    </section>
</main>
<!-- End #main -->

<!-- Modal detail doctor -->
<div class="modal fade" id="doctor-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-schedule">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped font-size-table">
                    <thead>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                        <th>Minggu</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $doctor->schedule->senin ?? '-' }}</td>
                            <td>{{ $doctor->schedule->selasa ?? '-' }}</td>
                            <td>{{ $doctor->schedule->rabu ?? '-' }}</td>
                            <td>{{ $doctor->schedule->kamis ?? '-' }}</td>
                            <td>{{ $doctor->schedule->jumat ?? '-' }}</td>
                            <td>{{ $doctor->schedule->sabtu ?? '-' }}</td>
                            <td>{{ $doctor->schedule->minggu ?? '-' }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.spesialis').select2();
        const galleryLightbox = GLightbox({
            selector: '.gallery-lightbox'
        });
    });
</script>

@endsection