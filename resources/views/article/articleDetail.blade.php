@extends('layouts.app')

@section('title', 'RSUD Cimacan | {{$pageTitle}}')

@section('content')

<!-- ======= Hero Section ======= -->
<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">{{$pageTitle}}</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">{{ $article->title }}</a>
    </div>
    <!-- End breadcumb -->
</div>
<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="row space-detail">
                <div class="col-md-6 pad0">
                    <div class="detail-article">
                        {{ $article->category->name }} <span>|</span>
                        <span>{{ date('d F Y', strtotime($article->created_at)) }}</span>
                        <div><span><i class="fa fa-user"></i> {{ $article->author }}</span></div>
                    </div>
                </div>
                <div class="col-md-6 pad0 rightPosition">
                    <div class="side-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url($pageTitle == 'Cimanews' ? 'cimanews-' . $article->id . '.html' : 'article-' . $article->id . '.html') }}" target="_blank" class="share-link">
                            <img src="{{ asset('assets/fe/img/icon_facebook.png') }}" alt="facebook">
                        </a>

                        <!-- Twitter Share -->
                        <a href="https://twitter.com/intent/tweet?url={{ url($pageTitle == 'Cimanews' ? 'cimanews-' . $article->id . '.html' : 'article-' . $article->id . '.html') }}&text={{ $article->title }}" target="_blank" class="share-link">
                            <img src="{{ asset('assets/fe/img/icon_twitter.png') }}" alt="twitter">
                        </a>

                        <!-- WhatsApp Share -->
                        <a href="https://api.whatsapp.com/send?text={{ url($pageTitle == 'Cimanews' ? 'cimanews-' . $article->id . '.html' : 'article-' . $article->id . '.html') }}" target="_blank" class="share-link">
                            <img src="{{ asset('assets/fe/img/icon_whatsapp.png') }}" alt="whatsapp">
                        </a>

                    </div>
                </div>
            </div>
            <div class="section-title">
                <h1 class="title-page">{{ $article->title }}</h1>
            </div>
            <div class="container">
                <div class="content-section">
                    <div class="row">
                        <div class="col-md-7 min-font-size">
                            {{ $article->description }}
                        </div>

                        <div class="col-md-5">
                            <div class="gallery-title">Poster</div>
                            <div class="page-gallery-slider swiper">
                                <div class="swiper-wrapper1 align-items-center">
                                    <!-- Looping -->
                                    <div class="swiper-slide">
                                        @php
                                        $imageUrl = $article->img ? asset('storage/' . $article->img) : asset('storage/default-image.jpg');
                                        @endphp
                                        <div class="gallery-imgswiper-image" style="background-image: url('{{ $imageUrl }}');">
                                            <div class="gallery-imgswiper-content">
                                                <a href="{{ $article->img ? asset('storage/' . $article->img) : asset('storage/default-image.jpg') }}" class="gallery-imgswiper-zoom gallery-lightbox" rel="news">
                                                    <i class="fa fa-search"></i>
                                                    <div class="gallery-imgswiper-enlarge">Click to enlarge image</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Section -->
            <div class="section-title-other">
                <h2 class="title-page">{{$pageTitle}} Lainnya</h2>
            </div>
            <div class="row-listbox">
                <!-- Looping article -->
                @foreach ($relatedArticles as $ra)
                <div class="col-listbox">
                    <div class="listboxd-wrap">
                        @php
                        $imageUrl = $ra->img ? asset('storage/' . $ra->img) : asset('storage/default-image.jpg');
                        @endphp
                        <a href="{{ route($pageTitle == 'Cimanews' ? 'cimanews.detail' : 'article.detail', ['id' => $ra->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

                            <span style="opacity: 0;">
                                {{ $ra->title }}
                            </span>
                        </a>
                        <div class="listboxd-content">
                            <a href="{{ route($pageTitle == 'Cimanews' ? 'cimanews.detail' : 'article.detail', ['id' => $ra->id]) }}" class="listboxd-title min-heigt-title">
                                {{ $ra->title }}
                            </a>
                            <div class="listboxd-desc" id="desc_card">
                                {{ $ra->sub_desc ? substr($ra->sub_desc, 0, 150) : substr($ra->description, 0, 150) }}...
                            </div>
                            <div class="row up2 top-footer-card">
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-category">
                                        {{ $ra->category_name }}
                                    </div>
                                </div>
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-read">
                                        <a href="{{ route($pageTitle == 'Cimanews' ? 'cimanews.detail' : 'article.detail', ['id' => $ra->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="event-home-all">
                <a href="{{ url($pageTitle == 'Cimanews' ? 'cimanews' : 'artikel') }}">Lihat Lainnya</a>
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