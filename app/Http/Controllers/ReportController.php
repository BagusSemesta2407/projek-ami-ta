<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\Auditor;
use App\Models\DataInstrument;
use App\Models\InstrumentAuditee;
use App\Models\TinjauanPengendalian;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $title='Laporan AMI';
        $dataInstrument=DataInstrument::where('status', 'Selesai')->get();

        return view('report.index',[
            // 'instrumentAuditee'=>$instrumentAuditee,
            'dataInstrument'=>$dataInstrument,
            'title' => $title
        ]);
    }

    public function detailReportAMI($id)
    {
        $title='Laporan AMI';
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan=AuditLapangan::with(['auditDokumen.evaluasiDiri'])
        ->whereHas('auditDokumen.evaluasiDiri', function($q) use ($dataInstrument){
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();

        return view('report.detail',[
            'title'=> $title,
            'dataInstrument'    => $dataInstrument,
            'auditLapangan'  => $auditLapangan
        ]);
    }

    public function cetakHasilAmi($id)
    {
        $dataInstrument=DataInstrument::find($id);
        $instrumentAuditee=InstrumentAuditee::where('data_instrument_id',$dataInstrument->id)->get();

        $pdf = PDF::loadView(
            'report.hasilAmi',
            [
                'dataInstrument' => $dataInstrument,
                'instrumentAuditee'=> $instrumentAuditee
            ]
        )->setPaper('A4', 'portrait');
        return $pdf->stream();

    }

    public function indexPengendalian()
    {
        $title='Laporan AMI';
        $dataInstrument=DataInstrument::where('status', 'Selesai')->get();

        return view('report.indexPengendalian',[
            'dataInstrument'=>$dataInstrument,
            'title' => $title
        ]);
    }

    public function detailReportPengendalian($id)
    {
        $title='Laporan Tinjauan Manajemen Pengendalian';
        // $instrumentAuditee=InstrumentAuditee::find($id);
        $dataInstrument=DataInstrument::find($id);
        $tinjauanPengendalian=TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
        ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function($q) use ($dataInstrument){
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();
        return view('report.detailPengendalian',[
            'title'=> $title,
            'dataInstrument'    => $dataInstrument,
            'tinjauanPengendalian'   =>  $tinjauanPengendalian
        ]);
    }

    public function cetakDetailReportPengendalian($id)
    {
        $dataInstrument=DataInstrument::find($id);

        $pdf = PDF::loadView(
            'report.cetakPengendalian',
            [
                'dataInstrument' => $dataInstrument,
            ]
        )->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
    public function indexPeningkatanRTM()
    {
        $title='peningkatan';
        $instrumentAuditee=InstrumentAuditee::all();

        return view('report.indexPeningkatan',[
            'instrumentAuditee'=>$instrumentAuditee,
            'title' => $title
        ]);
    }


}
