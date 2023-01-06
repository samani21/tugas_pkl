<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Diagnosa;
use App\Models\Medis;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedisController extends Controller
{
    public function periksa($id)
    {   $berobat = Berobat::find($id);
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_fisik',compact(['berobat']), $data);
    }

    public function obat($id)
    {   $berobat = Berobat::find($id);
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_obat',compact(['berobat']), $data);
    }

    public function diagnosa($id)
    {   $berobat = Berobat::find($id);
        $data['title'] = 'Periksa pasien';
        return view('medis/periksa_diagnosa',compact(['berobat']), $data);
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
        return redirect()->route('medis/medis');
    }
    public function destroy($id){
        $berobat = Berobat::find($id);
        $berobat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('medis/medis');
    }

    public function obat_store(Request $request , $id){

        $obat = new Obat([
            'berobat_id' => $request->berobat_id,
            'kd_obat' => $request->kd_obat,
            'obat' => $request->obat,
            'jumlah' => $request->jumlah,
            'dosis' => $request->dosis,
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
}
