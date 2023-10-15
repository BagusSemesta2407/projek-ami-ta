<?php

use App\Http\Controllers\AuditDokumenController;
use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\AuditLapanganController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CategoryUnitController;
use App\Http\Controllers\DataInstrumentController;
use App\Http\Controllers\DocumentStandardController;
use App\Http\Controllers\DokumenStandarController;
use App\Http\Controllers\EvaluasiDiriController;
use App\Http\Controllers\InstrumentAuditeeController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\P4MPController;
use App\Http\Controllers\P4MPLandingPageController;
use App\Http\Controllers\PpppmpController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RapatTinjauanManajemenController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TinjauanPengendalianController;
use App\Http\Controllers\TinjauanPeningkatanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\EvaluasiDiri;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/p4mp', [P4MPLandingPageController::class, 'index'])->name('p4mp');
    Route::get('/hasil-ami', [P4MPLandingPageController::class, 'indexHasilAmi'])->name('hasil-ami');
    Route::get('/hasil-ami/{id}', [P4MPLandingPageController::class, 'listHasilAMI'])->name('list-hasil-ami');
    Route::get('/cetak-hasil-ami/{id}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-hasil-ami');

    Route::get('/login', function () {
        return view('auth.login');
    });

    Auth::routes();
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::group(
            [
                'as' => 'admin.',
                'middleware'    =>  ['role:super-admin|admin'],
                'prefix' => 'admin',
            ],

            function () {
                //master-data
                Route::resource('user', UserController::class);
                Route::group(
                    [
                        'as' => 'user.',
                        'prefix' => 'user'
                    ],

                    function(){
                        Route::get('status-user/{id}', [UserController::class, 'active'])->name('status-user');
                    }
                );
                Route::resource('category-unit', CategoryUnitController::class);
                Route::resource('instrument', InstrumentController::class);
                Route::resource('auditor', AuditorController::class);
                Route::resource('dokumen-standar', DokumenStandarController::class);
                Route::resource('jurusan', JurusanController::class);
                Route::resource('unit', UnitController::class);

                Route::resource('jenjang', JenjangController::class);

                Route::resource('program-studi', ProgramStudiController::class);
                //get jurusan
                Route::get('getJurusan/{jurusanId?}', [AuditorController::class, 'getJurusan'])->name('get-jurusan');
                
                //data-instrument
                Route::resource('data-instruments', DataInstrumentController::class);
                Route::get('getJurusan/{jurusanId?}', [DataInstrumentController::class, 'getJurusan'])->name('get-jurusan');
                Route::get('getDataInstrumentId/{id}', [DataInstrumentController::class, 'getDataInstrumentId'])->name('get-data-instrument-id');
                Route::get('getAuditee/{user}', [DataInstrumentController::class, 'getAuditee'])->name('get-auditee');
                Route::get('getAuditor', [DataInstrumentController::class, 'getAuditor'])->name('get-auditor');
                Route::get('countAuditor/{auditorId}', [DataInstrumentController::class, 'countAuditor'])->name('count-auditor');
            }
        );


        Route::group(
            [
                'as'    =>  'menu-auditee.',
                'middleware'    =>  ['role:auditee'],
                'prefix'        =>  'menu-auditee'
            ],

            function () {

                Route::resource('evaluasi-diri', EvaluasiDiriController::class);
                Route::group(
                    [
                        'as' => 'evaluasi-diri.',
                        'prefix' => 'evaluasi-diri'
                    ],

                    function () {
                        Route::get('data-evaluasi-diri/{dataInstrument}', [EvaluasiDiriController::class, 'dataEvaluasiDiri'])->name('data-evaluasi-diri');
                        Route::get('validasi-evaluasi-diri/{dataInstrument}', [EvaluasiDiriController::class, 'validateDataEvaluasiDiri'])->name('validasi-evaluasi-diri');
                        Route::post('update-evaluasi-diri/{dataInstrument}', [EvaluasiDiriController::class, 'updateStatusDataInstrument'])->name('update-status-audit');
                        Route::get('create-evaluasi-diri/{dataInstrument}/{instrument}', [EvaluasiDiriController::class, 'createEvaluasiDiri'])->name('form-evaluasi-diri');
                        Route::post('create-evaluasi-diri/{dataInstrument}/{instrument}', [EvaluasiDiriController::class, 'postDataEvaluasiDiri'])->name('post-data-evaluasi-diri');
                        Route::PUT('create-evaluasi-diri/{dataInstrument}/{instrument}/{evaluasiDiri}', [EvaluasiDiriController::class, 'updateDataEvaluasiDiri'])->name('update-data-evaluasi-diri');

                        Route::get('detail-data-evaluasi-diri/{dataInsrument}', [EvaluasiDiriController::class, 'detailDataEvaluasiDiri'])->name('detail-evaluasi-diri');
                    }
                );
                Route::get('report-ami', [ReportController::class, 'index'])->name('report-ami');

                Route::get('cetak-ami/{dataInstrument}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-ami');
                Route::group(
                    [
                        'as' => 'report-ami.',
                        'prefix'   => 'report-ami',
                    ],

                    function () {
                        Route::get('cetak-ami/{dataInstrument}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-ami2');

                        Route::get('detail-report-ami/{dataInstrument}', [ReportController::class, 'detailReportAMI'])->name('detail-ami');
                    }
                );
            }
        );

        Route::group(
            [
                'as'    =>  'menu-auditor.',
                'middleware'    =>  ['role:auditor'],
                'prefix'    =>  'menu-auditor'
            ],
            function () {

                Route::resource('audit-dokumen', AuditDokumenController::class);
                Route::group(
                    [
                        'as' => 'audit-dokumen.',
                        'prefix' => 'audit-dokumen'
                    ],

                    function () {
                        Route::get('data-audit-dokumen/{dataInstrument}', [AuditDokumenController::class, 'dataAuditDokumen'])->name('data-audit-dokumen');
                        Route::post('input-audit-dokumen/{evaluasiDiri}', [AuditDokumenController::class, 'postDataAuditDokumen'])->name('post-audit-dokumen');
                        Route::get('input-audit-dokumen/{evaluasiDiri}', [AuditDokumenController::class, 'createDataAuditDokumen'])->name('input-audit-dokumen');
                        Route::put('input-audit-dokumen/{evaluasiDiri}/{auditDokumen}', [AuditDokumenController::class, 'postUpdateDataAuditDokumen'])->name('post-update-audit-dokumen');
                        Route::get('detail-audit-dokumen/{dataInstrument}', [AuditDokumenController::class, 'detailDataAuditDokumen'])->name('detail-audit-dokumen');
                        Route::get('validasi-audit-dokumen/{dataInstrument}', [AuditDokumenController::class, 'validateDataAuditDokumen'])->name('validasi-audit-dokumen');
                        Route::post('update-status-audit/{dataInstrument}', [AuditDokumenController::class, 'updateStatusDataInstrument'])->name('update-status-audit');
                    }
                );

                Route::resource('audit-lapangan', AuditLapanganController::class);
                Route::group(
                    [
                        'as' => 'audit-lapangan.',
                        'prefix' => 'audit-lapangan'
                    ],
                    function () {
                        Route::get('data-audit-lapangan/{dataInstrument}', [AuditLapanganController::class, 'dataAuditLapangan'])->name('data-audit-lapangan');
                        Route::post('create-audit-lapangan/{auditDokumen}/{instrument}', [AuditLapanganController::class, 'postDataAuditLapangan'])->name('post-audit-lapangan');
                        Route::get('create-audit-lapangan/{auditDokumen}', [AuditLapanganController::class, 'createDataAuditLapangan'])->name('create-audit-lapangan');
                        Route::put('create-audit-lapangan/{auditDokumen}/{instrument}/{auditLapangan}', [AuditLapanganController::class, 'postUpdateDataAuditLapangan'])->name('post-update-audit-lapangan');
                        Route::get('detail-audit-lapangan/{auditdokumen}', [AuditLapanganController::class, 'detailAuditLapangan'])->name('detail-audit-lapangan');
                        Route::get('validasi-audit-lapangan/{auditdokumen}', [AuditLapanganController::class, 'validateDataAuditLapangan'])->name('validasi-audit-lapangan');
                        Route::post('update-status-audit/{dataInstrument}', [AuditLapanganController::class, 'updateStatusDataInstrument'])->name('update-status-audit');
                    }
                );
            }


        );

        Route::group(
            [
                'as'    => 'menu-p4mp.',
                'middleware'    =>  ['role:P4MP'],
                'prefix'    =>  'menu-p4mp'
            ],

            function () {
                Route::get('approval-data-ami', [DataInstrumentController::class, 'indexKepalaP4mp'])->name('approval-data-ami');
                Route::group(
                    [
                        'as'    =>  'approval-data-ami.',
                        'prefix'    =>  'approval-data-ami'
                    ],
                    function () {
                        Route::get('approve-data-ami/{dataInstrument}', [DataInstrumentController::class, 'ApproveKepalaP4mp'])->name('approve-data-ami');
                        Route::post('approve-data-ami/{dataInstrument}', [DataInstrumentController::class, 'updateStatusDataInstrument'])->name('update-status-data-instrument');
                    }
                );

                Route::get('rapat-tinjauan', [InstrumentAuditeeController::class, 'rapatTinjauan'])->name('rapat-tinjauan');
                Route::group(
                    [
                        'as' => 'rapat-tinjauan.',
                        'prefix' => 'rapat-tinjauan'
                    ],
                    function () {
                        Route::get('data-pengendalian/{dataInstrument}', [InstrumentAuditeeController::class, 'formRapatTinjauanPengendalian'])->name('data-pengendalian');
                        Route::get('create-pengendalian/{instrumentAuditee}', [InstrumentAuditeeController::class, 'createPengendalian'])->name('create-pengendalian');
                        Route::post('create-pengendalian/{instrumentAuditee}', [InstrumentAuditeeController::class, 'storePengendalian'])->name('store-pengendalian');
                    }
                );

                Route::get('peningkatan', [InstrumentAuditeeController::class, 'indexPeningkatan'])->name('index-peningkatan');
                Route::group(
                    [
                        'as' => 'peningkatan.',
                        'prefix' => 'peningkatan'
                    ],

                    function () {
                        Route::get('create-peningkatan/{instrumentAuditee}', [InstrumentAuditeeController::class, 'createPeningkatan'])->name('create-peningkatan');
                        Route::post('create-peningkatan/{instrumentAuditee}', [InstrumentAuditeeController::class, 'storePeningkatan'])->name('store-peningkatan');
                    }
                );

                Route::get('report-pengendalian', [ReportController::class, 'indexPengendalian'])->name('index-pengendalian');
                Route::group(
                    [
                        'as' => 'report-pengendalian.',
                        'prefix' => 'report-pengendalian'
                    ],
                    function () {
                        Route::get('detail-pengendalian/{dataInstrument}', [ReportController::class, 'detailReportPengendalian'])->name('detail-pengendalian');
                        Route::get('cetak/{dataInstrument}', [ReportController::class, 'cetakDetailReportPengendalian'])->name('cetak');
                    }
                );

                Route::get('report-peningkatan', [ReportController::class, 'indexPeningkatanRTM'])->name('index-peningkatan-rtm');

                Route::get('report-ami', [ReportController::class, 'index'])->name('report-ami');

                Route::get('cetak-ami/{dataInstrument}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-ami');
                Route::group(
                    [
                        'as' => 'report-ami.',
                        'prefix'   => 'report-ami',
                    ],

                    function () {
                        Route::get('cetak-ami/{dataInstrument}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-ami2');

                        Route::get('detail-report-ami/{dataInstrument}', [ReportController::class, 'detailReportAMI'])->name('detail-ami');
                    }
                );


                //tinjauan pengendalian

                Route::get('tinjauan-pengendalian', [TinjauanPengendalianController::class, 'index'])->name('index-tinjauan-pengendalian');
                Route::group(
                    [
                        'as'    => 'tinjauan-pengendalian.',
                        'prefix'    => 'tinjauan-pengendalian'
                    ],

                    function () {
                        Route::get('data-tinjauan-pengendalian/{dataInstrument}', [TinjauanPengendalianController::class, 'dataTinjauanPengendalian'])->name('data-tinjauan-pengendalian');
                        Route::get('create-kesimpulan/{dataInstrument}', [TinjauanPengendalianController::class, 'createKesimpulan'])->name('create-kesimpulan');
                        Route::post('create-kesimpulan/{dataInstrument}', [TinjauanPengendalianController::class, 'storeKesimpulan'])->name('store-kesimpulan');
                        Route::get('create-tinjauan-pengendalian/{auditLapangan}', [TinjauanPengendalianController::class, 'createTinjauanPengendalian'])->name('create-tinjauan-pengendalian');
                        Route::post('create-tinjauan-pengendalian/{auditLapangan}', [TinjauanPengendalianController::class, 'storeTinjauanPengendalian'])->name('post-tinjauan-pengendalian');
                        Route::put('create-tinjauan-pengendalian/{auditLapangan}/{tinjauanPengendalian}', [TinjauanPengendalianController::class, 'updateTinjauanPengendalian'])->name('update-tinjauan-pengendalian');
                    }
                );

                //tinjauan peningkatan
                Route::get('tinjauan-peningkatan', [TinjauanPeningkatanController::class, 'index'])->name('index-tinjauan-peningkatan');
                Route::group(
                    [
                        'as' => 'tinjauan-peningkatan.',
                        'prefix' => 'tinjauan-peningkatan'
                    ],

                    function () {
                        Route::get('data-tinjauan-peningkatan/{dataInstrument}', [TinjauanPeningkatanController::class, 'dataTinjauanPeningkatan'])->name('data-tinjauan-peningkatan');
                        Route::get('create-tinjauan-peningkatan/{tinjauanPengendalian}', [TinjauanPeningkatanController::class, 'createTinjauanPeningkatan'])->name('create-tinjauan-peningkatan');
                        Route::post('create-tinjauan-peningkatan/{tinjauanPengendalian}', [TinjauanPeningkatanController::class, 'storeTinjauanPengendalian'])->name('post-tinjauan-peningkatan');
                        Route::put('create-tinjauan-peningkatan/{tinjauanPengendalian}/{tinjauanPeningkatan}', [TinjauanPeningkatanController::class, 'updateTinjauanPengendalian'])->name('update-tinjauan-peningkatan');
                    }
                );

                //rapat tinjauan manajemen

                Route::resource('rapat-tinjauan-manajemen', RapatTinjauanManajemenController::class);
                Route::get('cetak-rtm/{risalahRapat}', [RapatTinjauanManajemenController::class, 'cetakRtm'])->name('cetak-rtm');
                Route::group(
                    [
                        'as' => 'rapat-tinjauan-manajemen.',
                        'prefix'=> 'rapat-tinjauan-manajemen'
                    ],

                    function ()
                    {
                        Route::get('risalah/{risalahRapat}', [RapatTinjauanManajemenController::class , 'inputTopic'])->name('risalah');
                        Route::post('risalah/{risalahRapat}', [RapatTinjauanManajemenController::class , 'storeTopic'])->name('post-risalah');
                        Route::PUT('risalah/{dataInstrument}', [RapatTinjauanManajemenController::class , 'updateTopic'])->name('update-risalah');
                    }
                );
            }
        );
    });
});