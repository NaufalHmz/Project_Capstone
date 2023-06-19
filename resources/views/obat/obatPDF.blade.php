<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<table border="1" cellpadding="10" align="center">
                <thead>
                    <tr >
                        <th>No</th>
                        <th width=15%>Nama Obat</th>
                        <th width=15%>Kategori Obat</th>
                        <th>Stock</th>
                        <th>Kadaluwarsa</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
</body>
</html>