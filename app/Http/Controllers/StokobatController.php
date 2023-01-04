<?php

namespace App\Http\Controllers;

use App\Models\Stokobat;
use App\Models\Tambahobat;
use Illuminate\Http\Request;

class StokobatController extends Controller
{
    public function create($id){
        $obat = Stokobat::find($id);
        $data['title'] = 'Edit Obat';
        return view('admin.obat.tambah_stok',compact(['obat']),$data);
    }

    public function store(Request $request)
    {

        $tobat = new Tambahobat([
            'kode' => $request->kode,
            'nama_obat' => $request->nama_obat,
            'jumlah' => $request->jumlah,
        ]);
        $tobat->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('admin/obat/obat');
    }
}
