@extends('layouts.dashboard')

@section('content')

<form action="{{ route('obat.store') }}" method="POST">
    @csrf
        <div>
            <label for="">Kode</label>
            <input class="form-control" type="text" id="kode" name="kode" placeholder="Masukkan kode obat" aria-label="default input example" autofocus>
        </div>
        <div>
            <label for="">Nama obat</label>
            <input class="form-control" type="text" id="nm_obat" name="nm_obat" placeholder="Masukkan nama obat" aria-label="default input example">
        </div>
        <div>
            <label for="">Jumlah</label>
            <input class="form-control" type="number" id="stok" name="stok"  aria-label="default input example">
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection