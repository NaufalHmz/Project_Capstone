@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Pasien</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('pasien.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                @foreach($ar_gender as $gender)
                                @php
                                    $gdr = (old('gender') == $gender)? 'checked':'';
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror"  type="radio" name="gender" value="{{ $gender }}" {{ $gdr }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                                @error('gender')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tmpt_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_hp" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" style="height: 100px">{{ old('alamat') }}</textarea>
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

                                <a class="btn btn-info" title="Kembali" href=" {{ url('pasien') }}"> Kembali
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Pasien"> Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection