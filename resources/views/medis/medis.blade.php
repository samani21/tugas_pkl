@extends('layouts.dashboard')

@section('content')

    <div>
        <form action="{{route('medis/medis')}}" method="get" class="row g-12">
            <div class="col-md-2">
                <input class="form-control" type="text" name="tgl" value="{{date('d-m-Y')}}" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
            </div>
            <div class="col-md-4">
                <input class="form-control" type="text" name="nama"placeholder="Cari nama pasien" aria-label="default input example">
            </div>
            <div class="col-md-4">
                <input class="form-control" type="text" name="no"placeholder="Cari pasien no berobat" aria-label="default input example">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">No berobat</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenis berobat</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal berobat</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($berobat as $medis)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="No berobat">{{$medis->no}}</td>
                    <td data-title="NIK">{{$medis->nik}}</td>
                    <td data-title="Jenis berobat">{{$medis->jenis}}</td>
                    <td data-title="Nama">{{$medis->nama}}</td>
                    <td data-title="Tanggal berobat"><?php echo $medis->tgl;?></td>
                    <td data-title="Status"><?php if($medis->status =='2'){
                        echo '<span class="badge bg-success">Selesai diperiksa</span>';
                     }if($medis->status =='1'){
                        echo '<span class="badge bg-warning">Sedang diperiksa</span>';
                     }if($medis->status =='0'){
                         echo '<span class="badge bg-danger">Belum diperiksa</span>';
                      }?></td>
                    <td data-title="Aksi">
                        <?php if($medis->status =='0'){
                            echo '<a href="periksa_fisik/'.$medis->id.'" class="btn btn-primary"><i class="fa-solid fa-book-medical"></i></a>';
                         }if($medis->status =='1'){
                             echo '';
                          }?>
                          <?php if($medis->status =='1'){
                            echo '<a href="rekam_medis/pasien='.$medis->id.'&rekammedis='.$medis->pasien_id.'" class="btn btn-warning"><i class="fa-solid fa-laptop-medical"></i></a>';
                         }
                          if($medis->status =='2'){
                            echo '<a href="rekam_medis/pasien='.$medis->id.'&rekammedis='.$medis->pasien_id.'" class="btn btn-success"><i class="fa-solid fa-laptop-medical"></i></a>';
                         }if($medis->status =='0'){
                             echo '';
                          }?>
                        <a href="hapus_medis/{{$medis->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $berobat->links() }}
    </div>
@endsection