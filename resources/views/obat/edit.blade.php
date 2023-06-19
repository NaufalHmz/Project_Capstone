@extends('admin.index')
@section('content')
@php

//select option divisi dan jabatan

$ar_obat = App\Models\Obat::all();
$ar_kategori_obat = App\Models\Kategori::all();
@endphp
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Ubah Obat</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('obat.update',$row->id) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="kode_obat" value="{{ $row->kode_obat }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_obat" value="{{ $row->nama_obat }}" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori Obat</label>
                            <div class="col-sm-10">
                                <select name="kategori_obat_id" id="kategori_obat_id" class="form-select">
                                    <option value="">-- Pilih Kategori Obat--</option>
                                    @foreach ($ar_kategori_obat as $kat)
                                    @php $sel = ($kat->id == $row->kategori_obat_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $kat->id }}" {{ $sel }}>{{ $kat->nama_kategoriobat}}</option>
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
                                <input type="text" name="penyimpanan" value="{{ $row->penyimpanan }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="text" name="stock" value="{{ $row->stock }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Unit</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit" value="{{ $row->unit }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Kadaluwarsa</label>
                            <div class="col-sm-10">
                                <input type="date" name="kadaluwarsa" value="{{ $row->kadaluwarsa }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" value="{{ $row->harga }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="keterangan" value="{{ $row->keterangan }}" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="foto">
                                @if(!empty($row->foto)) <img src="{{ url('admin/img')}}/{{$row->foto}}" 
                                                             width="10%" class="img-thumbnail">
                                <br/>{{$row->foto}}
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('obat') }}"> Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Obat"> Ubah</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection