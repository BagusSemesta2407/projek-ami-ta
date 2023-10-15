<?php

namespace App\Http\Controllers;

use App\Models\AuditDokumen;
use App\Models\Auditor;
use App\Models\DataInstrument;
use App\Models\EvaluasiDiri;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Audit Dokumen';
        $userId = Auth::id();

        $auditor = Auditor::with(['user'])->whereHas('user', function ($q) use ($userId) {
            $q->where('id', $userId);
        })->first();

        $dataInstrument = DataInstrument::with(['categoryUnit', 'auditor', 'auditor2'])
            ->where('status', 'Sudah Di Jawab Auditee')
            ->where('auditor_id', @$auditor->id)
            ->orWhere('auditor2_id', @$auditor->id)
            ->get();

        return view('auditDokumen.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument
            // 'evaluasiDiri'=>$evaluasiDiri
        ]);
    }


    public function dataAuditDokumen($id)
    {
        $title = 'Audit Dokumen';

        $userId = Auth::user()->id;
        $dataInstrument = DataInstrument::find($id);
        $evaluasiDiri = EvaluasiDiri::with(['instrument'])->where('data_instrument_id', $id)
            ->whereHas('dataInstrument', function ($q) {
                $q->where('status', ['Sudah Di Jawab Auditee']);
            })->get();

        return view('auditDokumen.dataEvaluasiDiri.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'evaluasiDiri'  => $evaluasiDiri,
            'userId'       => $userId,
        ]);
    }

    public function createDataAuditDokumen($id)
    {
        $title = 'Audit Dokumen';
        $evaluasiDiri = EvaluasiDiri::find($id);
        $auditDokumen = AuditDokumen::where('evaluasi_diri_id', $id)->first();

        $userId = Auth::id();
        $dataInstrument = $evaluasiDiri->dataInstrument;

        return view('auditDokumen.dataEvaluasiDiri.inputDataAuditDokumen', [
            "title"         =>   $title,
            "evaluasiDiri"    =>     $evaluasiDiri,
            "auditDokumen" =>   $auditDokumen,
            'dataInstrument' => $dataInstrument,
            'userId'    => $userId,
        ]);
    }

    public function postDataAuditDokumen(Request $request, $dataInstrumentId)
    {
        $userId = Auth::id();

        $auditor = Auditor::with(['user'])->whereHas('user', function ($q) use ($userId) {
            $q->where('id', $userId);
        })->first();
        
        $dataInstrument=DataInstrument::find($dataInstrumentId);
        
        $auditor1 = true;

        if ($dataInstrument->auditor2_id == $auditor->id) {
            $auditor1 = false;
        }


        foreach ($request->data as $key => $value) {
            $data = [
                'evaluasi_diri_id' => $key,
            ];
            if ($auditor1) {
                $data['status_ketercapaian_auditor_1'] = $value['status_ketercapaian_auditor_1'];
                $data['deskripsi_auditor_1'] = $value['deskripsi_auditor_1'];
                $data['daftar_tilik_auditor_1'] = $value['daftar_tilik_auditor_1'];
            }else{
                $data['status_ketercapaian_auditor_2'] = $value['status_ketercapaian_auditor_2'];
                $data['deskripsi_auditor_2'] = $value['deskripsi_auditor_2'];
                $data['daftar_tilik_auditor_2'] = $value['daftar_tilik_auditor_2'];
            }

            AuditDokumen::updateOrCreate(['evaluasi_diri_id' => $key], $data);
        }

        return redirect()->route('menu-auditor.audit-dokumen.index')->with('success', 'Data Berhasil Diinput!');
    }

    public function postUpdateDataAuditDokumen(Request $request, $evaluasiDiri, $auditDokumen)
    {
        $userId = Auth::id();
        $dataEvaluasiDiri = EvaluasiDiri::find($evaluasiDiri);
        $dataInstrument = DataInstrument::where('id', $dataEvaluasiDiri->data_instrument_id)->first();

        $dataAuditor1 = [
            'evaluasi_diri_id'  => $evaluasiDiri,
            'deskripsi_auditor_1' => $request->deskripsi_auditor_1,
            'daftar_tilik_auditor_1' => $request->daftar_tilik_auditor_1,
        ];
        $dataAuditor2 = [
            'evaluasi_diri_id'  => $evaluasiDiri,
            'deskripsi_auditor_2' => $request->deskripsi_auditor_2,
            'daftar_tilik_auditor_2' => $request->daftar_tilik_auditor_2
        ];

        if ($userId == $dataInstrument->auditor_id) {
            AuditDokumen::where('id', $auditDokumen)->update($dataAuditor1);
        } elseif ($userId == $dataInstrument->auditor2_id) {
            AuditDokumen::where('id', $auditDokumen)->update($dataAuditor2);
        }

        return redirect()->route('menu-auditor.audit-dokumen.index');
    }

    public function detailDataAuditDokumen($id)
    {
        $title = 'Audit Dokumen';
        $dataInstrument=DataInstrument::find($id);
        $evaluasiDiri=EvaluasiDiri::with(['dataInstrument'])->where('data_instrument_id',$dataInstrument->id)->get();

        $auditDokumen=AuditDokumen::with(['evaluasiDiri'])
        ->whereHas('evaluasiDiri', function($q) use ($evaluasiDiri){
            $q->where('evaluasi_diri_id', $evaluasiDiri);
        })->get();
        dd($auditDokumen);

        return view('auditDokumen.detail', [
            'title' => $title,
            'auditDokumen' => $auditDokumen,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function updateStatusDataInstrument($id)
    {
        $dataInstrument = DataInstrument::findOrFail($id);

        if ($dataInstrument->status == 'Sudah Di Jawab Auditee') {
            $dataInstrument->status = 'Audit Lapangan';
        }

        $dataInstrument->save();

        // return redirect()->back();
        return response()->json(['success', 'Data Berhasil Divalidasi']);
    }

    public function validateDataAuditDokumen($id)
    {
        $title = 'Audit Dokumen';
        // $auditDokumen = AuditDokumen::where('id', $id)->get();
        $dataInstrument = DataInstrument::find($id);
        $auditDokumen = AuditDokumen::with(['evaluasiDiri'])
            ->whereHas('evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();
        return view('auditDokumen.validasiAuditDokumen', [
            'auditDokumen' => $auditDokumen,
            'title' => $title,
            'dataInstrument' => $dataInstrument
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditDokumen $auditDokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditDokumen $auditDokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditDokumen $auditDokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditDokumen $auditDokumen)
    {
        //
    }
}
