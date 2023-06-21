<?php

namespace App\Http\Controllers;

use App\Models\InstrumentAuditee;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $title='Laporan AMI';
        $instrumentAuditee=InstrumentAuditee::whereHas('dataInstrument', function($q){
            $q->whereIn('status', ['Sudah Divalidasi Auditor']);
        })
        ->latest()
        ->get();

        return view('report.index',[
            'instrumentAuditee'=>$instrumentAuditee,
            'title' => $title
        ]);
    }

    public function detailReportAMI($id)
    {
        $title='Detail';
        $instrumentAuditee=InstrumentAuditee::find($id);
        return view('report.detail',[
            'title'=> $title,
            'instrumentAuditee'=>$instrumentAuditee
        ]);
    }
}
