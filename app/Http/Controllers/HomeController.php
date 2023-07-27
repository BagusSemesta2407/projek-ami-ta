<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\RisalahRapat;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $DataInstrument;
    public function __construct()
    {
        $this->middleware('auth');
        $this->DataInstrument = new DataInstrument();
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

        $risalahRapat=RisalahRapat::count();

        // $userId=Auth::id();
        // $userLogin=User::whereHas('roles', function($q){
        //     $q->where('name', )
        // })
        $data = $this->DataInstrument->getDataPerBulan();

        $listDataInstrument=DataInstrument::orderByRaw("FIELD(status, 'Menunggu Konfirmasi Kepala P4MP','Ditolak Kepala P4MP', 'On Progress', 'Sudah Di Jawab Auditee', 'Audit Lapangan', 'Selesai') ASC")->get();
        return view('admin.dashboard.index', [
            'title' => $title,
            'user'=>$user,
            'categoryUnit'=> $categoryUnit,
            'userAuditor'=>$userAuditor,
            'dataInstrument'=>$dataInstrument,
            'data'          =>$data,
            'listDataInstrument'=>$listDataInstrument,
            'risalahRapat' => $risalahRapat
        ]);
    }
}
