<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 align="center">LAPORAN REKAM MEDIS PASIEN</h1>
    <hr>
    <table>
       <tbody>
           <td>
            <p><b>No rekam medis :</b> {{$pasien->no}}</p>
            <p><b>NIK :</b> {{$pasien->nik}}</p>
            <p><b>Jenis berobat :</b> {{$pasien->jenis}}</p>
            <p><b>No BPJS :</b> {{$pasien->bpjs}}</p>
            <p><b>Nama :</b> {{$pasien->nama}}</p>
            <p><b>Tempat tanggal ahir :</b> {{$pasien->tempat}},{{$pasien->tanggal}}</p>
            <p><b>Alamat :</b> {{$pasien->alamat}}</p>
            <p><b>Golongan darah :</b> {{$pasien->darah}}</p>
            <p><b>No hp :</b> {{$pasien->hp}}</p>
            <p><b>Tanggal berobat :</b> {{$berobat->medis->tgl}}</p>
            <p><b>status pengobatan:</b> {{$berobat->medis->tindakan}}</p>
            <p><b>Biaya :</b> {{$berobat->medis->biaya}}</p>
           </td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td>
            <p><b>Ruang pemeriksaan :</b>{{$berobat->medis->poli}}</p>
            <p><b>Dokter :</b> {{$berobat->medis->dokter}}</p>
            <p><b>Perawat :</b> {{$berobat->medis->perawat}}</p>
            <p><b>Sistolik :</b> {{$berobat->medis->sistolik}}</p>
            <p><b>Diastolik :</b> {{$berobat->medis->diastolik}}</p>
            <p><b>Tinggi badan :</b>{{$berobat->medis->diastolik}}</p>
            <p><b>Berat badan :</b> {{$berobat->medis->diastolik}}</p>
            <p><b>Suhu :</b> {{$berobat->medis->diastolik}}</p>
            <p><b>Saturasi :</b> {{$berobat->medis->saturasi}}</p>
            <p><b>Napas :</b> {{$berobat->medis->napas}}</p>
            <p><b>Suhu :</b> {{$berobat->medis->diastolik}}</p>
            <p><b>Diagnosa :</b> 
                @foreach($berobat->diagnosa as $d)
                {{ $d->diagnosa }} ,
                @endforeach
            </p>
           </td>
       </tbody>
    </table>
    <hr>
    <table align="center" style="border-collapse:collapse;border-spacing:1;" border="1" align="center">
        <thead>
            <th width="10%">No</th>
            <th width="200">Nama Obat</th>
            <th width="100">Jumlah</th>
            <th width="100">Dosis</th>
        </thead>
       <tbody>
        @php 
        $no=1;
    @endphp
        @foreach($berobat->resep as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->obat }}</td>
            <td align="center">{{ $a->jumlah }}</td>
            <td align="center">{{ $a->dosis }}</td>
        </tr>
        @endforeach
       </tbody>
    </table>
</body>
</html>