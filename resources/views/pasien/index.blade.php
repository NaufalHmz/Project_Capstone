@extends('admin.index')
@section('content')
<div class="col-20">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Pasien</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Pasien" href=" {{ route('pasien.create') }}">
                Tambah Data
            </a>&nbsp;
            <a class="btn btn-danger btn-sm" title="Export PDF Pasien" href=" {{ url('pasien-pdf') }}">
                <i class="bi bi-file-earmark-pdf "></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                       
                        <th>No HP</th>
                        
                        <th >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($pasien as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama}}</td>
                        <td>{{ $row->gender}}</td>
                        <td>{{ $row->tmpt_lahir}}</td>
                        <td>{{ $row->tgl_lahir}}</td>
                        
                        <td>{{ $row->no_hp}}</td>
                        
                        
                        
                        <td width="15%">
                            <form method="POST" action="{{ route('pasien.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Pasien"
                                    href=" {{ route('pasien.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Pasien"
                                    href=" {{ url('pasien-edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pasien"
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