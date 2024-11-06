<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Layanan</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">{{ $aboutTitle ?? 'Default Title' }}</a>
    </div>
    <!-- End breadcumb -->

    <div class="hidden-xs nhead-bg">
        <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->type }}" class="banner-image">
    </div>


</div>

<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">{{ $aboutTitle ?? 'Default Title' }}</h1>
            </div>
            <div class="container">
                <div class="content-section">
                    <div class="row">
                        <div class="col-md-12 min-font-size">
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>