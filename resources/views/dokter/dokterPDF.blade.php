<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<table border="1" cellpadding="10" align="center">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($dokter as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama}}</td>
                        <td>{{ $row->no_hp}}</td>
                        <td>{{ $row->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</body>
</html>