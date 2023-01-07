@extends('layouts.dashboard')

@section('content')

<form action="{{route('diagnosa.store',$berobat->id)}}" method="POST">
    @csrf
    <input type="hidden" id="berobat_id" name="berobat_id" value="{{$berobat->id}}">
            {{-- <input class="form-control" type="hidden" id="status" name="status" value="2"> --}}

    <div>
        <div>
            <label for="">Nama Diagnosa</label>
            <select id="selecticd" class="form-select" aria-label="Default select example" name="diagnosa">

            </select>
        </div>
        <div>
            <label for="">Kode Diagnosa</label>
            <select id="selectid" class="form-select" aria-label="Default select example" name="kode">

            </select>
        </div>
    </div>
  <br>
  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
  <a href="#" onclick="goBack()" class="btn btn-warning"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>
  </form>
@endsection