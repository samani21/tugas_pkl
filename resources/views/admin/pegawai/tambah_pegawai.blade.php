@extends('layouts.dashboard')

@section('content')

<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf
        <div>
            <label for="">NIP</label>
            <input class="form-control" type="number" id="nip" name="nip" placeholder="Masukkan NIP" aria-label="default input example">
        </div>
        <div>
            <label for="">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" placeholder="Masukkan nama" aria-label="default input example">
        </div>
        <div>
            <label for="">Tanggal lahir</label>
            <input class="form-control" type="date" id="tanggal" name="tanggal"  aria-label="default input example">
        </div>
        <div>
            <label for="">Tempat lahir</label>
            <input class="form-control" type="text" id="tempat" name="tempat" placeholder="Tempat lahir" aria-label="default input example">
        </div>
        <div>
            <label for="">Alamat</label>
            <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" aria-label="default input example">
        </div>
        <div>
            <label for="">No hp</label>
            <input class="form-control" type="text" id="hp" name="hp" placeholder="Masukkan no hp" aria-label="default input example">
        </div>
        <div>
            <label for="">Kelompok pegawai</label>
            <input class="form-control" type="text" id="kelompok" name="kelompok" placeholder="TENAGA KEPERAWATAN-Perawat" aria-label="default input example">
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection