<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $aboutTitle ?? 'Default Title' }}</h2> <!-- Use a dynamic variable for title -->
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Tentang</li>
                <li>{{ $aboutTitle ?? 'Default Title' }}</li> <!-- Dynamic breadcrumb -->
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<main id="main">

    <!-- Inner Page Section -->
    <section class="inner-page">
      <div class="container">
      <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->type }}" class="img-fluid">
        <p>
        {{ $service->description }}
        </p>
      </div>
      
    </section>

</main><!-- End #main -->