<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Diagnosa;
use App\Models\Icd;
use App\Models\Medis;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Stokobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;

class MedisController extends Controller
{
    public function periksa($id)
    {   $berobat = Berobat::find($id);
        $dokter = DB::table('tb_pelayanan')->where('kelompok','like','dokter','')->paginate(100);
        $perawat = DB::table('tb_pelayanan')->where('kelompok','like','perawat','')->paginate(100);
        $icd = Icd::all();
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_fisik',compact(['berobat','dokter','perawat','icd']), $data);
    }

    public function obat($id,$pasien)
    {   $berobat = Berobat::find($id);
        $obat = Stokobat::all();
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_obat',compact(['berobat','obat']), $data);
    }

    public function diagnosa($id)
    {   $berobat = Berobat::find($id);
        $icd = Icd::all();
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_diagnosa',compact(['berobat','icd']), $data);
    }
    
    public function rekam($id,$pasien_id){
        $berobat = Berobat::find($id);
        $pasien = Pasien::find($pasien_id);
        $resep = DB::table('tb_resep')->join('tb_obat','tb_obat.kode','=','tb_resep.kd_obat')->where('berobat_id','=',''.$id.'')->get();
        $data['title'] = 'Rekam medis pasien';
        return view('medis/rekam_medis',['berobat' =>$berobat,'pasien' =>$pasien,'resep'=>$resep],$data);
    }
    
    public function store(Request $request , $id){
        $medis = new Medis([
            'berobat_id' => $request->berobat_id,
            'tgl' => $request->tgl,
            'umur' => $request->umur,
            'dokter' => $request->dokter,
            'perawat' => $request->perawat,
            'sistolik' => $request->sistolik,
            'diastolik' => $request->diastolik,
            'saturasi' => $request->saturasi,
            'suhu' => $request->suhu,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'keluhan' => $request->keluhan,
            'tindakan' => $request->tindakan,
            'napas' => $request->napas,
            'biaya' => $request->biaya,
            'keterangan' => $request->keterangan,
        ]);
        $medis->save();

        $ubah = Berobat::findorfail($id);
        $dt =[
            'status' => $request['status'],
        ];
        $diagnosa = new Diagnosa([
            'berobat_id' => $request->berobat_id,
            'diagnosa' => $request->diagnosa,
        ]);
        $diagnosa->save();
        $ubah->update($dt);
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect('medis/medis?tgl='.date('d-m-Y').'');
    }
    public function destroy($id){
        $berobat = Berobat::find($id);
        $berobat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('medis/medis?tgl='.date('d-m-Y').'');
    }

    public function hapus_resep($id){
        $resep = Obat::find($id);
        $resep->delete();
        toast('Yeay Berhasil menghapus data','success');
        return Redirect::back();
    }

    public function hapus_diagnosa($id){
        $diagnosa = Diagnosa::find($id);
        $diagnosa->delete();
        toast('Yeay Berhasil menghapus data','success');
        return Redirect::back();
    }

    public function obat_store(Request $request ){

        $obat = new Obat([
            'berobat_id' => $request->berobat_id,
            'kd_obat' => $request->kd_obat,
            'obat' => $request->obat,
            'jumlah' => $request->jumlah,
            'dosis' => $request->dosis,
            'pakai' => $request->pakai,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
        $obat->save();

        // $ubah = Berobat::findorfail($id);
        // $dt =[
        //     'status' => $request['status'],
        // ];
        // $ubah->update($dt);
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return Redirect::back();
    }

    public function selesai(Request $request , $id){
        $ubah = Berobat::findorfail($id);
        $dt =[
            'status' => $request['status'],
        ];
        $ubah->update($dt);
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return Redirect::back();
    }

    public function diagnosa_store(Request $request , $id){
        $diagnosa = new Diagnosa([
            'berobat_id' => $request->berobat_id,
            'diagnosa' => $request->diagnosa,
            
        ]);
        $diagnosa->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return Redirect::back();
    }

    public function cetak_rm($id,$pasien_id){
        $berobat = Berobat::find($id);
        $pasien = Pasien::find($pasien_id);
        $pdf = PDF::loadView('medis/cetak_rm',compact('pasien','berobat'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('cetak_rekam_medis.pdf');
    }
    public function cetak_medis(Request $request)
    {   $tgl = $request->tgl;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $medis = DB::table('tb_berobat')->where('tgl','like',"%".$tgl."%")
        ->where('tahun','like',"%".$tahun."%")
        ->where('bulan','like',"%".$bulan."%")
		->paginate();
        $pdf = PDF::loadView('medis/cetak_medis',compact('medis'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('cetak_medis.pdf');
    }
}
