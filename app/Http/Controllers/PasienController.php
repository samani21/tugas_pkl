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
	{  $nama = $request->nama;
        $no_berobat = $request->no_berobat;

        if($no_berobat == ""){
            $pasien = DB::table('tb_pasien')->where('nama','like',"%".$nama."%")
		->paginate(7);
        }else if($no_berobat == $no_berobat){
            $pasien = DB::table('tb_pasien')
            ->where('no_berobat','=',"".$no_berobat."")->where('nama','like',"%".$nama."%")
		->paginate(7);
        }

        // $pasien = DB::table('tb_pasien')->where('no','=',"".$no."")->paginate(7);
        
 
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
            'no_berobat' => $request->no_berobat,
            'nik' => $request->nik,
            'jenis_berobat' => $request->jenis_berobat,
            'no_bpjs' => $request->no_bpjs,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jk' => $request->jk,
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'gol_darah' => $request->gol_darah,
            'no_hp' => $request->no_hp,
            'tgl_pasien' => $request->tgl_pasien,
            'bulan_pasien' => $request->bulan_pasien,
            'tahun_pasien' => $request->tahun_pasien,
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
    public function detail($id,$pasien_id){
        $pasien = Pasien::find($id);
        $berobat = DB::table('tb_berobat')->where('pasien_id','LIKE',"%".$pasien_id."%")->paginate(10);
        $data['title'] = 'Data Pasien';
        return view('pasien.detail',['berobat' =>$berobat,'pasien' =>$pasien],$data);
    }

    public function updatepasien(Request $request, $id){
        $ubah = Pasien::findorfail($id);
        $dt =[
            'no_berobat' => $request['no_berobat'],
            'nik' => $request['nik'],
            'jenis_berobat' => $request['jenis_berobat'],
            'no_bpjs' => $request['no_bpjs'],
            'nama' => $request['nama'],
            'tanggal' => $request['tanggal'],
            'jk' => $request['jk'],
            'tempat' => $request['tempat'],
            'alamat' => $request['alamat'],
            'gol_darah' => $request['gol_darah'],
            'no_hp' => $request['no_hp'],
            'tgl_pasien' => $request['tgl_pasien'],
            'bulan_pasien' => $request['bulan_pasien'],
            'tahun_pasien' => $request['tahun_pasien'],
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

    public function cetak_pasien(Request $request)
    {
        $tgl = $request->tgl;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $cari = $request->cari;
        $pasien = DB::table('tb_pasien')->where('tgl','like',"%".$tgl."%")
        ->where('tahun','like',"%".$tahun."%")
        ->where('bulan','like',"%".$bulan."%")
        ->where('nama','like',"%".$cari."%")->get();
        $pdf = PDF::loadView('pasien/cetak_pasien',compact('pasien'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('cetak_pasien.pdf');
    }
    public function laporan(Request $request)
	{   
        $cari = $request->cari;
        $pasien = DB::table('tb_pasien')
        ->where('nama','like',"%".$cari."%")
		->paginate(7);
        $pasien->withPath('pasien?tgl=14-01-2023&');
        return view('laporan/pasien', ['pasien' => $pasien,'title' => 'Laporan pasien'] );
    }
}
