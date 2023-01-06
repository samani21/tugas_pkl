
        <table class="table table-striped table-hover">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Kode obat</th>
                <th scope="col">Nama obat</th>
                <th scope="col">stok</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($obat as $o)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="Nip">{{$o->kode}}</td>
                    <td data-title="nama">{{$o->nm_obat}}</td>
                    <td data-title="Tanggal lahir">{{$o->stok}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>