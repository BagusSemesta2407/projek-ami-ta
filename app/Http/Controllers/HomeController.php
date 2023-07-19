<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $user=User::count();
        $categoryUnit=CategoryUnit::count();
        $userAuditor=User::whereHas('roles', function($q){
            $q->whereIn('name', ['Auditor']);
        })->count();

        $dataInstrument=DataInstrument::where('status', 'Selesai')->count();

        // $userId=Auth::id();
        // $userLogin=User::whereHas('roles', function($q){
        //     $q->where('name', )
        // })
        return view('admin.dashboard.index', [
            'title' => $title,
            'user'=>$user,
            'categoryUnit'=> $categoryUnit,
            'userAuditor'=>$userAuditor,
            'dataInstrument'=>$dataInstrument
        ]);
    }
}
