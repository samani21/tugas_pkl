@extends('layouts.dashboard')

@section('content')

    <div>
        <form action="{{route('obat/obat')}}" method="get" class="row g-12">
            <div class="col-md-8">
            <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
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
                <th scope="col">Nama obat</th>
                <th scope="col">jumlah obat</th>
                <th scope="col">dosis</th>
                <th scope="col">tanggal</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($obat as  $o)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="No">{{ $o->nm_obat }}</td>
                    <td data-title="No">{{ $o->jumlah }}</td>
                    <td data-title="No">{{ $o->dosis }}</td>
                    <td data-title="No">{{ $o->tgl }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection