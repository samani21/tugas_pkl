<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Pasien;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{

    public function index()
	{
        $pasien = DB::table('tb_pasien')->get();
 
        return view('admin/pasien/pasien', ['pasien' => $pasien,'title' => 'Pasien'] );
    }

    public function create()
    {
        $data['title'] = 'Tambah Pasien';
        return view('admin/pasien/tambah_pasien', $data);
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
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'darah' => $request->darah,
            'hp' => $request->hp,
        ]);
        $pasien->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('admin/pasien/pasien');
    }

    public function editpasien($id){
        $pasien = Pasien::find($id);
        $data['title'] = 'Edit Pasien';
        return view('admin.pasien.edit_pasien',compact(['pasien']),$data);
    }
    public function detail($id,$pasine_id){
        $pasien = Pasien::find($id);
        $berobat = Berobat::find($pasine_id);
        $data['title'] = 'Data Pasien';
        return view('admin.pasien.detail',['berobat' =>$berobat,'pasien' =>$pasien],$data);
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
            'tempat' => $request['tempat'],
            'alamat' => $request['alamat'],
            'darah' => $request['darah'],
            'hp' => $request['hp'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('admin/pasien/pasien');
    }

    public function destroy($id){
        $pasien = Pasien::find($id);
        $pasien->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('admin/pasien/pasien');
    }
}
