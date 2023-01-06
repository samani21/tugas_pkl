@extends('layouts.dashboard')

@section('content')

    <div>
        <form action="{{route('laporan/obat')}}" method="get" class="row g-12">
            <div class="col-md-10">
            <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                {{-- <a href="{{url('pegawai/tambah_pegawai')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a> --}}
                <a href="{{url('obat/cetak_obat')}}" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Kode obat</th>
                <th scope="col">Nama obat</th>
                <th scope="col">stok</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($obat as $o)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="Nip">{{$o->kode}}</td>
                    <td data-title="nama">{{$o->nm_obat}}</td>
                    <td data-title="Tanggal lahir">{{$o->stok}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $obat->links() }}
    </div>
@endsection