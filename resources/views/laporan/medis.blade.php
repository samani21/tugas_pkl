@extends('layouts.dashboard')

@section('content')

    <div>
        <form action="{{route('medis/cetak_medis')}}" method="get" class="row g-12">
            <div class="col-md-2">
                <label for="">Cetak Data</label>
            <input class="form-control" type="number" name="tahun" value="{{date('Y')}}" aria-label="default input example">
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <input type="text" name="tgl" class="form-control"  value="{{date('d-m-Y')}}" id="">
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <select name="bulan" class="form-control" >
                    <option value="">--Pilih--</option>
                    <option value="1">Januari</option>
                    <option value="2">Pebruari</option>
                    <option value="3">Maret</option>
                    <option value="04">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-auto">
                <br>
            <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-print"></i> Cetak</button>
        </form>
    </div>
    <div>
        <form action="{{route('laporan/medis')}}" method="get" class="row g-12">
            <div class="col-md-2">
                <label for="">Cari data</label>
            <input class="form-control" type="number" name="tahun" value="{{date('Y')}}" aria-label="default input example">
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <input type="text" name="tgl" class="form-control"  value="{{date('d-m-Y')}}" id="">
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <select name="bulan" class="form-control" >
                    <option value="">--Pilih--</option>
                    <option value="1">Januari</option>
                    <option value="2">Pebruari</option>
                    <option value="3">Maret</option>
                    <option value="04">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-auto">
                <br>
            <button type="submit" class="btn btn-primary mb-3"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover">
            <thead>
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">No berobat</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenis berobat</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal berobat</th>
            </tr>
            </thead>
            <tbody>
                @php 
                $no=1;
            @endphp
            @foreach($berobat as $medis)
                <tr align="center">
                    <td data-title="No">{{ $no++ }}</td>
                    <td data-title="No berobat">{{$medis->no}}</td>
                    <td data-title="NIK">{{$medis->nik}}</td>
                    <td data-title="Jenis berobat">{{$medis->jenis}}</td>
                    <td data-title="Nama">{{$medis->nama}}</td>
                    <td data-title="Tanggal berobat"><?php echo $medis->tgl;?></td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $berobat->links() }}
    </div>
@endsection