<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 align="center">LAPORAN DATA OBAT</h1>
    <hr>
    <table align="center" style="border-collapse:collapse;border-spacing:1;" border="1">
        <thead>
            <tr align="center">
                <th width="40">No</th>
                <th width="100">Kode obat</th>
                <th width="200">Nama obat</th>
                <th width="100">stok</th>
            </tr>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($obat as $o)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$o->kode}}</td>
                    <td>{{$o->nm_obat}}</td>
                    <td>{{$o->stok}}</td>
                </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
</body>
</html>