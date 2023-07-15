<?php

namespace App\Http\Controllers;

use App\Models\DataInstrument;
use App\Models\EvaluasiDiri;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluasiDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Evaluasi Diri';
        $userId=Auth::id();
        $dataInstrument=DataInstrument::with(['categoryUnit'])
        ->where('auditee_id', $userId)
        ->latest()
        ->get();
       
        return view('evaluasiDiri.index',[
            'title'=>$title,
            'dataInstrument'=>$dataInstrument,
        ]);
    }

    public function dataEvaluasiDiri($id)
    {
        $title='Evaluasi Diri';
        $dataInstrument=DataInstrument::find($id);
        $filter=(object)[
            'category_unit_id'=>$dataInstrument->category_unit_id
        ];

        $instrument=Instrument::filter($filter)->get();

        return view('evaluasiDiri.dataEvaluasiDiri.index',[
            'title'=>$title,
            'dataInstrument'=>$dataInstrument,
            'instrument' => $instrument
        ]);
    }

    public function postDataEvaluasiDiri(Request $request, $id)
    {
        foreach ($request->data as $key => $value)
        {
            EvaluasiDiri::create([
                'data_instrument_id' => $id,
                'instrument_id'=> $key,
                'status_ketercapaian'    => $value['status_ketercapaian'],
                'deskripsi_ketercapaian'    => $value['deskripsi_ketercapaian'],
                'bukti'=>$value['bukti'],
                'catatan'=>$value['catatan']
            ]);

        }

        DataInstrument::where('id', $id)->update([
            'status'    =>  'Sudah Di Jawab Auditee'
        ]);

        return redirect()->route('menu-auditee.evaluasi-diri.index');
        
    }

    public function detailDataEvaluasiDiri($id)
    {
        $title = 'Rekap Instrument';

        $dataInstrument = DataInstrument::find($id);

        $evaluasiDiri = EvaluasiDiri::where('data_instrument_id', $id)
        ->whereHas('dataInstrument', function ($q) {
            $q->whereIn('status', ['Sudah Di Jawab Auditee']);
        })
            ->get();

        return view('auditee.instrumentAuditee.detailInstrumentAuditee',[
            'title' =>  $title,
            'evaluasiDiri' => $evaluasiDiri,
            'dataInstrument' => $dataInstrument
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(EvaluasiDiri $evaluasiDiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EvaluasiDiri $evaluasiDiri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EvaluasiDiri $evaluasiDiri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EvaluasiDiri $evaluasiDiri)
    {
        //
    }
}
