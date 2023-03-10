@extends('layouts.dashboard')

@section('content')

<form action="{{url('updatedokter',$dokter->id)}}" method="POST">
    @csrf
        <div>
            <label for="">NIP</label>
            <input class="form-control" type="text" maxlength="30" id="nip" name="nip" value="{{$dokter->nip}}" placeholder="Masukkan NIP" aria-label="default input example">
        </div>
        <div>
            <label for="">Nama</label>
            <input class="form-control" type="text" maxlength="50" id="nama" name="nama" style="text-transform: uppercase" value="{{$dokter->nama}}" placeholder="Masukkan nama" aria-label="default input example">
        </div>
        <div>
            <input class="form-control" type="hidden" id="kelompok" name="kelompok" value="{{$dokter->kelompok}}"  placeholder="TENAGA KEPERAWATAN-Perawat" aria-label="default input example">
        </div>
        <div>
            <label for="">Spesialis</label>
            <select class="form-select" name="spesialis" aria-label="Default select example">
                <option value="{{$dokter->spesialis}}" selected>{{$dokter->spesialis}}</option>
                <option value="Dokter Umum">Dokter Umum</option>
                <option value="Dokter Gigi">Perawat Gigi</option>
              </select>
        </div>
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
  </form>
@endsection