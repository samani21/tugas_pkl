<?php

namespace App\Http\Controllers;

use App\Models\Stokobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ObatController extends Controller
{
    public function index(Request $request)
	{   $cari = $request->cari;
        $obat = DB::table('tb_obat')->where('nm_obat','like',"%".$cari."%",'')->paginate(5);
 
        return view('obat/obat', ['obat' => $obat,'title' => 'Obat'] );
    }
    public function create()
    {
        $data['title'] = 'Tambah Obat';
        return view('obat/tambah_obat', $data);
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
        return redirect()->route('obat/obat');
    }

    public function editobat($id){
        $obat = Stokobat::find($id);
        $data['title'] = 'Edit Obat';
        return view('obat.edit_obat',compact(['obat']),$data);
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
        return redirect('obat/obat');
    }
    public function destroy($id){
        $obat = Stokobat::find($id);
        $obat->delete();
        toast('Yeay Berhasil menghapus data','success');
        return redirect('obat/obat');
    }

    public function obat(){
        $data = Stokobat::where('nm_obat', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function nama($nm_obat){
        $data = Stokobat::where('nm_obat', $nm_obat)->where('kode', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function cetak_obat()
	{
        $obat = DB::table('tb_obat')->get();
        $pdf = PDF::loadView('obat/cetak_obat',compact('obat'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('cetak_obat.pdf');;
    }

    public function laporan(Request $request)
	{   $cari = $request->cari;
        $obat = DB::table('tb_obat')->where('nm_obat','like',"%".$cari."%",'')
		->paginate(5);
 
        return view('laporan/obat', ['obat' => $obat,'title' => 'Laporan Obat'] );
    }
}
