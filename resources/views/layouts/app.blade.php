<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'Default Title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-fe.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-fe-plus.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="{{ asset('img/logo.png') }}" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
          <li class="dropdown"><a href="#about"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/profil-rumah-sakit') }}">Profil Rumah Sakit</a></li>
              <li><a href="{{ url('/sambutan-direktur') }}">Sambutan Direktur</a></li>
              <li><a href="{{ url('/struktur-organisasi') }}">Struktur Organisasi</a></li>
              <li><a href="{{ url('/denah-rumah-sakit') }}">Denah Rumah Sakit</a></li>
              <li><a href="{{ url('/penilaian-mutu') }}">Penilaian Mutu</a></li>
              <li><a href="{{ url('/hak-dan-kewajiban-pasien') }}">Hak dan Kewajiban Pasien</a></li>
              <li><a href="{{ url('/maklumat-pelayanan') }}">Maklumat Pelayanan</a></li>
              <li><a href="{{ url('/standard-pelayanan') }}">Standard Pelayanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#services"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/layanan-unggulan') }}">Layanan Unggulan</a></li>
              <li><a href="{{ url('/instalasi-rawat-jalan') }}">Instalasi Rawat Jalan</a></li>
              <li><a href="{{ url('/instalasi-rawat-inap') }}">Instalasi Rawat Inap</a></li>
              <li><a href="{{ url('/instalasi-gawat-darurat') }}">Instalasi Gawat Darurat</a></li>
              <li><a href="{{ url('/laboratorium') }}">Laboratorium</a></li>
              <li><a href="{{ url('/hemodialisis') }}">Hemodialisis</a></li>
              <li><a href="{{ url('/rehabilitasi-medik') }}">Rehabilitasi Medik</a></li>
              <li><a href="{{ url('/radiologi') }}">Radiologi</a></li>
              <li><a href="{{ url('/farmasi') }}">Farmasi</a></li>
              <li><a href="{{ url('/ambulan') }}">Ambulance</a></li>
              <li><a href="{{ url('/pengaduan') }}">Pengaduan</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('/dokter') }}">Dokter</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/event') }}">Event</a></li>
          <li class="dropdown"><a href="{{ url('/artikel') }}""><span>Artikel</span> <i class=" bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/artikel') }}"">Informasi Kesehatan</a></li>
              <li><a href=" {{ url('/cimanews') }}"">CimaNEWS</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('/kontak') }}"">Kontak</a></li>
          <li><a class=" nav-link scrollto" href="{{ url('/karir') }}"">Karir</a></li>
        </ul>
        <i class=" bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Main Content ======= -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>RSUD Cimacan</h3>
              <p>
                Jl. Raya Cimacan No.17A, Palasari <br>
                Kec. Cipanas, Kabupaten Cianjur, Jawa Barat, Indonesia 43253 <br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p> <br>
              <h4>Kunjungi Sosial Media Kami:</h4>
              <div class="social-links mt-3">
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Persingkat Tautan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Profil Rumah Sakit</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sambutan Direktur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Struktur Organisasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Standard Pelayanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dokter</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Layanan Unggulan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instalasi Rawat Jalan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instalasi Rawat Inap</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Instalasi Gawat Darurat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Laboratorium</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Radiologi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hemodialisis</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Lainnya</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Event</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Informasi Kesehatan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CimaNEWS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Karir</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Pemerintahan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BPJS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kemenkes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PEMDA Cianjur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">DINKES Cianjur</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  @yield('js')

</body>

</html>