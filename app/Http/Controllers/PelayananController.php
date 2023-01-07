<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    public function dokter(Request $request)
    {   $dokter = $request->dokter;
        $cari = $request->cari;
        $dokter = DB::table('tb_pelayanan')->where('kelompok','like','dokter')
                                            ->where('nama','like',"%".$cari."%")
                                            ->paginate(10);
 
        return view('dokter/dokter', ['dokter' => $dokter,'title' => 'Dokter'] );
    }
    public function create()
    {
        $data['title'] = 'Tambah Dokter';
        return view('dokter/tambah_dokter', $data);
    }

    public function store(Request $request)
    {

        $dokter = new Pelayanan([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'kelompok' => $request->kelompok,
            'spesialis' => $request->spesialis,
        ]);
        $dokter->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('dokter/dokter');
    }
    public function editdokter($id){
        $dokter = Pelayanan::find($id);
        $data['title'] = 'Edit Pegawai';
        return view('dokter.edit_dokter',compact(['dokter']),$data);
    }

    public function updatedokter(Request $request, $id){
        $ubah = Pelayanan::findorfail($id);
        $dt =[
            'nip' => $request['nip'],
            'nama' => $request['nama'],
            'kelompok' => $request['kelompok'],
            'spesialis' => $request['spesialis'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('dokter/dokter');
    }

    public function destroy($id){
        $pelayanan = Pelayanan::find($id);
        $pelayanan->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('dokter/dokter');
    }

    public function perawat(Request $request)
    {   $perawat = $request->perawat;
        $cari = $request->cari;
        $perawat = DB::table('tb_pelayanan')->where('kelompok','like','perawat')
                                            ->where('nama','like',"%".$cari."%")
                                            ->paginate(10);
 
        return view('perawat/perawat', ['perawat' => $perawat,'title' => 'perawat'] );
    }
    public function create_perawat()
    {
        $data['title'] = 'Tambah perawat';
        return view('perawat/tambah_perawat', $data);
    }
    public function store_perawat(Request $request)
    {

        $perawat = new Pelayanan([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'kelompok' => $request->kelompok,
            'spesialis' => $request->spesialis,
        ]);
        $perawat->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('perawat/perawat');
    }
    
    public function editperawat($id){
        $perawat = Pelayanan::find($id);
        $data['title'] = 'Edit Pegawai';
        return view('perawat.edit_perawat',compact(['perawat']),$data);
    }

    public function updateperawat(Request $request, $id){
        $ubah = Pelayanan::findorfail($id);
        $dt =[
            'nip' => $request['nip'],
            'nama' => $request['nama'],
            'kelompok' => $request['kelompok'],
            'spesialis' => $request['spesialis'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('perawat/perawat');
    }

   
}
