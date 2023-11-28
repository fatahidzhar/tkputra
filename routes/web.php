<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AspekKDController;
use App\Http\Controllers\Auth\StepRegisterController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelRekapController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformasiWaliController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PDFRekapController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\RegisterGuruController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/yayasan', function () {
    return view('yayasan.home');
})->name('yayasan.home')->middleware(['checkRole:yayasan']);

Route::get('/operator', function () {
    return view('operator.home');
})->name('operator.home')->middleware(['checkRole:operator']);

Route::get('/kepsek', function () {
    return view('kepsek.home');
})->name('kepsek.home')->middleware(['checkRole:kepsek,yayasan']);
Route::get('/guru', [HomeController::class, 'guru_dashboard'])->name('guru.home')->middleware(['checkRole:guru,admin']);
Route::get('/wali', [App\Http\Controllers\WaliController::class, 'home'])->name('wali.home')->middleware(['checkRole:wali,admin']);
Route::get('/datakepsek', function () {
    return view('components.DataKepsek');
})->name('components.DataKepsek')->middleware(['checkRole:kepsek,yayasan']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'kepsek'])->name('admin.home')->middleware('checkRole:admin');
Route::get('/akademik', [AkademikController::class, 'index'])->middleware(['checkRole:wali']);

Route::get('/akademik/nilai', [AkademikController::class, 'tahun_ajaran_nilai'])->middleware(['checkRole:wali']);
Route::get('/akademik/nilai/{tahun_ajar}', [AkademikController::class, 'tahun_nilai']);
Route::get('/akademik/nilai/{tahun_ajar}/{uu_mapel}', [AkademikController::class, 'uu_mapel']);

Route::get('/akademik/absen', [AkademikController::class, 'tahun_ajaran_absen'])->middleware(['checkRole:wali']);
Route::get('/akademik/absen/{tahun_ajar}', [AkademikController::class, 'tahun_absen'])->middleware(['checkRole:wali']);

Route::get('/akademik/guru', [AkademikController::class, 'guru'])->middleware(['checkRole:wali']);

Route::get('/akademik/e-raport', [AkademikController::class, 'e_raport'])->middleware(['checkRole:wali']);
Route::get('/akademik/e-raport/{tahun_ajar}', [AkademikController::class, 'e_raport_tahun'])->middleware(['checkRole:wali']);

Route::get('/layanan', [LayananController::class, 'index'])->middleware(['checkRole:wali']);
Route::get('/layanan/kritiksaran', [KritikSaranController::class, 'create'])->middleware(['checkRole:wali']);
Route::get('/layanan/pengaduan', [PengaduanController::class, 'create'])->middleware(['checkRole:wali']);
Route::get('/layanan/informasi', [InformasiWaliController::class, 'index'])->middleware(['checkRole:wali']);
Route::get('/layanan/informasi/{id}', [InformasiWaliController::class, 'show'])->middleware(['checkRole:wali']);
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['checkRole:wali']);

Route::get('/TimelineRegister/{uuid_m}', [StepRegisterController::class, 'Timeline'])->name('auth.stepRegister.Timeline');
Route::get('/register/step1', [StepRegisterController::class, 'Step1'])->name('auth.stepRegister.Step1');
Route::get('/register/step2/{uuid_m}', [StepRegisterController::class, 'Step2'])->name('auth.stepRegister.Step2');
Route::get('/register/step3/{uuid_m}', [StepRegisterController::class, 'Step3'])->name('auth.stepRegister.Step3');
Route::get('/register/step4/{uuid_m}', [StepRegisterController::class, 'Step4'])->name('auth.stepRegister.Step4');
Route::get('/register/complete/{uuid_m}', [StepRegisterController::class, 'StepComplete'])->name('auth.stepRegister.StepComplete');
Route::get('/register/cekdata/{nik}', [StepRegisterController::class, 'CekDataShow']);
Route::get('/register/cekdata', [StepRegisterController::class, 'CekData'])->name('auth.stepRegister.CekData');

Route::get('/nilai', [NilaiController::class, 'index'])->name('components.date')->middleware(['checkRole:guru,kepsek,admin']);
Route::get('/nilai/{uu_class}', [NilaiController::class, 'show'])->middleware(['checkRole:guru']);
Route::get('/nilai/{uu_class}/{uu_mapel}', [NilaiController::class, 'create'])->name('nilai.date')->middleware(['checkRole:guru,kepsek,admin']);

Route::get('/absen/{uu_class}', [AbsenController::class, 'create'])->name('absen.date')->middleware(['checkRole:guru']);

Route::get('/kritiksaran', [KritikSaranController::class, 'index'])->middleware(['checkRole:kepsek,admin']);
Route::get('/kritiksaran/{id}', [KritikSaranController::class, 'show'])->middleware(['checkRole:kepsek,admin']);

Route::get('/pengaduan', [PengaduanController::class, 'index'])->middleware(['checkRole:kepsek,admin']);
Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->middleware(['checkRole:kepsek,admin']);

