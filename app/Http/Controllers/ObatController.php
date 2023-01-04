<?php

namespace App\Http\Controllers;

use App\Models\Stokobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
	{
        $obat = DB::table('tb_obat')->get();
 
        return view('admin/obat/obat', ['obat' => $obat,'title' => 'Obat'] );
    }
    public function create()
    {
        $data['title'] = 'Tambah Obat';
        return view('admin/obat/tambah_obat', $data);
    }

    public function store(Request $request)
    {

        $obat = new Stokobat([
            'kode' => $request->kode,
            'nm_obat' => $request->nm_obat,
            'stok' => $request->stok,
        ]);
        $obat->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('admin/obat/obat');
    }

    public function editobat($id){
        $obat = Stokobat::find($id);
        $data['title'] = 'Edit Obat';
        return view('admin.obat.edit_obat',compact(['obat']),$data);
    }

    public function updateobat(Request $request, $id){
        $ubah = Stokobat::findorfail($id);
        $dt =[
            'kode' => $request['kode'],
            'nm_obat' => $request['nm_obat'],
            'stok' => $request['stok'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('admin/obat/obat');
    }
    public function destroy($id){
        $obat = Stokobat::find($id);
        $obat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('admin/obat/obat');
    }
}
