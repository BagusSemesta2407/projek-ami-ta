<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\DataInstrument;
use App\Models\EvaluasiDiri;
use App\Models\Instrument;
use App\Models\TinjauanPengendalian;
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
        ->where('status', 'On Progress')
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

        $instrument=Instrument::filter($filter)
        ->where('status_ketercapaian', 'Tidak Tercapai')
        ->get();

        // $evaluasiDiri=EvaluasiDiri::with(['evaluasiDiri.dataInstrument'])->first();
        // dd($evaluasiDiri)

        return view('evaluasiDiri.dataEvaluasiDiri.index',[
            'title'=>$title,
            'dataInstrument'=>$dataInstrument,
            'instrument' => $instrument,
        ]);
    }

    public function createEvaluasiDiri($dataInstrument, $instrument)
    {
        $title = 'Evaluasi Diri';
        $getDataInstrument=DataInstrument::find($dataInstrument);
        $getInstrument=Instrument::find($instrument);
        $evaluasiDiri=EvaluasiDiri::with(['instrument', 'dataInstrument'])->where('data_instrument_id', $dataInstrument)->where('instrument_id', $instrument)->first();

        // $auditLapangan=AuditLapangan::with(['auditDokumen.evaluasiDiri'])
        // ->whereHas('auditDokumen.evaluasiDiri', function($q) use ($getDataInstrument){
        //     $q->where('instrument_id', $getDataInstrument->id);
        // })->first();
        $tinjauanPengendalian=TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
        ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function($q) use ($getInstrument){
            $q->where('instrument_id', $getInstrument->id);
        })->first();
        // dd($tinjauanPengendalian);
        return view('evaluasiDiri.dataEvaluasiDiri.form',[
            'title' => $title,
            'evaluasiDiri'=>$evaluasiDiri,
            'getInstrument'=>$getInstrument,
            'getDataInstrument'=>$getDataInstrument,
            'tinjauanPengendalian'=> $tinjauanPengendalian
        ]);
    }

    public function postDataEvaluasiDiri(Request $request, $dataInstrument, $instrument)
    {
        $getDataInstrumen=DataInstrument::find($dataInstrument);
        $getInstrument=Instrument::find($instrument);
        $data = [
            'data_instrument_id' => $dataInstrument,
            'instrument_id' =>$instrument,
            'status_ketercapaian' => $request->status_ketercapaian,
            'deskripsi_ketercapaian'=> $request->deskripsi_ketercapaian,
            'bukti' => $request->bukti,
            'catatan'=> $request->catatan
        ];

        EvaluasiDiri::create($data);
        return redirect()->route('menu-auditee.evaluasi-diri.index');
    }

    // public function editEvaluasiDiri($dataInstrument, )
    // {
    //     $title='Edit Evaluasi Diri';
    //     $evaluasiDiri=EvaluasiDiri::find($id);

    //     return view('evaluasiDiri.dataEvaluasiDiri.edit',[
    //         'title' => $title,
    //         'evaluasiDiri'=> $evaluasiDiri
    //     ]);
    // }
    public function updateDataEvaluasiDiri(Request $request, $dataInstrument, $instrument, $evaluasiDiri)
    {
        
        $getDataInstrumen=DataInstrument::find($dataInstrument);
        $getInstrument=Instrument::find($instrument);
        $data = [
            'data_instrument_id' => $dataInstrument,
            'instrument_id' =>$instrument,
            'status_ketercapaian' => $request->status_ketercapaian,
            'deskripsi_ketercapaian'=> $request->deskripsi_ketercapaian,
            'bukti' => $request->bukti,
            'catatan'=> $request->catatan
        ];

        EvaluasiDiri::where('id',$evaluasiDiri)->update($data);
        return redirect()->route('menu-auditee.evaluasi-diri.index');
    }

    /**
     * Display the specified resource.
     */
    public function updateStatusDataInstrument($id)
    {
        $dataInstrument = DataInstrument::findOrFail($id);

        if ($dataInstrument->status == 'On Progress') {
            $dataInstrument->status = 'Sudah Di Jawab Auditee';
        }

        $dataInstrument->save();

        // return redirect()->back();
        return response()->json(['success', 'Data Berhasil Divalidasi']);
    }

    public function validateDataEvaluasiDiri($id)
    {
        $title = 'Audit Dokumen';
        // $auditDokumen = AuditDokumen::where('id', $id)->get();
        $dataInstrument = DataInstrument::find($id);
        $evaluasiDiri=EvaluasiDiri::with(['dataInstrument'])
        ->whereHas('dataInstrument', function($q) use ($dataInstrument){
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();
        return view('evaluasiDiri.dataEvaluasiDiri.validasi', [
            'evaluasiDiri' => $evaluasiDiri,
            'title' => $title,
            'dataInstrument' => $dataInstrument
        ]);
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
