@extends('layouts.dashboard')

@section('content')

    <div>
        <form class="row g-2">
            <div class="col-md-10">
            <label for="inputPassword2" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="col-auto">
                <a href="{{url('obat/tambah_obat')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah</a>
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
                <th scope="col">Aksi</th>
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
                    <td data-title="Aksi">
                        <a href="tambah_stok/{{$o->id}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Stok</a>
                        <a href="edit_obat/{{$o->id}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="hapus_obat/{{$o->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> hapus</a>
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