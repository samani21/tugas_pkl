<div>
            <label for="">Kelompok pegawai</label>
            <select class="form-select" name="dokter" aria-label="Default select example">
                <option selected>--pilih--</option>
                @foreach($dokter as $dok)
                <option value="TENAGA MEDIS">{{$dok->nama}}({{$dok->spesialis}})</option>
                @endforeach
              </select>
        </div>
        </div>  
            <label for="">Nama perawat</label>
            <select class="form-select" name="perawat" aria-label="Default select example">
                <option selected>--pilih--</option>
                @foreach($perawat as $per)
                <option value="TENAGA MEDIS">{{$per->nama}}({{$per->spesialis}})</option>
                @endforeach
              </select>
        </div>
        <div>
            <label>Poli</label>
            <select name="poli" class="form-control">
                <option value="">--Pilih--</option>
                <option value="Umum">Umum</option>
                <option value="Anak">Anak</option>
                <option value="Gigi">Gigi</option>
                <option value="KB">KB</option>
                <option value="kandungan">kandungan</option>
            </select>
        </div>
    </div>