@extends('layouts.admin')

@section('content')

<form action="{{route('create.store',$berobat->id)}}" method="POST">
    @csrf
                <div>
                    <input type="hidden" id="id_pasien" name="id_pasien" value="{{$berobat->id_pasien}}">
                    <label for="">No berobat</label>
                    <input class="form-control" type="text" value="{{$berobat->no}}" aria-label="default input example" readonly>
                </div>
                <div>
                    <label for="">Tanggal berobat</label>
                    <input class="form-control" type="text" id="tgl" name="tgl" value="@php echo date('d-m-Y') @endphp" aria-label="default input example" readonly>
                </div>
                <div>
                    <label for="">Nama dokter</label>
                    <input class="form-control" type="text" id="dokter" name="dokter" aria-label="default input example">
                </div>
                <div>
                    <label for="">Nama perawat</label>
                    <input class="form-control" type="text" id="perawat" name="perawat" aria-label="default input example">
                </div>
                <div>
                    <input class="form-control" type="hidden" id="status" name="status" value="1">
                </div>
                <div>
                    <label for="">Sistolik</label>
                    <input class="form-control" type="text" id="sistolik" name="sistolik" aria-label="default input example">
                </div>
                <div>
                    <label for="">Diastolik</label>
                    <input class="form-control" type="text" id="diastolik" name="diastolik" aria-label="default input example">
                </div>
                <div>
                    <label for="">Saturasi</label>
                    <input class="form-control" type="text" id="saturasi" name="saturasi" aria-label="default input example">
                </div>
                <div>
                    <label for="">Suhu</label>
                    <input class="form-control" type="text" id="suhu" name="suhu" aria-label="default input example">
                </div>
                <div>
                    <label for="">Tinggi</label>
                    <input class="form-control" type="text" id="tinggi" name="tinggi" aria-label="default input example">
                </div>
                <div>
                    <label for="">Berat</label>
                    <input class="form-control" type="text" id="berat" name="berat" aria-label="default input example">
                </div>
                <div>
                    <br>
                    <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                    <a href="#" onclick="goBack()" class="btn btn-warning">Batal</a>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                </div>
  </form>
@endsection