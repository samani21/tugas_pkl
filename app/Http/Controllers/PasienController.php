<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Pasien;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PasienController extends Controller
{

    public function index(Request $request)
	{  $cari = $request->cari;
        $pasien = DB::table('tb_pasien')->where('nama','like',"%".$cari."%",'')->paginate(5);
 
        return view('pasien/pasien', ['pasien' => $pasien,'title' => 'Pasien'] );
    }

    public function create()
    {
        $data['title'] = 'Tambah Pasien';
        return view('pasien/tambah_pasien', $data);
    }

    public function store(Request $request)
    {

        $pasien = new Pasien([
            'no' => $request->no,
            'nik' => $request->nik,
            'jenis' => $request->jenis,
            'bpjs' => $request->bpjs,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jk' => $request->jk,
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'darah' => $request->darah,
            'hp' => $request->hp,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
        $pasien->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('pasien/pasien');
    }

    public function editpasien($id){
        $pasien = Pasien::find($id);
        $data['title'] = 'Edit Pasien';
        return view('pasien.edit_pasien',compact(['pasien']),$data);
    }
    public function detail($id,$pasine_id){
        $pasien = Pasien::find($id);
        $berobat = Berobat::find($pasine_id);
        $data['title'] = 'Data Pasien';
        return view('pasien.detail',['berobat' =>$berobat,'pasien' =>$pasien],$data);
    }

    public function updatepasien(Request $request, $id){
        $ubah = Pasien::findorfail($id);
        $dt =[
            'no' => $request['no'],
            'nik' => $request['nik'],
            'jenis' => $request['jenis'],
            'bpjs' => $request['bpjs'],
            'nama' => $request['nama'],
            'tanggal' => $request['tanggal'],
            'jk' => $request['jk'],
            'tempat' => $request['tempat'],
            'alamat' => $request['alamat'],
            'darah' => $request['darah'],
            'hp' => $request['hp'],
            'tgl' => $request['tgl'],
            'bulan' => $request['bulan'],
            'tahun' => $request['tahun'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('pasien/pasien');
    }

    public function destroy($id){
        $pasien = Pasien::find($id);
        $pasien->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('pasien/pasien');
    }

    public function cetak_pasien()
    {
        $pasien = DB::table('tb_pasien')->get();
        $pdf = PDF::loadView('pasien/cetak_pasien',compact('pasien'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('cetak_pasien.pdf');
    }
    public function laporan(Request $request)
	{   $cari = $request->cari;
        $pasien = DB::table('tb_pasien')->where('nama','like',"%".$cari."%",'')
		->paginate(5);
 
        return view('laporan/pasien', ['pasien' => $pasien,'title' => 'Laporan pasien'] );
    }
}
