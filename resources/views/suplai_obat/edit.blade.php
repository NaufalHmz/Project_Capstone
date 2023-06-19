@extends('admin.index')
@section('content')
@php



$ar_suplai = App\Models\Suplai::all();
$ar_suplier = App\Models\Suplier::all();
$ar_obat = App\Models\Obat::all();
@endphp
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ubah Suplai</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('suplai_obat.update',$row->id) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode </label>
                            <div class="col-sm-10">
                                <input type="text" name="kode" value="{{ $row->kode }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" value="{{ $row->tgl }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Suplier</label>
                            <div class="col-sm-10">
                                <select name="suplier_id" id="suplier_id" class="form-select">
                                    <option value="">-- Pilih Suplier Obat--</option>
                                    @foreach ($ar_suplier as $sup)
                                    @php $sel = ($sup->id == $row->suplier_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $sup->id }}" {{ $sel }}>{{ $sup->nama}}</option>
                                    @endforeach
                                </select>
                                @error('suplier_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="keterangan" value="{{ $row->keterangan }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Obat</label>
                            <div class="col-sm-10">
                                <select name="obat_id" id="obat_id" class="form-select">
                                    <option value="">-- Pilih Obat--</option>
                                    @foreach ($ar_obat as $obt)
                                    @php $sel = ($obt->id == $row->obat_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $obt->id }}" {{ $sel }}>{{ $obt->nama_obat}}</option>
                                    @endforeach
                                </select>
                                @error('obat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('suplai_obat') }}">
                                   Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Suplier">
                                    Ubah</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection