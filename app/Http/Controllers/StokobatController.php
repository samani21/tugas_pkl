<?php

namespace App\Http\Controllers;

use App\Models\Stokobat;
use App\Models\Tambahobat;
use Illuminate\Http\Request;

class StokobatController extends Controller
{
    public function create($kode){
        $obat = Stokobat::find($kode);
        $data['title'] = 'Tambah Stok Obat';
        return view('obat.tambah_stok',compact(['obat']),$data);
    }

    public function stok_store(Request $request)
    {

        $tobat = new Tambahobat([
            'kode' => $request->kode,
            'nama_obat' => $request->nama_obat,
            'jumlah' => $request->jumlah,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,

        ]);
        $tobat->save();
        Alert()->success('SuccessAlert','Tambah data pegawai berhasil');
        return redirect()->route('obat/obat');
    }

    public function editstok($id){
        $obat = Tambahobat::find($id);
        $data['title'] = 'Edit Obat';
        return view('obat.edit_stok',compact(['obat']),$data);
    }
    public function updatestok(Request $request, $id){
        $ubah = Tambahobat::findorfail($id);
        $dt =[
            'kode' => $request['kode'],
            'nama_obat' => $request['nama_obat'],
            'jumlah' => $request['jumlah'],
            'tgl' => $request['tgl'],
            'bulan' => $request['bulan'],
            'tahun' => $request['tahun'],
        ];
        $ubah->update($dt);
        alert('Sukses','Simpan Data Berhasil', 'success');
        return redirect('obat/masuk');
    }
    public function destroy($id){
        $obat = Tambahobat::find($id);
        $obat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('obat/masuk');
    }
}
