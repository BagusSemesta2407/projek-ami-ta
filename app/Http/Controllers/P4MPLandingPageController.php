<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\Auditor;
use App\Models\DataInstrument;
use App\Models\DokumenStandar;
use App\Models\Lingkup;
use App\Models\TinjauanPengendalian;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class P4MPLandingPageController extends Controller
{
    public function index()
    {
        // $dokumenStandar=DokumenStandar::
        $dokumenStandar=DokumenStandar::all();
        return view('landingPage.p4mp.index', [
            'dokumenStandar' => $dokumenStandar
        ]);
    }

    public function indexHasilAmi()
    {
        $dataInstrument = DataInstrument::where('status', 'Selesai')->get();

        return view('landingPage.p4mp.hasilAmi', [
            // 'instrumentAuditee'=>$instrumentAuditee,
            'dataInstrument' => $dataInstrument,
        ]);
    }

    public function listHasilAMI($id)
    {
        $title = 'Laporan AMI';
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan = AuditLapangan::with(['auditDokumen.evaluasiDiri'])
            ->whereHas('auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();

        return view('landingPage.p4mp.listAmi', [
            'title' => $title,
            'dataInstrument'    => $dataInstrument,
            'auditLapangan'  => $auditLapangan
        ]);
    }
    public function hasilAmi($id)
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

        // Template untuk cover halaman
        $coverData = [
            'coverImageUrl'=> "public/assetReport/cover.jpg"
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
            'lingkup'=> $lingkup
        ];
        $coverPage =view('report.berkas.cover', $coverData)->render();

        // Template untuk isi halaman
        $contentPage = view('report.berkas.content', $contenData)->render();

        $contentPagePendahuluan = view('report.berkas.content-pendahuluan', $contenDataPendahuluan)->render();
        $contentPageTujuan = view('report.berkas.content-tujuan', $contenDataTujuan)->render();

        $pdf = PDF::loadHTML($coverPage . $contentPage . $contentPagePendahuluan . $contentPageTujuan)->setPaper('A4', 'portrait');

        return $pdf->stream();
    }

}
