@extends('landing-page.index')
@section('content')

<!-- Medicine Detail Section -->
<section id="product-detail" class="product-detail">
  <div class="container">

    <div class="row">

      <div class="col-12 mb-3 d-flex justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('shop') }}">Obat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Obat</li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="product-detail-img">
          @if ($obat->foto != null)
            <img src="{{ asset('storage/'.$obat->foto) }}" alt="product image">
          @else
            <img src="{{ asset('assets/img/no-image.jpg') }}" alt="no photo">
          @endif
        </div>
      </div>
      <div class="col-lg-8">
        <div class="product-detail-content">
          <h3>{{ $obat->nama_obat }}</h3>
          <div class="detail-harga mb-5">
            <span>Rp. {{ number_format($obat->harga) }}</span>
          </div>

          <div class="detail-kategori">
            <h6 class="fw-bold">Golongan</h6>
            <p>{{ $obat->kategori_obat->nama_kategoriobat }}</p>
            <hr />
          </div>
          <div class="detail-dekripsi">
            <h6 class="fw-bold">Deskripsi</h6>
            <p>{{ $obat->keterangan }}</p>
            <hr />
          </div>
          <div class="detail-stok">
            <h6 class="fw-bold">Stok</h6>
            <p>{{ $obat->stock }}</p>
            <hr />
          </div>
          <div class="detail-kadaluwarsa">
            <h6 class="fw-bold">Tanggal Kadaluwarsa</h6>
            <p>{{ $obat->kadaluwarsa }}</p>
            <hr />
          </div>
          <div class="detail-kode">
            <h6 class="fw-bold">Kode Obat</h6>
            <p>{{ $obat->kode_obat }}</p>
          </div>
        </div>
      </div>

    </div>



  </div>
</section><!-- End Medicine Shop Section -->
@endsection

@section('script')
<script src="{{ asset('js/shop.js') }}"></script>
@endsection
