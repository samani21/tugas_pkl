<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <td align="left">
                <img src="{{public_path('css/Kayuh_Baimbai.png')}}" width='100' height='90'>
            </td>
            <td align="center">
                <p align="center">
                    <b>PEMERINTAH KOTA BANJARMASIN
                        <br>DINAS KESEHATAN
                        <br> PUSKESMAS BERUNTUNG RAYA</b><br>
                    JL.AMD Komp Tata Benua Indah RT.19 Kel.Tanjung Pagar <br>
                    Banjarmasin Selatan Telp.(0511)4225559,Email:puskesmasberuntungraya@yahoo.com
                </p>
            </td>
            <td>
                <img src="{{public_path('css/logo-puskesmas.png')}}" width='100' height='90'
                    style="padding-right: 100%">
            </td>
        </thead>
    </table>
    <hr>
    <h3 align="center">REKAM MEDIS PASIEN</h3>
    <table align="center" style="border-collapse:collapse;border-spacing:1;" border="1">
        <thead>
            <tr align="center">
                <th width="40">No</th>
                <th width="100">Kode obat</th>
                <th width="100">Nama obat</th>
                <th width="100">stok</th>
                <th width="100">Tanggal masuk</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($keluar as $o)
                <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{$o->kd_obat}}</td>
                    <td>{{$o->obat}}</td>
                    <td>{{$o->jumlah}}</td>
                    <td>{{$o->tgl}}</td>
                </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
</body>
</html>