@extends('layouts.dashboard')

@section('content')

<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf
        <div>
            <label for="">NIP</label>
            <input class="form-control" type="number" id="nip" name="nip" placeholder="Masukkan NIP" aria-label="default input example" autofocus>
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
            <select class="form-select" name="kelompok" aria-label="Default select example">
                <option selected>--pilih--</option>
                <option value="TENAGA MEDIS">TENAGA MEDIS</option>
                <option value="TENAGA KEPERAWATAN">TENAGA KEPERAWATAN</option>
                <option value="TENAGA KETEKNISIAN MEDIS">TENAGA KETEKNISIAN MEDIS</option>
                <option value="TENAGA GIZI">TENAGA GIZI</option>
                <option value="TENAGA KESEHATAN MASYARAKAT">TENAGA KESEHATAN MASYARAKAT</option>
                <option value="TENAGA KEFARMASIAN">TENAGA KEFARMASIAN</option>
                <option value="NON MEDIS">NON MEDIS</option>
              </select>
        </div>
        <div>
            <label for="">Spesialis</label>
            <select class="form-select" name="spesialis" aria-label="Default select example">
                <option selected>--pilih--</option>
                <option value="Dokter Umum">Dokter Umum</option>
                <option value="Dokter Gigi">Dokter Gigi</option>
                <option value="Bidan">Bidan</option>
                <option value="Asisten Apoteker">Asisten Apoteker</option>
                <option value="Perawat">Perawat</option>
                <option value="Ahli Teknologi laboratorium Medis">Ahli Teknologi laboratorium Medis</option>
                <option value="Perawat Gigi">Perawat Gigi</option>
                <option value="Ahli Gizi">Ahli Gizi</option>
                <option value="Penuluhan Kesehatan">Penuluhan Kesehatan</option>
                <option value="Apoteker">Apoteker</option>
                <option value="Staf Non Medis">Staf Non Medis</option>
              </select>
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection