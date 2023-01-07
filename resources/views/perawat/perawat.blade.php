@extends('layouts.dashboard')

@section('content')

    <div>
        
        <form action="{{route('perawat/perawat')}}" method="get" class="row g-12">
            <div class="col-md-10">
            <input class="form-control" type="hidden" name="perawat" value="perawat" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">

            <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                <a href="{{url('perawat/tambah_perawat')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
                {{-- <a href="{{url('pegawai/cetak')}}" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak</a> --}}
            </div>
        </form>
    </div>
    <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($perawat as $per)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="Nip">{{$per->nip}}</td>
                    <td data-title="nama">{{$per->nama}}</td>
                    <td data-title="Spesialis">{{$per->spesialis}}</td>
                    <td data-title="Aksi">
                        <a href="edit_perawat/{{$per->id}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="hapus_perawat/{{$per->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $perawat->links() }}
    </div>
@endsection