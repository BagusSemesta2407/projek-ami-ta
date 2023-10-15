<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\Auditor;
use App\Models\DataInstrument;
use App\Models\InstrumentAuditee;
use App\Models\Kesimpulan;
use App\Models\Lingkup;
use App\Models\TinjauanPengendalian;
use App\Models\Tujuan;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Laporan AMI';
        $dataInstrument = DataInstrument::where('status', 'Selesai')->get();

        return view('report.index', [
            // 'instrumentAuditee'=>$instrumentAuditee,
            'dataInstrument' => $dataInstrument,
            'title' => $title
        ]);
    }

    // public function kesimpulan()
    // {
    //     $dataInstrument=DataInstrument::find($id);


    // }

    public function detailReportAMI($id)
    {
        $title = 'Laporan AMI';
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan = AuditLapangan::with(['auditDokumen.evaluasiDiri'])
            ->whereHas('auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();

        return view('report.detail', [
            'title' => $title,
            'dataInstrument'    => $dataInstrument,
            'auditLapangan'  => $auditLapangan
        ]);
    }

    public function cetakHasilAmi($id)
    {
        $auditor=Auditor::all();
        $dataInstrument = DataInstrument::find($id);
        $tinjauanPengendalian = TinjauanPengendalian::whereHas('auditLapangan.auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();
        $auditLapangan = AuditLapangan::with(['auditDokumen.evaluasiDiri'])
            ->whereHas('auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();

        $tujuan =Tujuan::where('data_instrument_id', $id)->get();
        $lingkup =Lingkup::where('data_instrument_id', $id)->get();
        $kesimpulan=Kesimpulan::where('data_instrument_id', $id)->get();

        // Template untuk cover halaman
        $coverData = [
            'coverImageUrl'=> "public/assetReport/cover.jpg",
            'dataInstrument' => $dataInstrument,
        ];

        $contenData = [
            'dataInstrument' => $dataInstrument,
            'tinjauanPengendalian' => $tinjauanPengendalian,
            'auditor'=>$auditor
        ];

        $contenDataPendahuluan = [
            'dataInstrument' => $dataInstrument,
            'tinjauanPengendalian' => $tinjauanPengendalian,
            'auditor'=>$auditor
        ];

        $contenDataTujuan = [
            'dataInstrument' => $dataInstrument,
            'tinjauanPengendalian' => $tinjauanPengendalian,
            'auditLapangan' => $auditLapangan,
            'tujuan'=>$tujuan,
            'lingkup'=> $lingkup,
            'kesimpulan'=> $kesimpulan
        ];
        $coverPage =view('report.berkas.cover', $coverData)->render();

        // Template untuk isi halaman
        $contentPage = view('report.berkas.content', $contenData)->render();

        $contentPagePendahuluan = view('report.berkas.content-pendahuluan', $contenDataPendahuluan)->render();
        $contentPageTujuan = view('report.berkas.content-tujuan', $contenDataTujuan)->render();

        $pdf = PDF::loadHTML($coverPage . $contentPage . $contentPagePendahuluan . $contentPageTujuan)->setPaper('A4', 'portrait');

        return $pdf->stream();
    }

    public function indexPengendalian()
    {
        $title = 'Laporan AMI';
        $dataInstrument = DataInstrument::where('status', 'Selesai')->get();

        return view('report.indexPengendalian', [
            'dataInstrument' => $dataInstrument,
            'title' => $title
        ]);
    }

    public function detailReportPengendalian($id)
    {
        $title = 'Laporan Tinjauan Manajemen Pengendalian';
        // $instrumentAuditee=InstrumentAuditee::find($id);
        $dataInstrument = DataInstrument::find($id);
        $tinjauanPengendalian = TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
            ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();
        return view('report.detailPengendalian', [
            'title' => $title,
            'dataInstrument'    => $dataInstrument,
            'tinjauanPengendalian'   =>  $tinjauanPengendalian
        ]);
    }

    public function cetakDetailReportPengendalian($id)
    {
        $dataInstrument = DataInstrument::find($id);

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
        $title = 'peningkatan';
        $instrumentAuditee = InstrumentAuditee::all();

        return view('report.indexPeningkatan', [
            'instrumentAuditee' => $instrumentAuditee,
            'title' => $title
        ]);
    }
}
