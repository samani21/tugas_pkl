@extends('layouts.dashboard')

@section('content')

<form action="{{ route('dokter.store') }}" method="POST">
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
            <input type="hidden" name="kelompok" value="dokter" id="">
        </div>
        <div>
            <label for="">Spesialis</label>
            <select class="form-select" name="spesialis" aria-label="Default select example">
                <option selected>--pilih--</option>
                <option value="Dokter Umum">Dokter Umum</option>
                <option value="Bidan">Bidan</option>
                <option value="Dokter Gigi">Perawat Gigi</option>
                <option value="Ahli Gizi">Ahli Gizi</option>
              </select>
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection