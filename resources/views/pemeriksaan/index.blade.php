@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Pemeriksaan</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Pemeriksaan" href=" {{ route('pemeriksaan.create') }}">
                Tambah Data
            </a>
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Solusi</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Aksi</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($pemeriksaan as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->tgl }}</td>
                        <td>{{ $row->diagnosa }}</td>
                        <td>{{ $row->solusi}}</td>
                        <td>{{ $row->dokter->nama }}</td>
                        <td>{{ $row->pasien->nama }}</td>
                        
                        <td width="20%">
                            <form method="POST" action="{{ route('pemeriksaan.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                               
                              
                                <a class="btn btn-warning btn-sm" title="Ubah Periksa"
                                    href=" {{ url('pemeriksaan-edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Periksa"
                                    onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection