<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <table style="border-collapse:collapse;border-spacing:1;" border="1">
            <thead>
            <tr align="center">
                <th>No</th>
                <th>No berobat</th>
                <th>NIK</th>
                <th>Jenis beobat</th>
                <th>Nama</th>
                <th>Tanggal lahir</th>
                <th>tempat</th>
                <th>Alamat</th>
                <th>Gol darah</th>
                <th>No hp</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($pasien as $pas)
                <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{$pas->no}}</td>
                    <td>{{$pas->nik}}</td>
                    <td>{{$pas->jenis}}</td>
                    <td>{{$pas->nama}}</td>
                    <td>{{$pas->tanggal}}</td>
                    <td>{{$pas->tempat}}</td>
                    <td>{{$pas->alamat}}</td>
                    <td>{{$pas->darah}}</td>
                    <td>{{$pas->hp}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>