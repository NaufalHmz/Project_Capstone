@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Kategori Obat</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Kategoti" href=" {{ route('kategori_obat.create') }}">
                Tambah Data
            </a>
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($kategori_obat as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama_kategoriobat }}</td>
                        <td>{{ $row->keterangan }}</td>
                        
                        <td width="20%">
                            <form method="POST" action="{{ route('kategori_obat.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                               
                              
                                <a class="btn btn-warning btn-sm" title="Ubah Kategori"
                                    href=" {{ url('kategori-edit',$row->id) }}">
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