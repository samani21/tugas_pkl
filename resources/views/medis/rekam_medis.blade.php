@extends('layouts.dashboard')

@section('content')
<div class="container">
    <a href="#" onclick="goBack()" class="btn btn-warning"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <a href="/medis/cetak_rm/pasien={{$berobat->id}}&rekammedis={{$pasien->id}}" class="btn btn-primary"><i class="fa-solid fa-print"></i> Cetak rekam medis</a>
    <div class="float-end">

        <form action="{{route('selesai',$berobat->id)}}" method="POST">
            @csrf
            <input type="hidden" name="status" value="2">
        <?php if($berobat->status =='1'){
            echo '<button class="btn btn-success" type="submit" name="simpan">Selesai</button>
             <a href="/medis/periksa_diagnosa/'.$berobat->id.'" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Diagnosa</a>
        <a href="/medis/periksa_obat/'.$berobat->id.'" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Obat</a>';
         }if($berobat->status =='2'){
             echo '';
          }?>
          </form>
    </div>
    <hr>
    <div class="row g-2">
        <div class="col-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h5><b>No berobat</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->no}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>NIK</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->nik}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Jenis Berobat</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->jenis}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>No BPJS</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->bpjs}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Nama</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->nama}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Tempat tanggal lahir</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->tempat}}, {{$pasien->tanggal}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Jenis kelamin</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->jk}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Alamat</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->alamat}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Gol darah</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->darah}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>No hp</b></h5>
                        </td>
                        <td>
                            <h5>{{$pasien->hp}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Tanggal Berobat</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->tgl}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Poli</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->poli}}</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h5><b>Dokter</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->dokter}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Perawat</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->perawat}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Sistolik</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->sistolik}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Diastolik</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->diastolik}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Tinggi badan</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->tinggi}} Cm</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Berat badan</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->berat}} Kg</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Suhu</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->suhu}} °C</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Saturasi</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->saturasi}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Napas</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->napas}}/s</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Keluhan</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->keluhan}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Diagnosa</b></h5>
                        </td>
                        <td> @foreach($berobat->diagnosa as $d)
                            <h5>({{ $d->kode }}).{{ $d->diagnosa }},  <?php if($berobat->status =='1'){
                                echo '<a href="hapus_diagnosa/'.$d->id.'"  class="">Hapus</a>';
                             }if($berobat->status =='2'){
                                 echo '';
                              }?> ,</h5>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Status</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->tindakan}}</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5><b>Biaya</b></h5>
                        </td>
                        <td>
                            <h5>{{$berobat->medis->biaya}}</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <table class="table table-striped">
        <h3>Resep obat</h3>
        <thead>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Dosis</th>
            <?php if($berobat->status =='1'){
                echo '<th>Aksi</th>';
             }if($berobat->status =='2'){
                 echo '';
              }?>
        </thead>
        @foreach($berobat->resep as $a)
        <tr>
            <td>{{ $a->obat }}</td>
            <td>{{ $a->jumlah }}</td>
            <td>{{ $a->dosis }}</td>
            <?php if($berobat->status =='1'){
                echo '<td><a href="hapus_resep/'.$a->id.'" class="">Hapus</a></td>';
             }if($berobat->status =='2'){
                 echo '';
              }?>
        </tr>


        @endforeach

    </table>
</div>
@endsection