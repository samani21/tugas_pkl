@extends('layouts.dashboard')

@section('content')

<form action="{{url('updatepasien',$pasien->id)}}" method="POST">
    @csrf
    <div class="row g-2">
        <div class="col-6">
            <div>
                <label for="">No berobat</label>
                <input class="form-control" type="number" id="no" name="no" value="{{$pasien->no}}"  placeholder="Masukkan no berobat" aria-label="default input example">
            </div>
            <div>
                <label for="">NIK</label>
                <input class="form-control" type="number" id="nik" name="nik" value="{{$pasien->nik}}" placeholder="Masukkan nik" aria-label="default input example">
            </div>
            <div>
                <label>Jenis berobat</label>
                <select name="jenis" class="form-control" onchange=" 
                    if (this.selectedIndex==1 )
                    { document.getElementById('umum').style.display ='inline'}
                    else { document.getElementById('umum').style.display = 'none' }if (this.selectedIndex==2 )
                    { document.getElementById('bpjs').style.display ='inline'}
                    else { document.getElementById('bpjs').style.display = 'none' };">
    
                    <option value="{{$pasien->jenis}}">{{$pasien->jenis}}</option>
                    <option value="Umum">Umum</option>
                    <option value="BPJS">BPJS</option>
                </select>
    
                <span id="umum" style="display:none;">
                    <input type="hidden" name="bpjs" value="-" class="form-control">
                </span>
                <span id="bpjs" <?php if($pasien->jenis =='BPJS'){
                    echo 'style="display:inline;"';
                 }if($pasien->jenis =='Umum'){
                     echo 'style="display:none;"';
                  }?>>
                    <label>No BPJS</label>
                    <input type="text" name="bpjs" <?php if($pasien->jenis =='BPJS'){
                        echo 'value="'.$pasien->bpjs.'"';
                     }if($pasien->jenis =='Umum'){
                         echo 'value="-" ';
                      }?>  class="form-control">
                </span>
            </div>
            <div>
                <label for="">Nama</label>
                <input class="form-control" type="text" id="nama" name="nama"  value="{{$pasien->nama}}" placeholder="Masukkan nama" aria-label="default input example">
            </div>
            <div>
                <label for="">Tanggal lahir</label>
                <input class="form-control" type="date" id="tanggal" name="tanggal" value="{{$pasien->tanggal}}" aria-label="default input example">
            </div>
        </div>
        <div class="col-6">
            <div>
                <label for="">Tempat lahir</label>
                <input class="form-control" type="text" id="tempat" name="tempat" value="{{$pasien->tempat}}" placeholder="Tempat lahir" aria-label="default input example">
            </div>
            <div>
                <label for="">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" value="{{$pasien->alamat}}" placeholder="Masukkan alamat" aria-label="default input example">
            </div>
            <div>
                <label for="">Gol darah</label>
                <input class="form-control" type="text" id="darah" name="darah" value="{{$pasien->darah}}" placeholder="" aria-label="default input example">
            </div>
            <div>
                <label for="">No hp</label>
                <input class="form-control" type="text" id="hp" name="hp" value="{{$pasien->hp}}" placeholder="Masukkan no hp" aria-label="default input example">
            </div>
            <hr>
            <div>
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </div>
  </form>
@endsection