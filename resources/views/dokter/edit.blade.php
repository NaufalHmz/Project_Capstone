@extends('admin.index')
@section('content')
@php


$ar_dokter = App\Models\Dokter::all();

@endphp
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Ubah Dokter</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('dokter.update',$row->id) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="{{ $row->nama }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_hp" value="{{ $row->no_hp }}" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" style="height: 100px">{{ $row->alamat }}</textarea>
                            </div>
                        
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label"><br>Foto</label>
                            <div class="col-sm-10">
                            <br><input class="form-control" type="file" name="foto">
                                @if(!empty($row->foto)) <img src="{{ url('admin/img')}}/{{$row->foto}}" 
                                                             width="10%" class="img-thumbnail">
                                <br/>{{$row->foto}}
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('dokter') }}"> Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Dokter"> Ubah</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection