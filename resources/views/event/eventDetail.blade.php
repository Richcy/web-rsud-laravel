@extends('layouts.app')

@section('title', 'RSUD Cimacan | Event')

@section('content')

<!-- ======= Hero Section ======= -->
<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Event</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">{{ $event->title }}</a>
    </div>
    <!-- End breadcumb -->
</div>
<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">{{ $event->title }}</h1>
            </div>
            <div class="container">
                <div class="content-section">
                    <div class="row">
                        <div class="col-md-7 min-font-size">
                            {{ $event->description }}
                        </div>

                        <div class="col-md-5">
                            <div class="gallery-title">Poster</div>
                            <div class="page-gallery-slider swiper">
                                <div class="swiper-wrapper1 align-items-center">
                                    <!-- Looping -->
                                    <div class="swiper-slide">
                                        <div class="gallery-imgswiper-image" style="background-image: url('{{ $event->img ? asset('storage/' . $event->img) : asset('storage/default-image.jpg') }}');">
                                            <div class="gallery-imgswiper-content">
                                                <a href="{{ $event->img ? asset('storage/' . $event->img) : asset('storage/default-image.jpg') }}" class="gallery-imgswiper-zoom gallery-lightbox" rel="news">
                                                    <i class="fa fa-search"></i>
                                                    <div class="gallery-imgswiper-enlarge">Click to enlarge image</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datetime-event">Tanggal dan Waktu</div>
                            <div class="detail-date">{{ $event->start_date }}, {{ date('d M Y', strtotime($event->start_date)) }} - {{ $event->end_date }}, {{ date('d M Y', strtotime($event->end_date)) }}</div>
                            <div class="detail-time">{{ date('H:i', strtotime($event->start_time)) }} - {{ date('H:i', strtotime($event->end_time)) }}</div>

                            <div class="datetime-event">Lokasi</div>
                            <div class="detail-date">{{ $event->location ?: '-' }}</div>

                            <div class="datetime-event">Bagikan</div>
                            <div class="side-share">
                                <a href="javascript:void(0);" onclick="popUpSocmed('https://www.facebook.com/sharer/sharer.php?u={{ url('event-' . $event->id . '-' . '.html') }}','myWindow','500','300','yes');return false" class="share-link">
                                    <img src="{{ asset('assets/fe/img/icon_facebook.png') }}" alt="facebook">
                                </a>
                                <a href="javascript:void(0);" onclick="popUpSocmed('https://twitter.com/intent/tweet?url={{ url('event-' . $event->id . '-' . '.html') }}&text={{ $event->title }}');return false" class="share-link">
                                    <img src="{{ asset('assets/fe/img/icon_twitter.png') }}" alt="twitter">
                                </a>
                                <a href="javascript:void(0);" onclick="popUpSocmed('https://api.whatsapp.com/send?text={{ url('event-' . $event->id . '-' . '.html') }}','myWindow','600','300','yes');return false" data-action="share/whatsapp/share" class="share-link">
                                    <img src="{{ asset('assets/fe/img/icon_whatsapp.png') }}" alt="whatsapp">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Section -->
            <div class="section-title-other">
                <h2 class="title-page">Event Lainnya</h2>
            </div>
            <div class="row-listbox">
                <!-- Looping event -->
                @foreach ($relatedEvents as $re)
                <div class="col-listbox">
                    <div class="listboxd-wrap">
                        @php
                        $imageUrl = $re->img ? asset('storage/' . $re->img) : asset('storage/default-image.jpg');
                        @endphp
                        <a href="{{ route('event.detail', ['id' => $re->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

                            <span style="opacity: 0;">
                                {{ $re->title }}
                            </span>
                        </a>
                        <div class="listboxd-content">
                            <div class="row down1" style="height:50px;">
                                <div class="col-xs-12" style="padding-left:0;">
                                    <div class="listboxd-date">
                                        {{ date('d M Y', strtotime($re->start_date)) }} - {{ date('d M Y', strtotime($re->end_date)) }}
                                    </div>
                                    <div class="listboxd-location">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $re->location ? substr($re->location, 0, 35) . '....' : '-' }}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('event.detail', ['id' => $re->id]) }}" class="listboxd-title min-heigt-title">
                                {{ $re->title }}
                            </a>
                            <div class="listboxd-desc" id="desc_card">
                                {{ $re->sub_desc ? substr($re->sub_desc, 0, 150) : substr($re->description, 0, 150) }}...
                            </div>
                            <div class="row up2 top-footer-card">
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-category">
                                        {{ $re->category_name }}
                                    </div>
                                </div>
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-read">
                                        <a href="{{ route('event.detail', ['id' => $re->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="event-home-all">
                <a href="{{ url('event/') }}">Lihat Lainnya</a>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection

@section('js')

<script type="text/javascript">
    new Swiper('.page-gallery-slider', {
        speed: 400,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        navigation: {
            nextEl: '.swiper-next',
            prevEl: '.swiper-prev'
        },
    });

    const galleryLightbox = GLightbox({
        selector: '.gallery-lightbox'
    });

    var popupWindow = null;

    function popUpSocmed(url, winName, w, h, scroll) {
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
        popupWindow = window.open(url, winName, settings)
    }
</script>

@endsection