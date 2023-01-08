@extends('layouts.dashboard')

@section('content')
 <div class="container">
    <a href="#" onclick="goBack()" class="btn btn-warning"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    <hr>
    <div class="row g-2">
        <div class="col-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><h5><b>No berobat</b></h5></td>
                        <td><h5>{{$pasien->no}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>NIK</b></h5></td>
                        <td><h5>{{$pasien->nik}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Jenis berobat</b></h5></td>
                        <td><h5>{{$pasien->jenis}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>No BPJS</b></h5></td>
                        <td><h5>{{$pasien->bpjs}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Nama</b></h5></td>
                        <td><h5>{{$pasien->nama}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Tempat tanggal lahir</b></h5></td>
                        <td><h5>{{$pasien->tempat}} ,{{$pasien->tanggal}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Jenis Kelamin</b></h5></td>
                        <td><h5>{{$pasien->jk}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Alamat</b></h5></td>
                        <td><h5>{{$pasien->alamat}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Gol darah</b></h5></td>
                        <td><h5>{{$pasien->darah}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>No hp</b></h5></td>
                        <td><h5>{{$pasien->hp}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Tanggal berobat</b></h5></td>
                        <td><h5>{{$pasien->hp}}</h5></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h3 align="center">Rekam Medis</h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Berobat</th>
                    <th>Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php 
                    $no=1;
                @endphp
                @foreach($pasien->bero as $pas)
                    <tr align="center">
                        <td data-title="No">{{ $no++ }}</td>
                        <td data-title="No">{{ $pas->tgl }}</td>
                        <td data-title="Status"><?php if($pas->status =='1'){
                            echo '<span class="badge bg-warning text-black">Sedang diperiksa</span>';
                         }if($pas->status =='2'){
                            echo '<span class="badge bg-success">Selesai diperiksa</span>';
                         }if($pas->status =='0'){
                             echo '<span class="badge bg-danger">Belum diperiksa</span>';
                          }?></td>
                       <td>
                        <?php if($pas->status =='2'){
                            echo '<a href="rekam_medis/pasien='.$pas->id.'&rekammedis='.$pas->pasien_id.'" class="btn btn-success"><i class="fa-solid fa-laptop-medical"></i>Lihat</a>';
                         }if($pas->status =='1'){
                            echo '';
                         }if($pas->status =='0'){
                             echo '';
                          }?>
                       </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            
        </div>
 </div>
@endsection