@extends('layouts.dashboard')

@section('content')

<form action="{{ route('pasien.store')}}" method="POST">
    @csrf
    <div class="row g-2">
        <div class="col-6">
            <div>
                <label for="">No berobat</label>
                <input class="form-control" type="number" id="no" name="no" placeholder="Masukkan no berobat" aria-label="default input example" maxlength="10" autofocus required>
            </div>
            <div>
                <label for="">NIK</label>
                <input class="form-control" type="number" id="nik" name="nik" placeholder="Masukkan nik" aria-label="default input example" required>
            </div>
            <div>
                <label>Jenis berobat</label>
                <select name="jenis" class="form-control" onchange=" 
                    if (this.selectedIndex==2 )
                    { document.getElementById('bpjs').style.display ='inline'}
                    else { document.getElementById('bpjs').style.display = 'none' };">

                    <option value="pilih">--Pilih--</option>
                    <option value="Umum">Umum</option>
                    <option value="BPJS">BPJS</option>
                </select>
                <span id="bpjs" style="display:none;">
                    <label>No BPJS</label>
                    <input type="text" name="bpjs" value="-" class="form-control">
                </span>
            </div>
            <div>
                <label for="">Nama</label>
                <input class="form-control" type="text" id="nama" name="nama" placeholder="Masukkan nama" aria-label="default input example" required>
            </div>
            <div>
                <label for="">Tanggal lahir</label>
                <input class="form-control" type="date" id="tanggal" name="tanggal"  aria-label="default input example" required>
            </div>
        </div>
        <div class="col-6">
            <div>
                <label for="">Tempat lahir</label>
                <input class="form-control" type="text" id="tempat" name="tempat" placeholder="Tempat lahir" aria-label="default input example" required>
            </div>
            <div>
                <label for="">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" aria-label="default input example" required>
            </div>
            <div>
                <label for="">Gol darah</label>
                <input class="form-control" type="text" id="darah" name="darah" placeholder="" aria-label="default input example" required>
            </div>
            <div>
                <label for="">No hp</label>
                <input class="form-control" type="text" id="hp" name="hp" placeholder="Masukkan no hp" aria-label="default input example" required>
            </div>
            <hr>
            <div>
                <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </div>
    </div>
        
  </form>
@endsection