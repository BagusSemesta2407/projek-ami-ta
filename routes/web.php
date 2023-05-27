<?php

use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\CategoryUnitController;
use App\Http\Controllers\DataInstrumentController;
use App\Http\Controllers\InstrumentAuditeeController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\UserController;
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
    Route::middleware('role:admin')->get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::group(
            [
                'as' => 'admin.',
                'prefix' => 'admin',
            ],

            function () {
                //master-data
                Route::resource('category-unit', CategoryUnitController::class);
                Route::resource('user', UserController::class);
                Route::resource('instrument', InstrumentController::class);
                Route::resource('auditor', AuditorController::class);
                Route::resource('auditee', AuditeeController::class);

                //data-instrument
                Route::resource('data-instruments', DataInstrumentController::class);
                Route::get('getDataInstrumentId/{id}', [DataInstrumentController::class, 'getDataInstrumentId'])->name('get-data-instrument-id');

                //instrument-auditee
                Route::resource('instruments-auditee', InstrumentAuditeeController::class);
                Route::group(
                    [
                        'as' => 'instrument-auditee.',
                        'prefix' => 'instrument-auditee',
                    ],

                    function () {
                        //for instrument detail
                        Route::get('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'create'])->name('create-form-instrument-auditee');
                        Route::post('form-instrument-auditee/{dataInstrument}', [InstrumentAuditeeController::class, 'store'])->name('store-form-instrument-auditee');

                        Route::get('list-instrument-standard/{dataInstrument}/{status_standar?}', [InstrumentAuditeeController::class, 'create'])->name('status-standar');
                        // Route::get('create-form-instrument/{categoryUnit}', [InstrumentController::class, 'createFormInstrument'])->name('create-form-instrument');
                        // Route::post('store-form-instrument/{categoryUnit}', [InstrumentController::class, 'storeFormInstrument'])->name('store-form-instrument');
                    }
                );
            }
        );
    });
});

// Route::get('/', function () {
//     return view('layouts.base');
// });
