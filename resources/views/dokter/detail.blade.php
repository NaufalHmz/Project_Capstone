@extends('admin.index')
@section('content')
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @empty($row->foto)
                    <img src="{{ url('admin/img/nophoto.png') }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ url('admin/img')}}/{{$row->foto}}" alt="Profile" class="rounded-circle">
                    @endempty
                    <h2>{{ $row->nama }}</h2>
                </div>
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div class="col-xl-8">
                <div class="card-body justify-text-center">
                    <div class="alert alert-secondary ">
                        
                        <br />Nama: {{ $row->nama }}
                        <br />No HP: {{ $row->no_hp}}
                        <br />Alamat: {{ $row->alamat }}
                        
                    </div>
                    <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('dokter') }}">
                        Kembali
                    </a>
                </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection