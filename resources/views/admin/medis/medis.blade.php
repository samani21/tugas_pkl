@extends('layouts.dashboard')

@section('content')

    <div>
        <form class="row g-2">
            <div class="col-md-11">
            <input type="text" class="form-control" id="inputPassword2" placeholder="Password">
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
                    <td data-title="Status"><?php if($medis->status =='1'){
                        echo '<span class="badge bg-success">Sudah diperiksa</span>';
                     }if($medis->status =='0'){
                         echo '<span class="badge bg-danger">Belum diperiksa</span>';
                      }?></td>
                    <td data-title="Aksi">
                        <?php if($medis->status =='1'){
                            echo '<a href="rekam_medis/pasien='.$medis->id.'&rekammedis='.$medis->pasien_id.'" class="btn btn-success"><i class="fa-solid fa-laptop-medical"></i></a>';
                         }if($medis->status =='0'){
                             echo '<a href="periksa/'.$medis->id.'" class="btn btn-primary"><i class="fa-solid fa-book-medical"></i></a>';
                          }?>
                        <a href="hapus_pasien/{{$medis->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class="float-end">
        <nav aria-label="...">
            <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            </ul>
        </nav>
    </div>
@endsection