@extends ('landing-page.index')
@section ('content')

<!-- ======= Article Section ======= -->
<section id="article" class="article">
    <div class="container">

      <div class="section-title">
        <h2>Artikel</h2>
        <p>Dapatkan informasi seputar kesehatan, aturan, petunjuk penggunaan obat dan vitamin di sini</p>
      </div>

      <div class="p-4 p-md-5 mb-4 rounded text-bg-dark" id="article-bg">
        <div class="col-md-6 px-0">
          <h2 class="display-4 fst-italic">Obat Flu dan Batuk Dewasa yang Bisa Dibeli Tanpa Resep</h2>
          <p class="lead my-3"> Flu dan batuk yang dialami dapat menyebabkan pengidapnya merasakan kondisi yang tidak nyaman.</p>
          <p class="lead mb-0"><a href="#" class="text-white fw-bold">Lihat selengkapnya...</a></p>
        </div>
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

        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">Mata</strong>
                <h5 class="mb-0">Mata Terasa Sakit saat Berkedip, Ini Penyebabnya</h5>
                <div class="mb-1 text-muted">Dec 10</div>
                <p class="card-text mb-auto"> Pernah merasa mata terasa sakit saat berkedip? Meski terbilang kondisi yang ringan.</p>
                <a href="#" class="stretched-link">Lihat selengkapnya</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('assets/img/article-4.jpg') }}" class="bd-placeholder-img" width="200" height="250" />

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">Kanker</strong>
                <h5 class="mb-0">Vaksin Booster COVID-19 Sebabkan Infeksi HIV, Mitos atau Fakta?</h5>
                <div class="mb-1 text-muted">Dec 10</div>
                <p class="mb-auto"> Demi melawan pandemi COVID-19 yang disebabkan oleh coronavirus tipe SARS-CoV-2.</p>
                <a href="#" class="stretched-link">Lihat selengkapnya</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('assets/img/article-5.jpg') }}" class="bd-placeholder-img" width="200" height="250" />

              </div>
            </div>
          </div>

      </div>
    </div>

</section><!-- End Article Section -->
@endsection
