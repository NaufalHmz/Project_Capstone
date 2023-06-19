@extends('landing-page.index')
@section('content')

<!-- Shop Section -->
    <section id="shops" class="shops">
      <div class="container">

        <div class="input-group mb-3" role="search">
          <span class="input-group-text">
            <i class="bi bi-search"></i>
          </span>
          <input class="form-control" value="{{ $keyword }}" type="text" id="search" placeholder="Cari Obat..." aria-label="Search">
        </div>

        <div class="row">

          <div class="col-lg-3">
            <div class="shop-sidebar">
              <div class="mb-3">
                <i class="bi bi-funnel-fill"></i>
                <span>Filter</span>
              </div>

                <div class="row me-3">
                  <div class="col-12 fw-semibold">Kategori</div>
                  @foreach($kategori as $kat)
                  <div class="col-12 mb-2">
                    <input type="checkbox" name="category" class="category" value="{{ $kat->id }}">
                    {{ $kat->nama_kategoriobat }}
                  </div>
                  @endforeach
                  <hr />
                </div>

            </div>
          </div>

          <div class="col-lg-9">
            <div class="shop-product mb-3">

              <div class="w-100 mb-3">
                <div class="shop-found-selector d-flex justify-content-end">
                    <div class="shop-selector">
                        <label>Sort By :</label>
                        <select id="sort" name="sortingBy">
                            <option value="">Default sorting</option>
                            <option value="low-high" id="lowToHigh">Price: Low to High</option>
                            <option value="high-low" id="highToLow">Price: High to Low</option>
                        </select>

                    </div>
                </div>
              </div>

              <div class="shop-product-content">
                <div class="row">
                  @foreach($data as $obat)
                  <div class="col-md-6 col-lg-4">
                    <div class="product-wrapper mb-3">
                      <div class="product-img">
                        @if ($obat->foto != null)
                          <img src="{{ asset('storage/'.$obat->foto) }}" alt="product image">
                        @else
                          <img src="{{ asset('assets/img/no-image.jpg') }}" alt="no photo">
                        @endif
                      </div>
                      <div class="product-content text-center p-3">
                        <h4><a href="{{ url('shop',['obat'=>$obat->id]) }}">{{ $obat->nama_obat }}</a></h4>
                        <span>Rp. {{ number_format($obat->harga, 0) }}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                {{ $data->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section -->
@endsection

@section('script')
<script src="{{ asset('js/shop.js') }}"></script>
@endsection
