<div class="space-xs visible-xs"></div>
<div class="container banner">
  <!-- Breadcumb -->
  <div class="breadcrumb-part">
    <a href="{{ url('/') }}">Home</a>
    <span><i class="fa fa-angle-right"></i></span>
    <a href="javascript:void(0);">Dokter</a>
  </div>
  <!-- End breadcumb -->
</div>

<main id="main">
  <section id="content" class="main-page">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h1 class="title-page">Dokter RSUD Cimacan</h1>
      </div>
      <!-- Search Section -->
      <div class="row-ln" style="display: table;">
        <div class="search-box">
          <div class="ln-wrap">
            <div class="ln-content">
              <div class="ln-desc">
                <form action="#" method="GET">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Spesialis</label>
                        <select class="form-control spesialis" id="" name="field">
                          <option value="">-- Semua Spesialis --</option>

                          <option value=""></option>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Dokter</label>
                        <input name="s" type="text" class="form-control input-search-doctor" placeholder="Masukkan keyword" value="">
                      </div>
                      <button type="submit" class="btn btn-primary" style="background-color: #01923f; border-color: #01923f;">Submit</button>

                      <a href="#" type="button" class="btn btn-primary button-reset">Reset</a>

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Search Section -->

      <!-- ======= Doctors Section ======= -->
      <section id="doctors" class="doctors section-bg">
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
                  <span>{{ $doctor->field }}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>


        </div>

      </section><!-- End Doctors Section -->