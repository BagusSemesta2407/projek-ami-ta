<?php

use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\CategoryUnitController;
use App\Http\Controllers\DataInstrumentController;
use App\Http\Controllers\DocumentStandardController;
use App\Http\Controllers\DokumenStandarController;
use App\Http\Controllers\InstrumentAuditeeController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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
    Route::get('/', function () {
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

                //data-instrument
                Route::resource('data-instruments', DataInstrumentController::class);
                Route::get('getDataInstrumentId/{id}', [DataInstrumentController::class, 'getDataInstrumentId'])->name('get-data-instrument-id');

                Route::get('report-ami', [ReportController::class , 'index'])->name('report-index');

                Route::group(
                    [
                        'as' =>'report-ami.',
                        'prefix'   =>'report-ami',
                    ],

                    function()
                    {
                        Route::get('detail-report-ami/{instrumentAuditee}', [ReportController::class, 'detailReportAMI'])->name('detail-ami');
                    }
                );
            }
        );


        Route::group(
            [
                'as'    =>  'menu-auditee.',
                'middleware'    =>  ['role:auditee'],
                'prefix'        =>  'menu-auditee'
            ],

            function ()
            {
                //instrument-auditee
                Route::resource('instruments-auditee', InstrumentAuditeeController::class);

                Route::group(
                    [
                        'as' => 'instruments-auditee.',
                        'prefix' => 'instruments-auditee',
                    ],

                    function () {
                        //for instrument detail
                        Route::get('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'create'])->name('create-form-instrument-auditee');
                        Route::post('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'store'])->name('store-form-instrument-auditee');
                        Route::get('list-instrument-standard/{dataInstrument}/{status_standar?}', [InstrumentAuditeeController::class, 'create'])->name('status-standar');

                        //detail instrument auditee
                        Route::get('detail-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'detailInstrumentAuditee'])->name('detail-instrument-auditee');
                        // Route::get('create-form-instrument/{categoryUnit}', [InstrumentController::class, 'createFormInstrument'])->name('create-form-instrument');
                        // Route::post('store-form-instrument/{categoryUnit}', [InstrumentController::class, 'storeFormInstrument'])->name('store-form-instrument');
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
                Route::get('index-instrument-auditor',[InstrumentAuditeeController::class, 'indexAuditor'])->name('index-instrument-auditor');

                Route::group(
                    [
                        'as' => 'index-instrument-auditor.',
                        'prefix' => 'index-instrument-auditor',
                    ],

                    function () {
                        //for instrument detail
                        Route::get('validasi-instrument-auditor/{dataInstrument}', [InstrumentAuditeeController::class, 'createAuditor'])->name('validasi-instrument-auditor');
                        Route::get('audit-data-validasi/{instrumentAuditee}',[InstrumentAuditeeController::class, 'validateDataAuditLapangan'])->name('audit-data-validasi');
                        // Route::post('validasi-instrument-auditor/{dataInstrument}', [InstrumentAuditeeController::class, 'confirmValidateAuditor'])->name('confirm-validate-instrument-auditor');
                        Route::post('audit-data-validasi/{instrumentAuditee}',[InstrumentAuditeeController::class, 'postValidateDataAuditLapangan'])->name('post-validate-data-audit-lapangan');
                        Route::get('detail-audit-lapangan/{instrumentAuditee}', [InstrumentAuditeeController::class, 'detailValidateDataAuditLapangan'])->name('detail-audit-lapangan');

                        Route::post('validate/{dataInstrument}', [InstrumentAuditeeController::class, 'updateStatusDataInstrument'])->name('validate');
                        // Route::post('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'store'])->name('store-form-instrument-auditee');
                        // Route::get('list-instrument-standard/{dataInstrument}/{status_standar?}', [InstrumentAuditeeController::class, 'create'])->name('status-standar');

                        //detail instrument auditee
                        // Route::get('detail-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'detailInstrumentAuditee'])->name('detail-instrument-auditee');
                        // Route::get('create-form-instrument/{categoryUnit}', [InstrumentController::class, 'createFormInstrument'])->name('create-form-instrument');
                        // Route::post('store-form-instrument/{categoryUnit}', [InstrumentController::class, 'storeFormInstrument'])->name('store-form-instrument');
                    }
                );

                Route::get('index-audit-dokumen', [InstrumentAuditeeController::class, 'indexAuditDokumen'])->name('index-audit-dokumen');

                Route::group(
                    [
                        'as'=>'index-audit-dokumen.',
                        'prefix'=>'index-audit-dokumen'
                    ],

                    function(){
                        Route::get('index-data-audit-dokumen/{dataInstrument}', [InstrumentAuditeeController::class, 'indexDataAuditDokumen'])->name('get-index-data-audit-dokumen');
                        Route::get('input-hasil-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class , 'inputHasilAuditDokumen'])->name('input-hasil-audit-dokumen');
                        Route::post('input-hasil-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class , 'createHasilAuditDokumen'])->name('create-hasil-audit-dokumen');
                        Route::get('detail-data-audit-dokumen/{instrumentAuditee}', [InstrumentAuditeeController::class, 'detailHasilAuditDokumen'])->name('detail-data-audit-dokumen');
                    }
                );
            }

            
        );

        Route::group(
            [
                'as'    => 'menu-kepala-p4mp.',
                'middleware'    =>  ['role:kepala_p4mp'],
                'prefix'    =>  'menu-kepala-p4mp'
            ],

            function()
            {
                Route::get('approval-data-ami', [DataInstrumentController::class, 'indexKepalaP4mp'])->name('approval-data-ami');
                Route::group(
                    [
                        'as'    =>  'approval-data-ami.',
                        'prefix'    =>  'approval-data-ami'
                    ],
                    function()
                    {
                        Route::get('approve-data-ami/{dataInstrument}', [DataInstrumentController::class, 'ApproveKepalaP4mp'])->name('approve-data-ami');
                        Route::post('approve-data-ami/{dataInstrument}', [DataInstrumentController::class, 'updateStatusDataInstrument'])->name('update-status-data-instrument');
                    }
                );
            }
        );
    });
});

// Route::get('/', function () {
//     return view('layouts.base');
// });
