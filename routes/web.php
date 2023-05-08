<?php

use App\Http\Controllers\CategoryUnitController;
use App\Http\Controllers\InstrumentController;
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


Route::group(['middleware' => 'prevent-back-history'],function()
{
    Route::get('/', function()
    {
        return view('auth.login');
    });
    
    Auth::routes();
    Route::middleware('role:superadmin')->get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::middleware('auth')->group(function()
    {
        Route::group(
            [
                'as'    =>  'admin.',
                'prefix'=>  'admin'
            ],

            function() {
                Route::resource('category-unit', CategoryUnitController::class);
                Route::resource('instrument', InstrumentController::class);
            }
        );
    });
});

// Route::get('/', function () {
//     return view('layouts.base');
// });


