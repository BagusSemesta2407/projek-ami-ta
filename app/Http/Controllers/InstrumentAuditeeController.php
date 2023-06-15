<?php

namespace App\Http\Controllers;

use App\Models\DataInstrument;
use App\Models\Instrument;
use App\Models\InstrumentAuditee;
use App\Models\Proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstrumentAuditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instrument Auditee';
        $userId=Auth::id();

        $dataInstrument = DataInstrument::with(['categoryUnit'])
        ->where('auditee_id', $userId)
        // ->where('status', 'On Progress')
        ->get();

        return view('auditee.instrumentAuditee.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
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
            'status_standar' => $status_standar,
        ];

        $instrument = Instrument::filter($filter)
            // ->whereHas('instrumentAuditee', function($q){
            //     $q->whereHas('dataInstrument',function($y){
            //         $y->where('status', 'On Progress');
            //     }); 
            // })
            ->get();

        $title = 'Form Data Instrument';

        return view('auditee.instrumentAuditee.standarInstrument.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'instrument' => $instrument,
            'status_standar' => $status_standar,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        foreach ($request->data as $key => $value)
        {
            // $auditor=DataInstrument::find($id);
            // $auditee=DataInstrument::find($id);
            // $categoryUnit=DataInstrument::find($id);
            $instrument=Instrument::find($key);
            $dataInstrument=DataInstrument::find($id);

            InstrumentAuditee::create([
                'data_instrument_id' => $id,
                'instrument_id'=> $key,
                'status_ketercapaian'    => $value['status_ketercapaian'],
                'desrkripsi_ketercapaian'    => $value['desrkripsi_ketercapaian'],
                
                // 'nama_instrument'   => $instrument->name,
                // 'nama_auditor'  => $auditor->auditor->name,
                // 'nama_auditee'  => $auditee->auditee->name,
                // 'nama_unit'     => $categoryUnit->categoryUnit->name,
                // 'tahun_instrument'  => $dataInstrument->year
            ]);
        }

        DataInstrument::where('id', $id)->update([
            'status'    =>  'Sudah Di Jawab Auditee'
        ]);

        return redirect()->route('menu-auditee.instruments-auditee.index');
    }


    /**
     * Display the specified resource.
     */
    public function detailInstrumentAuditee($id)
    {
        $title = 'Rekap Instrument';

        $dataInstrument = DataInstrument::find($id);

        $instrumentAuditee = InstrumentAuditee::where('data_instrument_id', $id)
        ->whereHas('dataInstrument', function ($q) {
            $q->whereIn('status', ['Sudah Di Jawab Auditee']);
        })
            ->get();

        return view('auditee.instrumentAuditee.detailInstrumentAuditee',[
            'title' =>  $title,
            'instrumentAuditee' => $instrumentAuditee,
            'dataInstrument' => $dataInstrument
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function indexAuditor()
    {
        $title = 'Instrument Auditee';
        $userId=Auth::id();

        $dataInstrument = DataInstrument::with(['categoryUnit'])
        ->where('auditor_id', $userId)
        ->get();

        return view('auditor.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function createAuditor($id)
    {
        $title = 'Validasi Data Instrument';

        $dataInstrument = DataInstrument::find($id); 
        $instrumentAuditee = InstrumentAuditee::where('data_instrument_id', $id)
        ->whereHas('dataInstrument', function ($q) {
            $q->whereIn('status', ['Sudah Di Jawab Auditee']);
        })
        ->get();
        return view('auditor.form', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'instrumentAuditee' => $instrumentAuditee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function confirmValidateAuditor(Request $request, $id)
    {
        foreach($request->data as $value)
        {
            InstrumentAuditee::where('data_instrument_id', $id)->update([
                'status_temuan_audit'    => $value['status']
            ]);
        }

        DataInstrument::where('id', $id)->update([
            'status'    =>  'Sudah Divalidasi Auditor'
        ]);

        return redirect()->route('menu-auditor.index-instrument-auditor');
    }

    /**
     * Display the specified resource.
     */
    public function indexAuditDokumen()
    {
        $title = 'Audit Document';
        $instrumentAuditee=InstrumentAuditee::all();
        return view('auditor.indexAuditDokumen',[
            'title' => $title,
            'instrumentAuditee'=>$instrumentAuditee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function inputHasilAuditDokumen($id)
    {
        $title = 'Audit Dokumen';
        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('auditor.inputHasilAuditDokumen',[
            'title' => $title,
            'instrumentAuditee'=> $instrumentAuditee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function createHasilAuditDokumen(Request $request,$id)
    {
        $data = [
            'hasil_audit_dokumen'   =>  $request->hasil_audit_dokumen
        ];

        InstrumentAuditee::where('id', $id)->update($data);

        return redirect()->route('menu-auditor.index-audit-dokumen');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
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
