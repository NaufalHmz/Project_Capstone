@extends('landing-page.index')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <h1>Welcome to Medical</h1>
    <p align="justify">Memberikan pelayanan yang bermutu
      dan professional melalui <br /> sistem kerja yang efektif dan efisien</p>
    <a href="#about" class="btn-get-started scrollto">Get Started</a>
  </div>
</section><!-- End Hero -->

  <!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container">

    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="content">
          <h3>Mengapa pilih Medical?</h3>
          <p>
            Apotek Medical menyediakan kebutuhan obat-obatan baik obat bebas maupun obat resep.
            Apotek Online kami melayani sampai dengan 24jam dengan membuat rasa aman, mudah dan nyaman.
          </p>
          <div class="text-center">
            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="icon-boxes d-flex flex-column justify-content-center">
          <div class="row">
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i><img src="{{ asset('template/img/shield.ico') }}" class="img-fluid" alt=""></i>
                <h4>Aman</h4>
                <p>Karena kami selalu berkomitmen untuk menjaga keaslian dan kualitas produk yang kami tawarkan</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i><img src="{{ asset('template/img/EasyFind.ico') }}" class="img-fluid" alt=""></i>
                <h4>Mudah</h4>
                <p>Karena kami memberikan sistem yang mudah untuk dijalankan agar membantu memenuhi kebutuhan.</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i ><img src="{{ asset('template/img/chair.ico') }}" class="img-fluid" alt=""></i>
                <h4>Nyaman</h4>
                <p>Karena walaupun kami Online tetapi kami mempunyai Standar Operasional Prosedur (SOP) yang jelas
                  dari segi pelayanan, pengkajian produk dll.
                </p>
              </div>
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section><!-- End Why Us Section -->

<section id="article" class="article mt-3">
    <div class="container">

      <div class="section-title">
        <h2>Artikel</h2>
        <p>Dapatkan informasi seputar kesehatan, aturan, petunjuk penggunaan obat dan vitamin di sini</p>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Jantung</strong>
              <h5 class="mb-0">Catat, Ini Berbagai Jenis Penyakit Kardiovaskular</h5>
              <div class="mb-1 text-muted">Dec 12</div>
              <p class="card-text mb-auto"> Penyakit kardiovaskular adalah penyakit yang memengaruhi jantung dan pembuluh darah.</p>
              <a href="#" class="stretched-link">Lihat selengkapnya</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img src="{{ asset('assets/img/article-2.jpg') }}" class="bd-placeholder-img" width="200" height="250" />

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Kanker</strong>
              <h5 class="mb-0">Mengenal Angiosarcoma atau Kanker Pembuluh Darah yang Langka</h5>
              <div class="mb-1 text-muted">Dec 11</div>
              <p class="mb-auto"> Angiosarcoma adalah kanker pembuluh darah yang langka. Kanker ini bisa berkembang di mana saja.</p>
              <a href="#" class="stretched-link">Lihat selengkapnya</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img src="{{ asset('assets/img/article-3.jpg') }}" class="bd-placeholder-img" width="200" height="250" />

            </div>
          </div>
        </div>
      </div>
    </div>

</section><!-- End Article Section -->
@endsection
