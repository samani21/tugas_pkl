
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h3><b>No berobat</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->no}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>NIK</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->nik}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Jenis Berobat</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->jenis}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>No BPJS</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->bpjs}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Nama</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->nama}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Tanggal lahir</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->tanggal}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Tempat lahir</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->tempat}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Alamat</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->alamat}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Gol darah</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->darah}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>No hp</b></h3>
                        </td>
                        <td>
                            <h3>{{$pasien->hp}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Tanggal Berobat</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->tgl}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Poli</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->poli}}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h3><b>Dokter</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->dokter}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Perawat</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->perawat}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Sistolik</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->sistolik}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Diastolik</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->diastolik}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Tinggi badan</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->tinggi}} Cm</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Berat badan</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->berat}} Kg</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Suhu</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->suhu}} °C</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Saturasi</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->saturasi}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Napas</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->napas}}/s</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Keluhan</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->keluhan}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Diagnosa</b></h3>
                        </td>
                        <td> @foreach($berobat->diagnosa as $d)
                            <h3>{{ $d->diagnosa }} ,</h3>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Status</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->tindakan}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><b>Biaya</b></h3>
                        </td>
                        <td>
                            <h3>{{$berobat->medis->biaya}}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <table class="table table-striped">
        <h3>Resep obat</h3>
        <thead>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Dosis</th>
        </thead>
        @foreach($berobat->resep as $a)
        <tr>
            <td>{{ $a->obat }}</td>
            <td>{{ $a->jumlah }}</td>
            <td>{{ $a->dosis }}</td>
        </tr>


        @endforeach

    </table>
</div>