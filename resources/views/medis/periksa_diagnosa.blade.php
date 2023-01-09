@extends('layouts.dashboard')

@section('content')

<form action="{{route('diagnosa.store',$berobat->id)}}" method="POST">
    @csrf
    <input type="hidden" id="berobat_id" name="berobat_id" value="{{$berobat->id}}">
            {{-- <input class="form-control" type="hidden" id="status" name="status" value="2"> --}}

    <div>
        <div>
            <label for="">Nama Diagnosa</label>
            <select id="selecticd" class="form-select" aria-label="Default select example" name="diagnosa" required>

            </select>
        </div>
        <div>
            <label for="">Kode Diagnosa</label>
            <select id="selectid" class="form-select" aria-label="Default select example" name="kode" required>

            </select>
        </div>
    </div>
  <br>
  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
  <a href="#" onClick="history.go(-2);" class="btn btn-warning"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
</div>
  </form>
@endsection