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
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, provident! Eius debitis, velit vero nostrum reprehenderit voluptatem obcaecati. Velit, ducimus! Sapiente, quis. Consequuntur ex animi eveniet quidem corporis placeat omnis.
        </p>
      </div>
    </section>

</main><!-- End #main -->