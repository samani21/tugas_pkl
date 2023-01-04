@extends('layouts.dashboard')

@section('content')

<form action="{{route('create.store',$obat->id)}}" method="POST">
    @csrf
        <div>
            <label for="">Kode obat</label>
            <input class="form-control" type="text" id="kode" name="kode" value="{{$obat->kode}}" placeholder="Masukkan NIP" aria-label="default input example">
        </div>
        <div>
            <label for="">Nama obat</label>
            <input class="form-control" type="text" id="nama_obat" name="nama_obat" value="{{$obat->nm_obat}}" placeholder="Masukkan nama" aria-label="default input example">
        </div>
        <div>
            <label for="">jumlah</label>
            <input class="form-control" type="number" id="jumlah" name="jumlah"  aria-label="default input example">
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection