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
use App\Http\Controllers\P4MPController;
use App\Http\Controllers\P4MPLandingPageController;
use App\Http\Controllers\PpppmpController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TinjauanPengendalianController;
use App\Http\Controllers\TinjauanPeningkatanController;
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
    // Route::get('/', function () {
    //     return view('landingPage.base');
    // });
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/p4mp', [P4MPLandingPageController::class, 'index'])->name('p4mp');
    Route::get('/hasil-ami', [P4MPLandingPageController::class, 'indexHasilAmi'])->name('hasil-ami');
    Route::get('/hasil-ami/{id}', [P4MPLandingPageController::class, 'listHasilAMI'])->name('list-hasil-ami');
    Route::get('/cetak-hasil-ami/{id}', [P4MPLandingPageController::class, 'hasilAmi'])->name('cetak-hasil-ami');

    Route::get('/login', function () {
        return view('auth.login');
    });

    Auth::routes();
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::group(
            [
                'as' => 'admin.',
                'middleware'    =>  ['role:super-admin|admin'],
                'prefix' => 'admin',
            ],

            function () {
                //master-data
                Route::resource('category-unit', CategoryUnitController::class);
                Route::resource('user', UserController::class);
                Route::resource('instrument', InstrumentController::class);
                Route::resource('auditor', AuditorController::class);
                Route::resource('auditee', AuditeeController::class);
                Route::resource('document-standard', DocumentStandardController::class);
                Route::resource('dokumen-standar', DokumenStandarController::class);
                Route::resource('p4mp', PpppmpController::class);
                Route::resource('auditee', AuditeeController::class);

                //data-instrument
                Route::resource('data-instruments', DataInstrumentController::class);
                Route::get('getDataInstrumentId/{id}', [DataInstrumentController::class, 'getDataInstrumentId'])->name('get-data-instrument-id');
                Route::get('getAuditee/{user}', [DataInstrumentController::class, 'getAuditee'])->name('get-auditee');
            }
        );


        Route::group(
            [
                'as'    =>  'menu-auditee.',
                'middleware'    =>  ['role:auditee'],
                'prefix'        =>  'menu-auditee'
            ],

            function () {
                //instrument-auditee
                // Route::resource('instruments-auditee', InstrumentAuditeeController::class);

                // Route::group(
                //     [
                //         'as' => 'instruments-auditee.',
                //         'prefix' => 'instruments-auditee',
                //     ],

                //     function () {
                //         //for instrument detail
                //         Route::get('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'create'])->name('create-form-instrument-auditee');
                //         Route::post('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'store'])->name('store-form-instrument-auditee');
                //         Route::get('list-instrument-standard/{dataInstrument}/{status_standar?}', [InstrumentAuditeeController::class, 'create'])->name('status-standar');

                //         //detail instrument auditee
                //         Route::get('detail-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'detailInstrumentAuditee'])->name('detail-instrument-auditee');
                //         // Route::get('create-form-instrument/{categoryUnit}', [InstrumentController::class, 'createFormInstrument'])->name('create-form-instrument');
                //         // Route::post('store-form-instrument/{categoryUnit}', [InstrumentController::class, 'storeFormInstrument'])->name('store-form-instrument');
                //     }
                // );

                Route::resource('evaluasi-diri', EvaluasiDiriController::class);
                // Route::post('evaluasi-diri/{id}', EvaluasiDiri::class, 'postDataEvaluasiDiri')->name('post-evauasi-diri');
                Route::group(
                    [
                        'as' => 'evaluasi-diri.',
                        'prefix' => 'evaluasi-diri'
                    ],

                    function () {
                        Route::get('data-evaluasi-diri/{dataInstrument}', [EvaluasiDiriController::class, 'dataEvaluasiDiri'])->name('data-evaluasi-diri');
                        Route::get('validasi-evaluasi-diri/{dataInstrument}',[EvaluasiDiriController::class, 'validateDataEvaluasiDiri'])->name('validasi-evaluasi-diri');
                        Route::post('update-evaluasi-diri/{dataInstrument}', [EvaluasiDiriController::class, 'updateStatusDataInstrument'])->name('update-status-audit');
                        Route::get('create-evaluasi-diri/{dataInstrument}/{instrument}', [EvaluasiDiriController::class, 'createEvaluasiDiri'])->name('form-evaluasi-diri');
                        Route::post('create-evaluasi-diri/{dataInstrument}/{instrument}', [EvaluasiDiriController::class, 'postDataEvaluasiDiri'])->name('post-data-evaluasi-diri');
                        // Route::get('edit-evaluasi-diri/{dataInstrument}/', [EvaluasiDiriController::class, 'editEvaluasiDiri'])->name('edit-evaluasi-diri');
                        Route::PUT('create-evaluasi-diri/{dataInstrument}/{instrument}/{evaluasiDiri}', [EvaluasiDiriController::class, 'updateDataEvaluasiDiri'])->name('update-data-evaluasi-diri');

                        Route::get('detail-data-evaluasi-diri/{dataInsrument}', [EvaluasiDiriController::class, 'detailDataEvaluasiDiri'])->name('detail-evaluasi-diri');
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
                //instrument-auditor
                // Route::resource('instruments-auditee', InstrumentAuditeeController::class);
                // Route::get('index-instrument-auditor', [InstrumentAuditeeController::class, 'indexAuditor'])->name('index-instrument-auditor');

                // Route::group(
                //     [
                //         'as' => 'index-instrument-auditor.',
                //         'prefix' => 'index-instrument-auditor',
                //     ],

                //     function () {
                //         //for instrument detail
                //         Route::get('validasi-instrument-auditor/{instrument}', [InstrumentAuditeeController::class, 'createAuditor'])->name('validasi-instrument-auditor');
                //         Route::get('audit-data-validasi/{instrumentAuditee}', [InstrumentAuditeeController::class, 'validateDataAuditLapangan'])->name('audit-data-validasi');
                //         // Route::post('validasi-instrument-auditor/{dataInstrument}', [InstrumentAuditeeController::class, 'confirmValidateAuditor'])->name('confirm-validate-instrument-auditor');
                //         Route::post('audit-data-validasi/{instrumentAuditee}', [InstrumentAuditeeController::class, 'postValidateDataAuditLapangan'])->name('post-validate-data-audit-lapangan');
                //         Route::get('detail-audit-lapangan/{instrumentAuditee}', [InstrumentAuditeeController::class, 'detailValidateDataAuditLapangan'])->name('detail-audit-lapangan');

                //         Route::post('validate/{dataInstrument}', [InstrumentAuditeeController::class, 'updateStatusDataInstrument'])->name('validate');
                //         // Route::post('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'store'])->name('store-form-instrument-auditee');
                //         // Route::get('list-instrument-standard/{dataInstrument}/{status_standar?}', [InstrumentAuditeeController::class, 'create'])->name('status-standar');

                //         //detail instrument auditee
                //         // Route::get('detail-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'detailInstrumentAuditee'])->name('detail-instrument-auditee');
                //         // Route::get('create-form-instrument/{categoryUnit}', [InstrumentController::class, 'createFormInstrument'])->name('create-form-instrument');
                //         // Route::post('store-form-instrument/{categoryUnit}', [InstrumentController::class, 'storeFormInstrument'])->name('store-form-instrument');
                //     }
                // );

                // Route::get('index-audit-dokumen', [InstrumentAuditeeController::class, 'indexAuditDokumen'])->name('index-audit-dokumen');

                // Route::group(
                //     [
                //         'as' => 'index-audit-dokumen.',
                //         'prefix' => 'index-audit-dokumen'
                //     ],

                //     function () {
                //         Route::get('index-data-audit-dokumen/{dataInstrument}', [InstrumentAuditeeController::class, 'indexDataAuditDokumen'])->name('get-index-data-audit-dokumen');
                //         Route::get('input-hasil-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class, 'inputHasilAuditDokumen'])->name('input-hasil-audit-dokumen');
                //         Route::post('input-hasil-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class, 'createHasilAuditDokumen'])->name('create-hasil-audit-dokumen');
                //         Route::get('detail-data-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class, 'detailHasilAuditDokumen'])->name('detail-data-audit-dokumen');
                //     }
                // );

                Route::resource('audit-dokumen', AuditDokumenController::class);
                Route::group(
                    [
                        'as'=>'audit-dokumen.',
                        'prefix'=>'audit-dokumen'
                    ],

                    function()
                    {
                        Route::get('data-audit-dokumen/{dataInstrument}', [AuditDokumenController::class, 'dataAuditDokumen'])->name('data-audit-dokumen');
                        Route::get('input-audit-dokumen/{evaluasiDiri}', [AuditDokumenController::class, 'createDataAuditDokumen'])->name('input-audit-dokumen');
                        Route::post('input-audit-dokumen/{evaluasiDiri}', [AuditDokumenController::class, 'postDataAuditDokumen'])->name('post-audit-dokumen');
                        Route::put('input-audit-dokumen/{evaluasiDiri}/{auditDokumen}', [AuditDokumenController::class, 'postUpdateDataAuditDokumen'])->name('post-update-audit-dokumen');
                        Route::get('detail-audit-dokumen/{dataInstrument}', [AuditDokumenController::class, 'detailDataAuditDokumen'])->name('detail-audit-dokumen');
                        Route::get('validasi-audit-dokumen/{dataInstrument}',[AuditDokumenController::class, 'validateDataAuditDokumen'])->name('validasi-audit-dokumen');
                        Route::post('update-status-audit/{dataInstrument}', [AuditDokumenController::class, 'updateStatusDataInstrument'])->name('update-status-audit');

                    }
                );

                Route::resource('audit-lapangan', AuditLapanganController::class);
                Route::group(
                    [
                    'as' => 'audit-lapangan.',
                    'prefix'=>'audit-lapangan'
                    ],
                    function()
                    {
                        Route::get('data-audit-lapangan/{dataInstrument}', [AuditLapanganController::class, 'dataAuditLapangan'])->name('data-audit-lapangan');
                        Route::get('create-audit-lapangan/{auditDokumen}', [AuditLapanganController::class, 'createDataAuditLapangan'])->name('create-audit-lapangan');
                        Route::post('create-audit-lapangan/{auditDokumen}/{instrument}', [AuditLapanganController::class, 'postDataAuditLapangan'])->name('post-audit-lapangan');
                        Route::put('create-audit-lapangan/{auditDokumen}/{instrument}/{auditLapangan}', [AuditLapanganController::class, 'postUpdateDataAuditLapangan'])->name('post-update-audit-lapangan');
                        Route::get('detail-audit-lapangan/{auditdokumen}',[AuditLapanganController::class, 'detailAuditLapangan'])->name('detail-audit-lapangan');
                        Route::get('validasi-audit-lapangan/{auditdokumen}',[AuditLapanganController::class, 'validateDataAuditLapangan'])->name('validasi-audit-lapangan');
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

                Route::group(
                    [
                        'as' => 'report-ami.',
                        'prefix'   => 'report-ami',
                    ],

                    function () {
                        Route::get('detail-report-ami/{dataInstrument}', [ReportController::class, 'detailReportAMI'])->name('detail-ami');
                        Route::get('cetak-ami/{dataInstrument}', [ReportController::class, 'cetakHasilAmi'])->name('cetak-ami');
                    }
                );


                //tinjauan pengendalian

                Route::get('tinjauan-pengendalian', [TinjauanPengendalianController::class, 'index'])->name('index-tinjauan-pengendalian');
                Route::group(
                    [
                        'as'    => 'tinjauan-pengendalian.',
                        'prefix'    => 'tinjauan-pengendalian'
                    ],

                    function()
                    {
                        Route::get('data-tinjauan-pengendalian/{dataInstrument}', [TinjauanPengendalianController::class, 'dataTinjauanPengendalian'])->name('data-tinjauan-pengendalian');
                        Route::get('create-tinjauan-pengendalian/{auditLapangan}', [TinjauanPengendalianController::class, 'createTinjauanPengendalian'])->name('create-tinjauan-pengendalian');
                        Route::post('create-tinjauan-pengendalian/{auditLapangan}', [TinjauanPengendalianController::class, 'storeTinjauanPengendalian'])->name('post-tinjauan-pengendalian');
                        Route::put('create-tinjauan-pengendalian/{auditLapangan}/{tinjauanPengendalian}', [TinjauanPengendalianController::class, 'updateTinjauanPengendalian'])->name('update-tinjauan-pengendalian');
                    }
                );

                //tinjauan peningkatan
                Route::get('tinjauan-peningkatan', [TinjauanPeningkatanController::class, 'index'])->name('index-tinjauan-peningkatan');
                Route::group(
                    [
                        'as'=>'tinjauan-peningkatan.',
                        'prefix'=>'tinjauan-peningkatan'
                    ],

                    function()
                    {
                        Route::get('data-tinjauan-peningkatan/{dataInstrument}', [TinjauanPeningkatanController::class, 'dataTinjauanPeningkatan'])->name('data-tinjauan-peningkatan');
                        Route::get('create-tinjauan-peningkatan/{tinjauanPengendalian}', [TinjauanPeningkatanController::class, 'createTinjauanPeningkatan'])->name('create-tinjauan-peningkatan');
                        Route::post('create-tinjauan-peningkatan/{tinjauanPengendalian}', [TinjauanPeningkatanController::class, 'storeTinjauanPengendalian'])->name('post-tinjauan-peningkatan');
                        Route::put('create-tinjauan-peningkatan/{tinjauanPengendalian}/{tinjauanPeningkatan}', [TinjauanPeningkatanController::class, 'updateTinjauanPengendalian'])->name('update-tinjauan-peningkatan');
                    }
                );
            }
        );
    });
});

// Route::get('/', function () {
//     return view('layouts.base');
// });
