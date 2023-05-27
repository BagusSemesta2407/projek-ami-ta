<?php

namespace App\Http\Controllers;

use App\Models\DataInstrument;
use App\Models\Instrument;
use App\Models\InstrumentAuditee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrumentAuditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instrument Auditee';

        $dataInstrument = DataInstrument::with(['categoryUnit'])->get();

        return view('admin.instrumentAuditee.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $status_standar = null)
    {
        $dataInstrument = DataInstrument::find($id);

        $filter = (object) [
            'category_unit_id' => $dataInstrument->id,
            'status_standar'    => $status_standar
        ];

        $instrument = Instrument::filter($filter)
            ->get();

        $title = 'Form Data Instrument';

        return view('admin.instrumentAuditee.standarInstrument.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'instrument' => $instrument,
            'status_standar'    =>  $status_standar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $proof=InstrumentAuditee::saveProof($request);
        // $instrument_id=$request->instrument_id;
        $answer=$request->answer;
        $reason=$request->reason;
        $data_instrument_id=$id;
        $proof=$proof;

        for ($i=0; $i < count($answer); $i++) { 
            $dataSave = [
                // 'instrument_id' => $instrument_id[$i],
                'data_instrument_id' => $data_instrument_id,
                'answer'    =>  $answer[$i],
                'reason'    =>  $reason[$i],
                // 'proof'     =>  $proof[$i]
            ];
            DB::table('instrument_auditees')->insert($dataSave);
        }

        dd($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(InstrumentAuditee $instrumentAuditee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstrumentAuditee $instrumentAuditee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstrumentAuditee $instrumentAuditee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstrumentAuditee $instrumentAuditee)
    {
        //
    }
}
