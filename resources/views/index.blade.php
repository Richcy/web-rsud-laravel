@extends('layouts.app')

@section('title', 'RSUD Cimacan | Beranda')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(img/slide/slide-1.jpg)">
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(img/slide/slide-2.jpg)">
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(img/slide/slide-3.jpg)">
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Departments Section ======= -->
  <section id="departments" class="departments">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Informasi Publik</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                <h4>Sambutan Direktur</h4>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                <h4>Maklumat</h4>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                <h4>Indeks Kepuasan Masyarakat</h4>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                <h4>Struktur Organisasi</h4>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-8">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <img src="{{ asset('storage/' .$directur->banner) }}" alt="" class="img-fluid">
              <p>{{ $directur->description }}</p>
            </div>
            <div class="tab-pane" id="tab-2">
              <img src="{{ asset('storage/' .$notice->banner) }}" alt="" class="img-fluid">
            </div>
            <div class="tab-pane" id="tab-3">
              <img src="{{ asset('storage/' .$quality->banner) }}" alt="" class="img-fluid">
            </div>
            <div class="tab-pane" id="tab-4">
              <img src="{{ asset('storage/' .$organization->banner) }}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Departments Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Layanan</h2>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
          <a href="{{ url('/layanan-unggulan') }}">
            <div class="icon"><i class="fas fa-notes-medical"></i></div>
          </a>
          <h4 class="title"><a href="{{ url('/layanan-unggulan') }}">Layanan Unggulan</a></h4>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
          <a href="{{ url('/instalasi-rawat-jalan') }}">
            <div class="icon"><i class="fas fa-stethoscope"></i></div>
          </a>
          <h4 class="title"><a href="{{ url('/instalasi-rawat-jalan') }}">Instalasi Rawat Jalan</a></h4>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
          <a href="{{ url('/instalasi-rawat-inap') }}">
            <div class="icon"><i class="fas fa-hospital"></i></div>
          </a>
          <h4 class="title"><a href="{ url('/instalasi-rawat-inap') }}">Instalasi Rawat Inap</a></h4>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
          <a href="{{ url('/instalasi-gawat-darurat') }}">
            <div class="icon"><i class="fas fa-ambulance"></i></div>
          </a>
          <h4 class="title"><a href="{{ url('/instalasi-gawat-darurat') }}">Instalasi Gawat Darurat</a></h4>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
          <a href="{{ url('/laboratorium') }}">
            <div class="icon"><i class="fas fa-dna"></i></div>
          </a>
          <h4 class="title"><a href="{{ url('/laboratorium') }}">Laboratorium</a></h4>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
          <a href="{{ url('/radiologi') }}">
            <div class="icon"><i class="fas fa-medkit"></i></div>
          </a>
          <h4 class="title"><a href="{{ url('/radiologi') }}">Radiologi</a></h4>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Doctors Section ======= -->
  <section id="doctors" class="doctors">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Dokter</h2>
      </div>

      <div class="row">
        @foreach($doctors as $doctor)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ asset('/storage/'.$doctor->img) }}" class="img-fluid" alt="{{ $doctor->name }}">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>{{ $doctor->name }}</h4>
              <span>{{ $doctor->field->name }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row row-home-doctor">
        <div class="button-doctor">
          <a href="{{ url('/dokter') }}" class="btn btn-primary btn-doctor">Dokter Lainnya</a>
        </div>
      </div>

    </div>
  </section><!-- End Doctors Section -->

  <!-- ======= Cimanews Section ======= -->
  <section id="cimanews" class="cimanews section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title mt-4">
        <h2>CIMANews</h2>
      </div>

      <div class="row-listbox">
        <!-- Looping article -->
        @forelse ($articles as $article)
        <div class="col-listbox col-box-home">
          <div class="listboxd-wrap">
            @php
            $imageUrl = $article->img ? asset('storage/' . $article->img) : asset('storage/default-image.jpg');
            @endphp
            <a href="{{ route('cimanews.detail', ['id' => $article->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

              <span style="opacity: 0;">
                {{ $article->title }}
              </span>
            </a>
            <div class="listboxd-content">
              <a href="{{ route('cimanews.detail', ['id' => $article->id]) }}" class="listboxd-title min-heigt-title">
                {{ $article->title }}
              </a>
              <div class="listboxd-desc" id="desc_card">
                {{ $article->sub_desc ? substr($article->sub_desc, 0, 150) : substr($article->description, 0, 150) }}...
              </div>
              <div class="row up2 top-footer-card">
                <div class="col-xs-6 pad0">
                  <div class="listboxd-category">
                    {{ $article->category_name }}
                  </div>
                </div>
                <div class="col-xs-6 pad0">
                  <div class="listboxd-read">
                    <a href="{{ route('cimanews.detail', ['id' => $article->id]) }}">Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <!-- End looping article -->
        <p class="empty-data">Data {{$pageTitle}} tidak tersedia</p>
        @endforelse
      </div>

      <div class="row row-home-doctor">
        <div class="button-doctor">
          <a href="{{ url('/cimanews') }}" class="btn btn-primary btn-doctor">Berita Lainnya</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Frequently Asked Questioins Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Frequently Asked Questions (FAQ)</h2>
      </div>

      <ul class="faq-list">

        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq1" class="collapse" data-bs-parent=".faq-list">
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq2" class="collapse" data-bs-parent=".faq-list">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq4" class="collapse" data-bs-parent=".faq-list">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq5" class="collapse" data-bs-parent=".faq-list">
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq6" class="collapse" data-bs-parent=".faq-list">
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section><!-- End Frequently Asked Questioins Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features section-bg">
    <div class="container" data-aos="fade-up">
      <div class="container">
        <div class="section-title">
          <h2>Layanan Pengaduan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 order-2 order-lg-1 mt-2" data-aos="fade-right">
          <div class="complain">
            <div class="icon-box">
              <i class="bx bx-user"></i>
              <p style="margin-top: 0px; margin-bottom: -10px;">Customer Service</p>
              <p>(Gedung B Lantai 3)</p>
            </div>
            <div class="icon-box">
              <img src="#">
              <p><a href="https://www.lapor.go.id/" target="_blank">SP4N LAPOR</a></p>
            </div>
            <div class="icon-box">
              <i class="bx bxl-whatsapp"></i>
              <p><a href="https://wa.me/6285864817874?text=Halo%20Kak%20.%20.%20." target="_blank">(+62) 858-6481-7874</a></p>
            </div>
            <div class="icon-box">
              <i class="bx bx-phone"></i>
              <p>0263-2956-036</p>
            </div>
            <div class="icon-box">
              <i class="bx bxl-instagram"></i>
              <p><a href="https://www.instagram.com/rsud.cimacan/" target="_blank">Instagram</a></p>
            </div>
            <div class="icon-box">
              <i class="bx bx-envelope"></i>
              <p>rsud.cimacann@gmail.com</p>
            </div>
            <div class="icon-box">
              <i class="bx bxl-facebook"></i>
              <p><a href="https://www.facebook.com/profile.php?id=100071691815827" target="_blank">Facebook</a></p>
            </div>
          </div>
        </div>
        <div class="image col-lg-8 order-1 order-lg-2" style='background-image: url("#");' data-aos="zoom-in"></div>
      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
        <h2>Kontak</h2>
      </div>
    </div>
    <div class="container">
      <div class="col-md-8 col-sm-12">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.403937234007!2d107.03033791384557!3d-6.720464567574099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c41c14b26fab%3A0x6230e0dec5dc2dd9!2sRumah%20Sakit%20Umum%20Daerah%20(RSUD)%20Cimacan!5e0!3m2!1sen!2sid!4v1637289497439!5m2!1sen!2sid" loading="lazy"></iframe>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="info-box">
          <i class="bx bx-map"></i>
          <h3>Alamat Kami</h3>
          <p>Jl. Raya Cimacan No.17A, Palasari, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat 43253</p>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection