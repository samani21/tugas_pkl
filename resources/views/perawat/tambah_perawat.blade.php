@extends('layouts.dashboard')

@section('content')

<form action="{{ route('perawat.store') }}" method="POST">
    @csrf
        <div>
            <label for="">NIP</label>
            <input class="form-control" type="text" id="nip" name="nip" placeholder="Masukkan NIP" aria-label="default input example" autofocus>
        </div>
        <div>
            <label for="">Nama</label>
            <input class="form-control" type="text" id="nama" style="text-transform: uppercase" name="nama" placeholder="Masukkan nama" aria-label="default input example">
        </div>
        <div>
            <input type="hidden" name="kelompok" value="perawat" id="">
        </div>
        <div>
            <label for="">Spesialis</label>
            <select class="form-select" name="spesialis" aria-label="Default select example">
                <option selected>--pilih--</option>
                <option value="Perawat">Perawat</option>
                <option value="Perawat Anak">Perawat Anak</option>
                <option value="Bidan">Bidan</option>
                <option value="Perawat Gigi">Perawat Gigi</option>
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