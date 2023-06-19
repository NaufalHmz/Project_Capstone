@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Obat</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('obat.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="kode_obat" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_obat" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori Obat</label>
                            <div class="col-sm-10">
                                <select name="kategori_obat_id" id="kategori_obat_id" class="form-select">
                                    <option value="">-- Pilih Kategori Obat--</option>
                                    @foreach ($ar_kategori_obat as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategoriobat}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_obat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Penyimpanan</label>
                            <div class="col-sm-10">
                                <input type="text" name="penyimpanan" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="text" name="stock" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Unit</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Kadaluwarsa</label>
                            <div class="col-sm-10">
                                <input type="date" name="kadaluwarsa" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="keterangan" class="form-control">
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="foto">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('obat') }}"> Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Obat"> Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection