@extends('layouts.dashboard')

@section('content')

<form action="{{route('resep.store',$berobat->id)}}" method="POST">
    @csrf
    <input type="hidden" id="berobat_id" name="berobat_id" value="{{$berobat->id}}">
            {{-- <input class="form-control" type="hidden" id="status" name="status" value="2"> --}}
    <div>
        <label> Nama oabat</label>
    <select id="selectObat" class="form-select" aria-label="Default select example" name="obat">

    </select>
    </div>
    <div>
        <label> Kode obat</label>
    <select id="selectid" class="form-select" aria-label="Default select example"  name="kd_obat">

    </select>
    </div>
    <div>
        <div>
            <label for="">jumlah</label>
            <input class="form-control" type="text" id="jumlah" name="jumlah" value="-" oninput="this.className = ''"
                aria-label="default input example">
        </div>
    </div>
    <div>
        <div>
            <label for="">Dosis</label>
            <input class="form-control" type="text" id="dosis" name="dosis" value="-" oninput="this.className = ''"
                aria-label="default input example">
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