@extends('layouts.dashboard')

@section('content')

<form action="{{route('resep.store',$berobat->id)}}" method="POST">
    @csrf
    <input type="hidden" id="berobat_id" name="berobat_id" value="{{$berobat->id}}">
            {{-- <input class="form-control" type="hidden" id="status" name="status" value="2"> --}}
    <div>
        <label for="">Tanggal</label>
        <input class="form-control" type="text" id="tgl" name="tgl" value="{{date('d-m-Y')}}" placeholder="Masukkan NIP" aria-label="default input example">
        <input class="form-control" type="hidden" id="bulan" name="bulan" value="{{date('m')}}" placeholder="Masukkan NIP" aria-label="default input example">
        <input class="form-control" type="hidden" id="tahun" name="tahun" value="{{date('Y')}}" placeholder="Masukkan NIP" aria-label="default input example">
    </div>
    <div>
        <label> kode oabat</label>
        <input class="form-control" name="kd_obat" list="obat" id="exampleDataList" autocomplete="off">
        <datalist id="obat">
                @foreach($obat as $o)
            <option value="{{$o->kode}}">Nama obat: {{$o->nm_obat}}</option>
            @endforeach
        </datalist>
    </div>
    <input type="hidden" name="obat" value="a"id="">
    <div>
        <div>
            <label for="">jumlah</label>
            <input class="form-control" type="number" id="jumlah" name="jumlah" value="-" oninput="this.className = ''"
                aria-label="default input example" required>
        </div>
    </div>
    <div>
        <div>
            <label for="">Dosis</label>
            <input class="form-control" type="text" id="dosis" name="dosis" oninput="this.className = ''"
                aria-label="default input example" required>
        </div>
    </div> 
    <div>
        <div>
            <label for="">Pemakaian</label>
            <input class="form-control" type="text" id="pakai" name="pakai" oninput="this.className = ''"
                aria-label="default input example" required>
        </div>
    </div>
  <br>
  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
  <a href="/medis/rekam_medis/pasien={{$berobat->id}}&rekammedis={{$berobat->pasien_id}}"class="btn btn-warning"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
</div>
  </form>
@endsection