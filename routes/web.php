<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerobatController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
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
    return view('welcome');
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
        Route::get('dashboard/dashboard', function () {
            return view('admin/dashboard/dashboard', ['title' => 'Dashboard']);
        })->name('admin/dashboard/dashboard');

        //Pegawai
        Route::get('pegawai/pegawai', [PegawaiController::class, 'index'])->name('pegawai/pegawai');
        Route::get('pegawai/tambah_pegawai', [PegawaiController::class, 'create'])->name('pegawai/tambah_pegawai');
        Route::post('pegawai/tambah_pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('pegawai/edit_pegawai/{id}',[PegawaiController::class,'editpegawai'])->name('pegawai/edit_pegawai');
        Route::post('updatepegawai/{id}',[PegawaiController::class,'updatepegawai'])->name('updatepegawai');
        Route::get('pegawai/hapus_pegawai/{id}', [PegawaiController::class,'destroy'])->name('hapus_pegawai');
        Route::get('pegawai/cetak', [PegawaiController::class, 'cetak_pegawai'])->name('pegawai/cetak');

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
        //Diagnosa
        Route::get('medis/periksa_diagnosa/{id}',[MedisController::class,'diagnosa'])->name('medis/diagnosa');
        Route::post('medis/periksa_diagnosa/{id}',[MedisController::class,'diagnosa_store'])->name('diagnosa.store');

        Route::get('medis/rekam_medis/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'rekam'])->name('medis/rekam_medis');
        Route::get('medis/hapus_berobat/{id}', [MedisController::class,'destroy'])->name('hapus_berobat');
        Route::get('pasien/detail/rekam_medis/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'rekam'])->name('medis/rekam_medis');
        Route::get('medis/hapus_medis/{id}', [BerobatController::class,'destroy'])->name('hapus_pasien');
        
        Route::get('medis/cetak_rm/pasien={id}&rekammedis={pasien_id}',[MedisController::class,'cetak_rm'])->name('medis/cetak_rm');
        
        //obat
        Route::get('obat/obat', [ObatController::class, 'index'])->name('obat/obat');
        Route::get('obat/tambah_obat', [ObatController::class, 'create'])->name('obat/tambah_obat');
        Route::post('obat/tambah_obat', [ObatController::class, 'store'])->name('obat.store');
        Route::get('obat/edit_obat/{id}',[ObatController::class,'editobat'])->name('obat/edit_obat');
        Route::post('updateobat/{id}',[ObatController::class,'updateobat'])->name('updateobat');
        Route::get('obat/hapus_obat/{id}', [ObatController::class,'destroy'])->name('hapus_obat');
        Route::get('obat/tambah_stok/{id}', [StokobatController::class, 'create'])->name('obat/tambah_stok');
        Route::post('obat/tambah_stok/{id}', [StokobatController::class, 'stok_store'])->name('stok.store');

        Route::get('obat/cetak_obat', [ObatController::class, 'cetak_obat'])->name('obat/cetak_obat');

        //laporan
        Route::get('laporan/pegawai', [PegawaiController::class, 'laporan'])->name('laporan/pegawai');
        Route::get('laporan/pasien', [PasienController::class, 'laporan'])->name('laporan/pasien');
        Route::get('laporan/medis', [BerobatController::class, 'laporan'])->name('laporan/medis');
        Route::get('laporan/obat', [ObatController::class, 'laporan'])->name('laporan/obat');
    });
    Route::group(['middleware' => ['cek_login:editor']], function () {
        Route::resource('editor', AdminController::class);
    });
});
//daftar akun
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register.action');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->middleware('auth','signed')->name('verification.verify');
Route::get('/email/verify/resend-verification',[VerificationController::class,'send'])->middleware('auth','throttle:6,1')->name('verification.send');
Route::get('verifikasi', [AuthController::class, 'verifikasi'])->name('verifikasi');

Route::get('selectobat', [ObatController::class, 'obat'])->name('obat.index');
Route::get('selectobat/{nm_obat}', [ObatController::class, 'nama']);

Route::get('selecpegawai', [PegawaiController::class, 'pegawai'])->name('pegawai.index');
Route::get('selectpegawai/{nama}', [PegawaiController::class, 'nama']);

Route::get('selecperawat', [PegawaiController::class, 'perawat'])->name('perawat.index');
Route::get('selectpegawai/{nama}', [PegawaiController::class, 'nama']);