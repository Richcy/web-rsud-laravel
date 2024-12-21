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
        <a href="javascript:void(0);">Anu</a>
    </div>
    <!-- End breadcumb -->
</div>
<!-- End Hero -->
<main id="main">
    <section id="doctors" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page"><?= $doctor->name; ?></h1>
            </div>
            <!-- Doctor details -->
            <div class="row">
                <div class="col-md-5 center-img">
                    <a href="" class="gallery-lightbox">
                        <img class="size-img-detail" src="">
                    </a>
                </div>
                <div class="col-md-7">
                    <table class="margin-top-table-doctor">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Bidang Keahlian</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Kantor/Unit Kerja</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nomor SIP</td>
                                <td></td>
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
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <a href="">
                                <div class="member-img">
                                    <img src="" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>a</h4>
                                    <span>a</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="event-home-all">
                    <a href="">Lihat Lainnya</a>
                </div>
            </section>
        </div>
    </section>
</main>
<!-- End #main -->

@endsection