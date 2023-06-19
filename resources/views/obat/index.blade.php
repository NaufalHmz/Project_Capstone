@extends('admin.index')
@section('content')
<div class="col-20">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Obat</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Obat" href=" {{ route('obat.create') }}">
                Tambah Data
            </a>&nbsp;
            <a class="btn btn-danger btn-sm" title="Export PDF Obat" href=" {{ url('obat-pdf') }}">
                <i class="bi bi-file-earmark-pdf "></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr >
                        <th>No</th>
                        <th width=15%>Nama Obat</th>
                        <th width=15%>Kategori Obat</th>
                        <th>Stock</th>
                        <th>Kadaluwarsa</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($obat as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama_obat }}</td>
                        <td>{{ $row->kategori_obat->nama_kategoriobat }}</td>
                        <td>{{ $row->stock }}</td>
                        <td>{{ $row->kadaluwarsa }}</td>
                        <td>{{ $row->harga }}</td>
                        <td>{{ $row->keterangan }}</td>
                        
                        <td width="15%">
                            <form method="POST" action="{{ route('obat.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Obat"
                                    href=" {{ route('obat.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Obat"
                                    href=" {{ url('obat-edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Obat"
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