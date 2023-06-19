@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Resep Obat</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Resep" href=" {{ route('resep_obat.create') }}">
                Tambah Data
            </a>
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pemeriksaan</th>
                        <th scope="col">Obat</th>
                        <th scope="col">Jumlah Obat</th>
                        <th scope="col">Harga Obat</th>
                        <th scope="col">Aksi</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($resep as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->tgl }}</td>
                        <td>{{ $row->pemeriksaan->diagnosa}}</td>
                        <td>{{ $row->obat->nama_obat}}</td>
                        <td>{{ $row->jumlah_obat }}</td>
                        <td>{{ $row->harga_obat}}</td>
                        
                        <td width="20%">
                            <form method="POST" action="{{ route('resep_obat.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                               
                              
                                <a class="btn btn-warning btn-sm" title="Ubah Resep"
                                    href=" {{ url('resep_obat-edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Resep"
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