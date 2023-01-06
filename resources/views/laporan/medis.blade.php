@extends('layouts.dashboard')

@section('content')

    <div>
        <form action="{{route('laporan/medis')}}" method="get" class="row g-12">
            <div class="col-md-10">
            <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                {{-- <a href="{{url('pegawai/tambah_pegawai')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a> --}}
                <a href="{{url('pasien/cetak_pasien')}}" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak</a>
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
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $berobat->links() }}
    </div>
@endsection