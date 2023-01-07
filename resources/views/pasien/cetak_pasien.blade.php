<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 align="center">LAPORAN DATA PASIEN</h1>
    <hr>
    <table style="border-collapse:collapse;border-spacing:1;" border="1" align="center">
        <thead>
        <tr align="center">
            <th width='10'>No</th>
        <th width='40'>RM</th>
        <th width='80'>NIK</th>
        <th width='10'>Status</th>
        <th width='70'>Nama</th>
        <th width='50'>Tgl lahir</th>
        <th width='50'>Tmpt lahir</th>
        <th width='80'>Alamat</th>
        <th width='10'>Darah</th>
        <th width='50'>No hp</th>
        </tr>
        </thead>
        <tbody>
            @php 
            $no=1;
        @endphp
        @foreach($pasien as $pas)
            <tr>
                <td align="center">{{ $no++ }}</td>
                <td>{{$pas->no}}</td>
                <td>{{$pas->nik}}</td>
                <td>{{$pas->jenis}}</td>
                <td>{{$pas->nama}}</td>
                <td align="center">{{$pas->tanggal}}</td>
                <td>{{$pas->tempat}}</td>
                <td>{{$pas->alamat}}</td>
                <td align="center">{{$pas->darah}}</td>
                <td>{{$pas->hp}}</td>
                
            </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>