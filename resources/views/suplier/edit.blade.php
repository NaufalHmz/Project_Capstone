@extends('admin.index')
@section('content')
@php



$ar_suplier = App\Models\Suplier::all();
@endphp
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ubah Suplier</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('suplier.update',$row->id) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="{{ $row->nama }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <input type="text" name="telp" value="{{ $row->telp }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ $row->email }}" class="form-control">
                            </div>
                        </div>
                        
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('suplier') }}">
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