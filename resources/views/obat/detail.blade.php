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
                    <img src="{{ asset('storage/'.$row->foto) }}" alt="Profile" class="rounded-circle">
                    @endempty
                    <h2>{{ $row->nama }}</h2>
                </div>
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div class="col-xl-8">
                <div class="card-body justify-text-center">
                    <div class="alert alert-secondary ">
                        Kode Obat: {{ $row->kode_obat }}
                        <br />Nama Obat: {{ $row->nama_obat }}
                        <br />Kategori Obat: {{ $row->kategori_obat->nama_kategoriobat }}
                        <br />Penyimpanan: {{ $row->penyimpanan }}
                        <br />Stock: {{ $row->stock}}
                        <br />Unit: {{ $row->unit }}
                        <br />Kadaluwarsa: {{ $row->kadaluwarsa }}
                        <br />Harga: {{ $row->harga }}
                        <br />Keterangan: {{ $row->keterangan }}
                    </div>
                    <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('obat') }}">
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
