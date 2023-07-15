<?php

namespace App\Http\Controllers;

use App\Models\AuditDokumen;
use App\Models\AuditLapangan;
use App\Models\DataInstrument;
use App\Models\EvaluasiDiri;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Audit Lapangan';
        $userId=Auth::id();

        $dataInstrument = DataInstrument::with(['categoryUnit'])
        // ->where('auditor_id', $userId)
        ->where('status', 'Audit Lapangan')
        ->get();

        return view('auditLapangan.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
        ]);
    }

    public function dataAuditLapangan($id)
    {
        $title = 'Audit Lapangan';

        $dataInstrument = DataInstrument::find($id);
        $auditDokumen=AuditDokumen::all();
        return view('auditLapangan.dataAuditLapangan.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
            'auditDokumen'  => $auditDokumen
        ]);
    }

    public function createDataAuditLapangan($id)
    {
        $title='Audit Lapangan';
        $auditDokumen=AuditDokumen::find($id);
        $instrument=$auditDokumen->evaluasiDiri->instrument->status_ketercapaian;
        $auditLapangan=AuditLapangan::where('audit_dokumen_id', $id)->first();

        return view('auditLapangan.dataAuditLapangan.createDataAuditLapangan',[
            'title' => $title,
            'auditDokumen'=> $auditDokumen,
            'instrument'=>$instrument,
            'auditLapangan'=>$auditLapangan
        ]);
    }

    public function postDataAuditLapangan(Request $request, $auditDokumen, $instrument)
    {
        $dataAuditDokumen=AuditDokumen::find($auditDokumen);

        $instrument=$request->status_ketercapaian;

        $data = [
            'audit_dokumen_id'   => $auditDokumen,
            'hasil_temuan_audit' => $request->hasil_temuan_audit,
            'rekomendasi'   => $request->rekomendasi
        ];

        $updateStatusInstrument=[
            'status_ketercapaian'    => $instrument
        ];

        AuditLapangan::create($data);

        Instrument::where('id', $dataAuditDokumen->evaluasi_diri_id)->update($updateStatusInstrument);

        return redirect()->route('menu-auditor.audit-lapangan.index');
    }

    public function postUpdateDataAuditLapangan(Request $request, $auditDokumen, $instrument, $auditLapangan)
    {
        $dataAuditDokumen=AuditDokumen::find($auditDokumen);

        $instrument=$request->status_ketercapaian;
        $data=[
            'audit_dokumen_id'   => $auditDokumen,
            'hasil_temuan_audit' => $request->hasil_temuan_audit,
            'rekomendasi'   => $request->rekomendasi
        ];
        
        $updateStatusInstrument = [
            'status_ketercapaian'=> $instrument
        ];

        AuditLapangan::where('id', $auditLapangan)->update($data);
        Instrument::where('id', $dataAuditDokumen->evaluasi_diri_id)->update($updateStatusInstrument);

        return redirect()->route('menu-auditor.audit-lapangan.index');
    }

    public function detailAuditLapangan($id)
    {
        $title='Audit Lapangan';
        $auditDokumen=AuditDokumen::find($id);
        $instrument=$auditDokumen->evaluasiDiri->instrument->status_ketercapaian;
        $auditLapangan=AuditLapangan::where('audit_dokumen_id', $id)->first();

        return view('auditLapangan.dataAuditLapangan.detail',[
            'title' => $title,
            'auditDokumen'=>$auditDokumen,
            'auditLapangan'  => $auditLapangan,
            'instrument'    => $instrument
        ]);
    }

    public function validateDataAuditLapangan($id)
    {
        $title = 'Audit Lapangan';
        // $auditDokumen = AuditDokumen::where('id', $id)->get();
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan = AuditLapangan::all();
        return view('auditLapangan.validasi', [
            'auditLapangan' => $auditLapangan,
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
    public function show(AuditLapangan $auditLapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditLapangan $auditLapangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditLapangan $auditLapangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditLapangan $auditLapangan)
    {
        //
    }
}
