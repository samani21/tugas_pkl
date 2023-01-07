<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 align="center">LAPORAN DATA PEGAWAI</h1>
    <hr>
        <table style="border-collapse:collapse;border-spacing:1;" border="1" align="center">
            <thead>
            <tr align="center">
                <th width='auto'>No</th>
                <th width='100'>NIP</th>
                <th width='100'>Nama</th>
                <th width='80'>Alamat</th>
                <th width='200'>Kelompok</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($pegawai as $peg)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$peg->nip}}</td>
                    <td>{{$peg->nama}}</td>
                    <td>{{$peg->alamat}}</td>
                    <td>{{$peg->kelompok}}</td>
                    
                </tr>
            @endforeach
        </tbody>
        </table>
</body>
</html>
