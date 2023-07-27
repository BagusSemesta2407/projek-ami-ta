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
        $title = 'Evaluasi Diri';
        $userId = Auth::id();
        $dataInstrument = DataInstrument::with(['categoryUnit.user'])
            ->where('status', 'On Progress')
            // ->where('auditee_id', $userId)
            ->whereHas('categoryUnit.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })
            ->latest()
            ->get();
        return view('evaluasiDiri.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
        ]);
    }

    public function dataEvaluasiDiri($id)
    {
        $title = 'Evaluasi Diri';
        $dataInstrument = DataInstrument::find($id);
        $filter = (object)[
            'category_unit_id' => $dataInstrument->category_unit_id
        ];

        $instrument = Instrument::filter($filter)
            ->where('status_ketercapaian', 'Tidak Tercapai')
            ->get();

        $instrumentIDs = $instrument->pluck('id');

        // $evaluasiDiri = EvaluasiDiri::with(['instrument', 'dataInstrument'])->where('data_instrument_id', $dataInstrument)->where('instrument_id', $instrument)->get();
        $evaluasiDiri = EvaluasiDiri::whereIn('data_instrument_id', [$dataInstrument->id])
            ->whereIn('instrument_id', $instrumentIDs)
            ->first();

        $tinjauanPengendalian = TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
        ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function($q) use ($instrumentIDs){
            $q->whereIn('instrument_id', $instrumentIDs);
        })->get();
        
        // dd($tinjauanPengendalian->rencana_tindak_lanjut);

        return view('evaluasiDiri.dataEvaluasiDiri.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'instrument' => $instrument,
            'evaluasiDiri' => $evaluasiDiri,
            'tinjauanPengendalian' => $tinjauanPengendalian
        ]);
    }

    public function createEvaluasiDiri($dataInstrument, $instrument)
    {
        $title = 'Evaluasi Diri';
        $getDataInstrument = DataInstrument::find($dataInstrument);
        $getInstrument = Instrument::find($instrument);
        $evaluasiDiri = EvaluasiDiri::with(['instrument', 'dataInstrument'])->where('data_instrument_id', $dataInstrument)->where('instrument_id', $instrument)->first();

        $tinjauanPengendalian = TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
            ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function ($q) use ($getInstrument) {
                $q->where('instrument_id', $getInstrument->id);
            })->get();
        // dd($tinjauanPengendalian);
        return view('evaluasiDiri.dataEvaluasiDiri.form', [
            'title' => $title,
            'evaluasiDiri' => $evaluasiDiri,
            'getInstrument' => $getInstrument,
            'getDataInstrument' => $getDataInstrument,
            'tinjauanPengendalian' => $tinjauanPengendalian
        ]);
    }

    public function postDataEvaluasiDiri(Request $request, $dataInstrument, $instrument)
    {
        $data = $request->input('data', []);

        foreach ($data as $key => $value) {
            EvaluasiDiri::updateOrCreate(
                [
                    'data_instrument_id' => $dataInstrument,
                    'instrument_id' => $key
                ],
                [
                    'status_ketercapaian' => $value['status_ketercapaian'],
                    'deskripsi_ketercapaian' => $value['deskripsi_ketercapaian'],
                    'bukti' => $value['bukti'],
                    'catatan' => $value['catatan'],
                ]
            );
        }

        DataInstrument::where('id', $dataInstrument)->update([
            'status' => 'Sudah Di Jawab Auditee'
        ]);
        // return redirect()->route('menu-auditee.evaluasi-diri.data-evaluasi-diri', $getInstrument);
        return redirect()->route('menu-auditee.evaluasi-diri.index')->with('success', 'Data Berhasil Diinput!');
    }


    public function updateDataEvaluasiDiri(Request $request, $dataInstrument, $instrument, $evaluasiDiri)
    {

        $data = $request->input('data', []);

        foreach ($data as $key => $value) {
            EvaluasiDiri::where('data_instrument_id', $evaluasiDiri)->update(
                [
                    'data_instrument_id' => $dataInstrument,
                    'instrument_id' => $key
                ],
                [
                    'status_ketercapaian' => $value['status_ketercapaian'],
                    'deskripsi_ketercapaian' => $value['deskripsi_ketercapaian'],
                    'bukti' => $value['bukti'],
                    'catatan' => $value['catatan'],
                ]
            );
        }

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
        $evaluasiDiri = EvaluasiDiri::with(['dataInstrument'])
            ->whereHas('dataInstrument', function ($q) use ($dataInstrument) {
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

        return view('auditee.instrumentAuditee.detailInstrumentAuditee', [
            'title' =>  $title,
            'evaluasiDiri' => $evaluasiDiri,
            'dataInstrument' => $dataInstrument
        ]);
    }
    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {

    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(EvaluasiDiri $evaluasiDiri)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(EvaluasiDiri $evaluasiDiri)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, EvaluasiDiri $evaluasiDiri)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(EvaluasiDiri $evaluasiDiri)
    // {
    //     //
    // }
}
