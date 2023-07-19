<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\DataInstrument;
use App\Models\TinjauanPengendalian;
use Illuminate\Http\Request;

class TinjauanPengendalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Tinjauan Manajemen Pengendalian';
        $dataInstrument=DataInstrument::where('status','Selesai')
        ->get();

        return view('tinjauanPengendalian.index', [
            'title' => $title,
            'dataInstrument'=> $dataInstrument
        ]);
    }

    /**
     * Show the form for dataTinjauanPengendalian a new resource.
     */
    public function dataTinjauanPengendalian($id)
    {
        $title='Tinjauan Pengendalian';
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan=AuditLapangan::with(['auditDokumen.evaluasiDiri'])
        ->whereHas('auditDokumen.evaluasiDiri', function($q) use ($dataInstrument){
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();

        return view('tinjauanPengendalian.dataTinjauanPengendalian',[
            'title'=> $title,
            'auditLapangan'=>$auditLapangan,
        ]);
    }

    /**
     * Store a newly createTinjauanPengendalian resource in storage.
     */
    public function createTinjauanPengendalian($id)
    {
        $title='Tinjauan Pengendalian';
        $auditLapangan=AuditLapangan::find($id);
        $tinjauanPengendalian=TinjauanPengendalian::where('audit_lapangan_id', $id)->first();

        return view('tinjauanPengendalian.form',[
            'title' => $title,
            'auditLapangan'=>$auditLapangan,
            'tinjauanPengendalian' => $tinjauanPengendalian
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function storeTinjauanPengendalian(Request $request, $auditLapangan)
    {
        $data=[
            'audit_lapangan_id'=>$auditLapangan,
            'important' => $request->important,
            'urgent'    => $request->urgent,
            'anggaran'  => $request->anggaran,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'deskripsi_important' =>$request->deskripsi_important,
            'deskripsi_urgent' =>$request->deskripsi_urgent,
        ];

        TinjauanPengendalian::create($data);

        return redirect()->route('menu-p4mp.index-tinjauan-pengendalian');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateTinjauanPengendalian(Request $request, $auditLapangan, $tinjauanPengendalian)
    {
        $dataAuditLapangan=AuditLapangan::findOrFail($auditLapangan);
        
        $data=[
            'audit_lapangan_id'=>$auditLapangan,
            'important' => $request->important,
            'urgent'    => $request->urgent,
            'anggaran'  => $request->anggaran,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'deskripsi_important' =>$request->deskripsi_important,
            'deskripsi_urgent' =>$request->deskripsi_urgent,
        ];

        TinjauanPengendalian::where('id', $tinjauanPengendalian)->update($data);

        return redirect()->route('menu-p4mp.index-tinjauan-pengendalian');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TinjauanPengendalian $tinjauanPengendalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinjauanPengendalian $tinjauanPengendalian)
    {
        //
    }
}
