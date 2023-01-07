<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerobatController extends Controller
{
    public function index(Request $request)
	{   $tgl = $request->tgl;
        $cari = $request->cari;
        $no = $request->no;
        $berobat = DB::table('tb_berobat')->where('tgl','like',"%".$tgl."%")
                                            ->where('nama','like',"%".$cari."%")
                                            ->where('no','like',"%".$no."%")
                                            ->paginate(5);
        return view('medis/medis', ['berobat' => $berobat,'title' => 'Rekam medis'] );
    }
    
    public function create($id)
    {   $pasien = Pasien::find($id);
        $data['title'] = 'Tambah berobat';
        return view('pasien/daftar',compact(['pasien']), $data);
    }
    
    
    public function store(Request $request)
    {

        $berobat = new Berobat([
            'pasien_id' => $request->pasien_id,
            'no' => $request->no,
            'nik' => $request->nik,
            'jenis' => $request->jenis,
            'bpjs' => $request->bpjs,
            'umum' => $request->umum,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'tgl' => $request->tgl,
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'darah' => $request->darah,
            'hp' => $request->hp,
            'status' => $request->status,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
        $berobat->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('pasien/pasien');
    }

    public function destroy($id){
        $berobat = Berobat::find($id);
        $berobat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('medis/medis');
    }

    public function laporan(Request $request)
	{   $tgl = $request->tgl;
        $berobat = DB::table('tb_berobat')->where('tgl','like',"%".$tgl."%",'')
		->paginate(5);
 
        return view('laporan/medis', ['berobat' => $berobat,'title' => 'Laporan Berobat'] );
    }
}
