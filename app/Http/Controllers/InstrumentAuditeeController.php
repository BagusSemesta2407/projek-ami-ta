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
            'category_unit_id' => $dataInstrument->category_unit_id,
            'status_standar' => $status_standar,
        ];
        // dd($filter);

        $instrument = Instrument::filter($filter)
            // ->whereHas('instrumentAuditee', function($q){
            //     $q->whereHas('dataInstrument',function($y){
            //         $y->where('status', 'On Progress');
            //     }); 
            // })
            ->get();
        // $instrument=Instrument::filter($filter)->get();
            // dd($instrument);

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
        // $bukti=InstrumentAuditee::saveBukti($request);
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
                'deskripsi_ketercapaian'    => $value['deskripsi_ketercapaian'],
                'bukti'=>$value['bukti']
                // 'bukti' => InstrumentAuditee::saveBukti($value['bukti']),
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
     * AUDIT LAPANGAN(VALIDASI)
     * (VALIDASI AUDIT LAPANGAN TIM AUDITOR & AUDITEE)
     */
    public function indexAuditor()
    {
        $title = 'Audit Lapangan';
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
     * AUDIT LAPANGAN(VALIDASI)/DATA AUDIT LAPANGAN
     * 
     */
    public function createAuditor($id)
    {
        $title = 'Audit Lapangan';

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
     * AUDIT LAPANGAN(VALIDASI)/DATA AUDIT LAPANGAN/VALIDASI AUDIT LAPANGAN
     */
    public function validateDataAuditLapangan($id)
    {
        $title='Audit Lapangan';
        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('auditor.auditLapangan.validateDataAuditLapangan',[
            "title" =>$title,
            "instrumentAuditee"=>$instrumentAuditee
        ]);
    }

    public function postValidateDataAuditLapangan(Request $request, $id)
    {
        $data = [
            'hasil_temuan_audit'    => $request->hasil_temuan_audit,
            'status_temuan_audit'   => $request->status_temuan_audit,
            'rekomendasi'           => $request->rekomendasi
        ];

        InstrumentAuditee::where('id', $id)->update($data);

        return redirect()->route('menu-auditor.index-instrument-auditor');
    }

     /**
     * Display the specified resource.
     */
    public function detailValidateDataAuditLapangan($id)
    {
        $title='Audit Lapangan';
        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('auditor.auditLapangan.detailauditlapangan',[
            'title' =>$title,
            'instrumentAuditee' =>$instrumentAuditee
        ]);
    }


     /**
     * Display the specified resource.
     */
    public function updateStatusDataInstrument($id)
    {
        $dataInstrument=DataInstrument::findOrFail($id);

        if($dataInstrument->status == 'Sudah Di Jawab Auditee')
        {
            $dataInstrument->status = 'Sudah Divalidasi Auditor';
        }

        $dataInstrument->save();

        // return redirect()->back();
        return response()->json(['success', 'Data Berhasil Divalidasi']);
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
     * AUDIT DOKUMEN.
     */
    public function indexAuditDokumen()
    {
        $title = 'Audit Document';
        // $instrumentAuditee=InstrumentAuditee::all();

        $userId=Auth::id();
        $dataInstrument=DataInstrument::with(['categoryUnit'])
        ->where('auditor_id', $userId)
        ->where('status', 'Sudah Di Jawab Auditee')
        ->get();
        // $dataInstrument=DataInstrument::all();

        return view('auditor.auditdokumen.indexAuditDokumen',[
            'title' => $title,
            // 'instrumentAuditee'=>$instrumentAuditee
            'dataInstrument'    =>  $dataInstrument
        ]);
    }
    
    /**
     * AUDIT DOKUMEN/DATA AUDIT DOKUMEN.
     */
    public function indexDataAuditDokumen($id)
    {
        $title = 'Data Audit Dokumen';

        $dataInstrument=DataInstrument::find($id);
        $instrumentAuditee=InstrumentAuditee::where('data_instrument_id', $id)
        ->whereHas('dataInstrument', function($q){
            $q->where('status', ['Sudah Di Jawab Auditee']);
        })->get();

        return view('auditor.auditdokumen.indexDataAuditDokumen', [
            'title'             =>$title,
            'dataInstument'     => $dataInstrument,
            'instrumentAuditee' => $instrumentAuditee
        ]);
    }

    /**
     * AUDIT DOKUMEN/DATA AUDIT DOKUMEN/INPUT HASIL AUDIT DOKUMEN.
     * .
     */
    public function inputHasilAuditDokumen($id)
    {
        $title = 'Audit Dokumen';
        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('auditor.auditdokumen.inputHasilAuditDokumen',[
            'title' => $title,
            'instrumentAuditee'=> $instrumentAuditee
        ]);
    }

    /**
     * AUDIT DOKUMEN/DATA AUDIT DOKUMEN/INPUT HASIL AUDIT DOKUMEN/(POST).
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
     * AUDIT DOKUMEN/DATA AUDIT DOKUMEN/DETAIL DATA AUDIT DOKUMEN.
     */
    public function detailHasilAuditDokumen($id)
    {
        $title='Detail Data Audit Dokumen';
        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('auditor.auditdokumen.detailHasilDataDokumen',[
            'title'=>$title,
            'instrumentAuditee'=> $instrumentAuditee
        ]);
    }


    /**
     * KEPALA P4MP
     * Rapat-tinjauan.
     */
    public function rapatTinjauan()
    {
        $title='Rapat Tinjauan Manajemen Pengendalian';
        // $instrumentAuditee=InstrumentAuditee::whereHas('dataInstrument', function($q){
        //     $q->whereIn('status', ['Sudah Divalidasi Auditor']);
        // })->get();
        $dataInstrument=DataInstrument::with(['categoryUnit'])
        ->where('status', 'Sudah Divalidasi Auditor')
        ->get();
        return view('rapatTinjauan.index',[
            'title' => $title,
            'dataInstrument'=>$dataInstrument
        ]);
    }


    public function formRapatTinjauanPengendalian($id)
    {
        $title='Rapat Tinjauan Manajemen Pengendalian';
        $instrumentAuditee=InstrumentAuditee::with('dataInstrument')->where('data_instrument_id', $id)->get();

        return view('rapatTinjauan.pengendalian.form',[
            'title' => $title,
            'instrumentAuditee'=>$instrumentAuditee
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function createPengendalian($id)
    {
        $title='Rapat Tinjauan Manajemen';

        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('rapatTinjauan.form',[
            'title' => $title,
            'instrumentAuditee'=> $instrumentAuditee
        ]);
    }

    /**
     * POST PENGENDALIAN.
     */
    public function storePengendalian(Request $request, $id)
    {
        $data=[
            'important' => $request->important,
            'urgent'    => $request->urgent,
            'anggaran'  => $request->anggaran,
            'tindak_lanjut' => $request->tindak_lanjut,
            'deskripsi_penting' =>$request->deskripsi_penting,
            'deskripsi_urgent' =>$request->deskripsi_urgent,
        ];

        // $file=InstrumentAuditee::saveChangeDokumen($request);

        // if($file){
        //     $data['change_dokumen']= $file;
        //     InstrumentAuditee::deleteChangeDokumen($id);
        // }

        InstrumentAuditee::where('id', $id)->update($data);

        return redirect()->route('menu-kepala-p4mp.rapat-tinjauan');
    }

    /**
     * Display the specified resource.
     */
    public function indexPeningkatan()
    {
        $title='Rapat Tinjauan Manajemen';
        $instrumentAuditee=InstrumentAuditee::whereHas('dataInstrument', function($q){
            $q->whereIn('status', ['Sudah Divalidasi Auditor']);
        })->get();
        return view('rapatTinjauan.peningkatanInde',[
            'title' => $title,
            'instrumentAuditee'=>$instrumentAuditee
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function createPeningkatan($id)
    {
        $title='Rapat Tinjauan Manajemen';

        $instrumentAuditee=InstrumentAuditee::find($id);

        return view('rapatTinjauan.createPeningkatan',[
            'title' => $title,
            'instrumentAuditee'=> $instrumentAuditee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function storePeningkatan(Request $request,$id)
    {
        $file=InstrumentAuditee::saveChangeDokumen($request);

        if($file){
            $data['change_dokumen']= $file;
            InstrumentAuditee::deleteChangeDokumen($id);
        }
        InstrumentAuditee::where('id', $id)->update($data);
        return redirect()->route('menu-kepala-p4mp.index-peningkatan');
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