Route::get('/datamurid/datapendaftar', [PendaftarController::class, 'index'])->middleware(['checkRole:kepsek,admin']);

Route::get('/wilayah', [WilayahController::class, 'index']);
Route::get('/wilayah/{provinceId}/{regencyId}/{districtId}/', [WilayahController::class, 'index']);
Route::get('/wilayah/regencies/{provinceId}', [WilayahController::class, 'regencies']);
Route::get('/wilayah/districts/{regencyId}', [WilayahController::class, 'districts']);
Route::get('/wilayah/villages/{districtId}', [WilayahController::class, 'villages']);

Route::get('/rekap/exportPDFAbsen', [PDFRekapController::class, 'exportPDFAbsen'])->name('rekap.exportPDFAbsen')->middleware(['checkRole:guru']);
Route::get('/rekap/exportPDF', [PDFRekapController::class, 'exportPDFRekap'])->name('rekap.exportPDFRekap')->middleware(['checkRole:guru']);

Route::get('/datamurid/datapendaftaran/exportExcel', [ExcelRekapController::class, 'exportExcelRekap'])->middleware(['checkRole:kepsek,admin']);
Route::get('/datamurid', [MuridController::class, 'index'])
    ->middleware('checkRole:guru,operator,kepsek,yayasan');

Route::get('/datamurid/{uuid}', [MuridController::class, 'show'])
    ->middleware('checkRole:guru,operator');

Route::get('/datamurid/{uuid}/edit', [MuridController::class, 'edit'])->name('datamurid.update')
    ->middleware('checkRole:operator');

Route::post('/datamurid/{uuid}', [MuridController::class, 'update'])
    ->middleware('checkRole:operator');

Route::get('/murid/create', [MuridController::class, 'create'])->name('murid.store')
    ->middleware('checkRole:operator');

Route::post('/murid/create', [MuridController::class, 'store'])
    ->middleware('checkRole:operator');

Route::get('/bottom-navigation', function () {
    return view('layouts.bottomNavigation');
});

Route::get('/raport', [RaportController::class, 'index'])->middleware('checkRole:guru');
Route::get('/raport/{tahun_ajar}', [RaportController::class, 'tahun_ajar'])->middleware('checkRole:guru');
Route::post('/raport', [RaportController::class, 'store'])->name('raport.store')->middleware('checkRole:guru');

Route::post('/register/step1', [StepRegisterController::class, 'Step1Store'])->name('stepRegister.Step1');
Route::post('/register/step2', [StepRegisterController::class, 'Step2Store'])->name('stepRegister.Step2');
Route::post('/register/step3', [StepRegisterController::class, 'Step3Store'])->name('stepRegister.Step3');
Route::post('/register/step4', [StepRegisterController::class, 'Step4Store'])->name('stepRegister.Step4');
Route::post('/layanan/kritiksaran', [KritikSaranController::class, 'store'])->name('kritiksaran.store')->middleware(['checkRole:wali']);
Route::post('/layanan/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store')->middleware(['checkRole:wali']);

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware(['checkRole:wali']);
Route::put('/datamurid', [MuridController::class, 'update'])->name('datamurid.update')->middleware(['checkRole:kepsek']);

Route::post('/kritiksaran', [KritikSaranController::class, 'update'])->name('faq.update')->middleware(['checkRole:kepsek']);
Route::put('/kritiksaran/{id}', [KritikSaranController::class, 'update'])->name('faq.update')->middleware(['checkRole:kepsek']);

Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update')->middleware(['checkRole:kepsek']);

Route::resource('/registerguru', RegisterGuruController::class);
Route::resource('/dataguru', GuruController::class)->middleware(['checkRole:kepsek,yayasan']);
Route::resource('/kelas', KelasController::class)->middleware(['checkRole:guru,kepsek,yayasan']);
Route::resource('/informasi', InformasiController::class)->middleware(['checkRole:kepsek,guru']);
Route::resource('/categori', CategoriController::class)->middleware(['checkRole:kepsek']);
Route::resource('/nilai', NilaiController::class)->middleware(['checkRole:guru']);
Route::resource('/absen', AbsenController::class)->middleware(['checkRole:guru']);
Route::resource('/rekap', RekapController::class)->middleware(['checkRole:guru,kepsek']);
Route::resource('/mapel', MapelController::class)->middleware(['checkRole:kepsek']);
Route::resource('/aspek', AspekKDController::class)->middleware(['checkRole:kepsek']);
Route::resource('/datakepsek', KepsekController::class)->middleware(['checkRole:yayasan']);
Route::resource('/dataoperator', OperatorController::class)->middleware(['checkRole:yayasan']);

Route::delete('/layanan/kritiksaran/{id}', [KritikSaranController::class, 'destroy'])->name('kritiksaran.destroy')->middleware(['checkRole:wali']);
Route::delete('/layanan/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy')->middleware(['checkRole:wali']);

Route::any('layanan/kritiksaran/{any}', function () {
    abort(404);
})->where('any', '.*');

Route::any('layanan/pengaduan/{any}', function () {
    abort(404);
})->where('any', '.*');
