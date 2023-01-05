<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Diagnosa;
use App\Models\Medis;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

class MedisController extends Controller
{
    public function periksa($id)
    {   $berobat = Berobat::find($id);
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa',compact(['berobat']), $data);
    }
    
    public function rekam($id,$pasien_id){
        $berobat = Berobat::find($id);
        $pasien = Pasien::find($pasien_id);
        $data['title'] = 'Rekam medis pasien';
        return view('medis/rekam_medis',['berobat' =>$berobat,'pasien' =>$pasien],$data);
    }
    
    public function store(Request $request , $id){
        $medis = new Medis([
            'berobat_id' => $request->berobat_id,
            'pasien_id' => $request->pasien_id,
            'tgl' => $request->tgl,
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
            'poli' => $request->poli,
        ]);
        $medis->save();

        $diagnosa = new Diagnosa([
            'berobat_id' => $request->berobat_id,
            'diagnosa' => $request->diagnosa,
        ]);
        $diagnosa->save();

        $obat = new Obat([
            'berobat_id' => $request->berobat_id,
            'kd_obat' => $request->kd_obat,
            'obat' => $request->obat,
            'jumlah' => $request->jumlah,
            'dosis' => $request->dosis,
        ]);
        $obat->save();

        $ubah = Berobat::findorfail($id);
        $dt =[
            'status' => $request['status'],
        ];
        $ubah->update($dt);
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('medis/medis');
    }
    public function destroy($id){
        $berobat = Berobat::find($id);
        $berobat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('medis/medis');
    }
}
