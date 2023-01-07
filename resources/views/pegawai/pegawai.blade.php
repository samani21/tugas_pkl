@extends('layouts.dashboard')

@section('content')

    <div>
        
        <form action="{{route('pegawai/pegawai')}}" method="get" class="row g-12">
            <div class="col-md-10">
            <input class="form-control" type="text" name="cari" placeholder="Cari nama pegawai" aria-label="default input example">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                <a href="{{url('pegawai/tambah_pegawai')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
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
                <th scope="col">Tanggal lahir</th>
                <th scope="col">tempat</th>
                <th scope="col">Alamat</th>
                <th scope="col">No hp</th>
                <th scope="col">Kelompok</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($pegawai as $peg)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="Nip">{{$peg->nip}}</td>
                    <td data-title="nama">{{$peg->nama}}</td>
                    <td data-title="Tanggal lahir">{{$peg->tanggal}}</td>
                    <td data-title="Tempat lahir">{{$peg->tempat}}</td>
                    <td data-title="Alamat">{{$peg->alamat}}</td>
                    <td data-title="No Hp">{{$peg->hp}}</td>
                    <td data-title="Kelompok">{{$peg->kelompok}}-{{$peg->spesialis}}</td>
                    <td data-title="Aksi">
                        <a href="edit_pegawai/{{$peg->id}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="hapus_pegawai/{{$peg->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $pegawai->links() }}
    </div>
@endsection