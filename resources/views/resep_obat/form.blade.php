@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Resep Obat</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('resep_obat.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pemeriksaan</label>
                            <div class="col-sm-10">
                                <select name="pemeriksaan_id" id="pemeriksaan_id" class="form-select">
                                    <option value="">-- Pilih Pemeriksaan --</option>
                                    @foreach ($ar_pemeriksaan as $cek)
                                    <option value="{{ $cek->id }}" >{{ $cek->diagnosa }}</option>
                                    @endforeach
                                </select>
                                @error('pemeriksaan_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Obat</label>
                            <div class="col-sm-10">
                                <select name="obat_id" id="obat_id" class="form-select">
                                    <option value="">-- Pilih Obat--</option>
                                    @foreach ($ar_obat as $obt)
                                    <option value="{{ $obt->id }}" >{{ $obt->nama_obat}}</option>
                                    @endforeach
                                </select>
                                @error('obat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jumlah Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah_obat" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Harga Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga_obat" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('resep_obat') }}">
                                    Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Resep">
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