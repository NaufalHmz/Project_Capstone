@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Pemeriksaan</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('pemeriksaan.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Diagnosa</label>
                            <div class="col-sm-10">
                                <input type="text" name="diagnosa" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Solusi</label>
                            <div class="col-sm-10">
                                <input type="text" name="solusi" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Dokter</label>
                            <div class="col-sm-10">
                                <select name="dokter_id" id="dokter_id" class="form-select">
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($ar_dokter as $dok)
                                    <option value="{{ $dok->id }}" >{{ $dok->nama}}</option>
                                    @endforeach
                                </select>
                                @error('dokter_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pasien</label>
                            <div class="col-sm-10">
                                <select name="pasien_id" id="pasien_id" class="form-select">
                                    <option value="">-- Pilih Pasien--</option>
                                    @foreach ($ar_pasien as $psn)
                                    <option value="{{ $psn->id }}" >{{ $psn->nama}}</option>
                                    @endforeach
                                </select>
                                @error('pasien_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('pemeriksaan') }}">
                                    Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Periksa">
                                         Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection