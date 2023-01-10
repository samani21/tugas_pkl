<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerobatController;
use App\Http\Controllers\IcdController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\RekammedisController;
use App\Http\Controllers\StokobatController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', 'App\Http\Controllers\AdminController');
        Route::get('/email/verify/need-verification',[AdminController::class,'index'])->middleware('auth')->name('verification.notice');
        //menu sidebar
        Route::get('dashboard/dashboard', [AdminController::class,'dashboard'])->name('admin/dashboard/dashboard');

    });
    Route::group(['middleware' => ['cek_login:rekam_medis']], function () {
        Route::resource('rekam_medis', 'App\Http\Controllers\RekammedisController');
        Route::get('/email/verify/need-verification',[RekammedisController::class,'index'])->middleware('auth')->name('verification.notice');
        //menu sidebar
        Route::get('dashboard/dashboard', [RekammedisController::class,'dashboard'])->name('rekam_medis/dashboard/dashboard');
    });
    Route::group(['middleware' => ['cek_login:apotek']], function () {
        Route::resource('apotek', 'App\Http\Controllers\ApotekController');
        Route::get('/email/verify/need-verification',[ApotekController::class,'index'])->middleware('auth')->name('verification.notice');
        //menu sidebar
        Route::get('dashboard/dashboard', [ApotekController::class,'dashboard'])->name('apotek/dashboard/dashboard');
    });
});
//daftar akun
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register.action');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->middleware('auth','signed')->name('verification.verify');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'rekam'])->middleware('auth','signed')->name('verification.verify');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'apotek'])->middleware('auth','signed')->name('verification.verify');
Route::get('/email/verify/resend-verification',[VerificationController::class,'send'])->middleware('auth','throttle:6,1')->name('verification.send');
Route::get('verifikasi', [AuthController::class, 'verifikasi'])->name('verifikasi');

//autocomplet
Route::get('selectobat', [ObatController::class, 'obat'])->name('obat.index');
Route::get('selectobat/{nm_obat}', [ObatController::class, 'nama']);

Route::get('selecpegawai', [PegawaiController::class, 'pegawai'])->name('pegawai.index');
Route::get('selectpegawai/{nama}', [PegawaiController::class, 'nama']);

Route::get('selecicd', [IcdController::class, 'icd'])->name('icd.index');
Route::get('selecicd/{name_id}', [IcdController::class, 'nama']);

//Pegawai
Route::get('pegawai/pegawai', [PegawaiController::class, 'index'])->name('pegawai/pegawai');
Route::get('pegawai/tambah_pegawai', [PegawaiController::class, 'create'])->name('pegawai/tambah_pegawai');
Route::post('pegawai/tambah_pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('pegawai/edit_pegawai/{id}',[PegawaiController::class,'editpegawai'])->name('pegawai/edit_pegawai');
Route::post('updatepegawai/{id}',[PegawaiController::class,'updatepegawai'])->name('updatepegawai');
Route::get('pegawai/hapus_pegawai/{id}', [PegawaiController::class,'destroy'])->name('hapus_pegawai');
Route::get('pegawai/cetak', [PegawaiController::class, 'cetak_pegawai'])->name('pegawai/cetak');

//Dokter
Route::get('dokter/dokter', [PelayananController::class, 'dokter'])->name('dokter/dokter');
Route::get('dokter/tambah_dokter', [PelayananController::class, 'create'])->name('dokter/tambah_dokter');
Route::post('dokter/tambah_dokter', [PelayananController::class, 'store'])->name('dokter.store');
Route::get('dokter/edit_dokter/{id}',[PelayananController::class,'editdokter'])->name('dokter/edit_dokter');
Route::post('updatedokter/{id}',[PelayananController::class,'updatedokter'])->name('updatedokter');
Route::get('dokter/hapus_dokter/{id}', [PelayananController::class,'destroy'])->name('hapus_dokter');
Route::get('dokter/cetak', [PelayananController::class, 'cetak_dokter'])->name('dokter/cetak');

//perawat
Route::get('perawat/perawat', [PelayananController::class, 'perawat'])->name('perawat/perawat');
Route::get('perawat/tambah_perawat', [PelayananController::class, 'create_perawat'])->name('perawat/tambah_perawat');
Route::post('perawat/tambah_perawat', [PelayananController::class, 'store_perawat'])->name('perawat.store');
Route::get('perawat/edit_perawat/{id}',[PelayananController::class,'editperawat'])->name('perawat/edit_perawat');
Route::post('updateperawat/{id}',[PelayananController::class,'updateperawat'])->name('updateperawat');
Route::get('perawat/hapus_perawat/{id}', [PelayananController::class,'destroy'])->name('hapus_perawat');
Route::get('perawat/cetak', [PelayananController::class, 'cetak_perawat'])->name('perawat/cetak');

//pasien
Route::get('pasien/pasien', [PasienController::class, 'index'])->name('pasien/pasien');
Route::get('pasien/tambah_pasien', [PasienController::class, 'create'])->name('pasien/tambah_pasien');
Route::post('pasien/tambah_pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('pasien/edit_pasien/{id}',[PasienController::class,'editpasien'])->name('pasien/edit_pasien');
Route::post('updatepasien/{id}',[PasienController::class,'updatepasien'])->name('updatepasien');
Route::get('pasien/hapus_pasien/{id}', [PasienController::class,'destroy'])->name('hapus_pasien');
Route::get('pasien/daftar/{id}', [BerobatController::class, 'create'])->name('pasien/daftar');
Route::post('pasien/daftar/{id}', [BerobatController::class, 'store'])->name('tambah.store');
Route::get('pasien/detail/id={id}&pasien_id={pasien_id}',[PasienController::class,'detail'])->name('pasien/detail');
        
Route::get('pasien/cetak_pasien', [PasienController::class, 'cetak_pasien'])->name('pasien/cetak_pasien');

//rekam medis
Route::get('medis/medis', [BerobatController::class, 'index'])->name('medis/medis');
Route::get('medis/periksa_fisik/{id}',[MedisController::class,'periksa'])->name('medis/periksa_fisik');
Route::post('medis/periksa_fisik/{id}',[MedisController::class,'store'])->name('fisik.store');
//pemberian resep
Route::get('medis/periksa_obat/{id}',[MedisController::class,'obat'])->name('medis/periksa_obat');
Route::post('medis/periksa_obat/{id}',[MedisController::class,'obat_store'])->name('resep.store');
Route::post('selesai/{id}',[MedisController::class,'selesai'])->name('selesai');
Route::post('medis/hapus_resep/{id}',[MedisController::class,'hapus_resep'])->name('hapus_resep');
//Diagnosa
Route::get('medis/periksa_diagnosa/{id}',[MedisController::class,'diagnosa'])->name('medis/diagnosa');
Route::post('medis/periksa_diagnosa/{id}',[MedisController::class,'diagnosa_store'])->name('diagnosa.store');
Route::get('medis/rekam_medis/hapus_diagnosa/{id}', [MedisController::class,'hapus_diagnosa'])->name('hapus_diagnosa');

Route::get('medis/rekam_medis/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'rekam'])->name('medis/rekam_medis');
Route::get('medis/hapus_berobat/{id}', [MedisController::class,'destroy'])->name('hapus_berobat');
Route::get('pasien/detail/rekam_medis/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'rekam'])->name('medis/rekam_medis');
Route::get('medis/rekam_medis/hapus_resep/{id}', [MedisController::class,'hapus_resep'])->name('hapus_resep');
        
Route::get('medis/cetak_rm/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'cetak_rm'])->name('medis/cetak_rm');
Route::get('medis/cetak_medis', [MedisController::class, 'cetak_medis'])->name('medis/cetak_medis');
//obat
Route::get('obat/obat', [ObatController::class, 'index'])->name('obat/obat');
Route::get('obat/tambah_obat', [ObatController::class, 'create'])->name('obat/tambah_obat');
Route::post('obat/tambah_obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('obat/edit_obat/{id}',[ObatController::class,'editobat'])->name('obat/edit_obat');
Route::post('updateobat/{id}',[ObatController::class,'updateobat'])->name('updateobat');
Route::get('obat/hapus_obat/{id}', [ObatController::class,'destroy'])->name('hapus_obat');
Route::get('obat/tambah_stok/{id}', [StokobatController::class, 'create'])->name('obat/tambah_stok');
Route::post('obat/tambah_stok/{id}', [StokobatController::class, 'stok_store'])->name('stok.store');
Route::get('obat/edit_stok/{id}',[StokobatController::class,'editstok'])->name('obat/edit_stok');
Route::get('obat/hapus_masuk/{id}', [StokobatController::class,'destroy'])->name('hapus_masuk');
Route::post('updatestok/{id}', [StokobatController::class, 'updatestok'])->name('updatestok');
Route::post('obat/edit_stok/{id}', [StokobatController::class, 'stok_edit'])->name('edit.store');
Route::get('obat/masuk', [ObatController::class, 'obat_masuk'])->name('obat/obat_masuk');
Route::get('obat/cetak_obat', [ObatController::class, 'cetak_obat'])->name('obat/cetak_obat');
Route::get('obat/cetak_obatmasuk', [ObatController::class, 'cetak_obatmasuk'])->name('obat/cetak_obatmasuk');
Route::get('obat/cetak_obatkeluar', [ObatController::class, 'cetak_obatkeluar'])->name('obat/cetak_obatkeluar');

//laporan
Route::get('laporan/pegawai', [PegawaiController::class, 'laporan'])->name('laporan/pegawai');
Route::get('laporan/pasien', [PasienController::class, 'laporan'])->name('laporan/pasien');
Route::get('laporan/medis', [BerobatController::class, 'laporan'])->name('laporan/medis');
Route::get('laporan/obat', [ObatController::class, 'laporan'])->name('laporan/obat');
Route::get('laporan/obat_masuk', [ObatController::class, 'laporan_masuk'])->name('laporan/obat_masuk');
Route::get('laporan/obat_keluar', [ObatController::class, 'laporan_keluar'])->name('laporan/obat_keluar');