
    <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover" style="border-collapse:collapse;border-spacing:1;" border="1">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">tempat</th>
                <th scope="col">Alamat</th>
                <th scope="col">No hp</th>
                <th scope="col">Kelompok</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($pegawai as $peg)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="Nip">{{$peg->nip}}</td>
                    <td data-title="nama">{{$peg->nama}}</td>
                    <td data-title="Tanggal lahir">{{$peg->tanggal}}</td>
                    <td data-title="Tempat lahir">{{$peg->tempat}}</td>
                    <td data-title="Alamat">{{$peg->alamat}}</td>
                    <td data-title="No Hp">{{$peg->hp}}</td>
                    <td data-title="Kelompok">{{$peg->kelompok}}</td>
                    
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>