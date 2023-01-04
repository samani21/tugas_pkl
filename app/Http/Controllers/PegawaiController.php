<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
	{
        $pegawai = DB::table('tb_pegawai')->get();
 
        return view('admin/pegawai/pegawai', ['pegawai' => $pegawai,'title' => 'Pegawai'] );
    }
    public function create()
    {
        $data['title'] = 'Tambah Pegawai';
        return view('admin/pegawai/tambah_pegawai', $data);
    }

    public function store(Request $request)
    {

        $pegawai = new Pegawai([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'kelompok' => $request->kelompok,
        ]);
        $pegawai->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('admin/pegawai/pegawai');
    }

    public function editpegawai($id){
        $pegawai = Pegawai::find($id);
        $data['title'] = 'Edit Pegawai';
        return view('admin.pegawai.edit_pegawai',compact(['pegawai']),$data);
    }

    public function updatepegawai(Request $request, $id){
        $ubah = Pegawai::findorfail($id);
        $dt =[
            'nip' => $request['nip'],
            'nama' => $request['nama'],
            'tanggal' => $request['tanggal'],
            'tempat' => $request['tempat'],
            'alamat' => $request['alamat'],
            'hp' => $request['hp'],
            'kelompok' => $request['kelompok'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('admin/pegawai/pegawai');
    }
    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('admin/pegawai/pegawai');
    }
}
