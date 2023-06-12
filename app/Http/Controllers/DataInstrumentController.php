<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\DocumentStandard;
use App\Models\Instrument;
use App\Models\User;
use Illuminate\Http\Request;

class DataInstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Instrument';

        $dataInstrument = DataInstrument::with(['auditor', 'auditee', 'categoryUnit'])
        ->get();


        return view('admin.instrumentData.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Tambah Data Instrument';

        $userAuditor = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditor']);
        })
            ->get();

        $userAuditee = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditee']);
        })->get();

        $categoryUnit = CategoryUnit::all();

        $documentStandard = DocumentStandard::whereHas('media', function($q){
            $q->whereIn('model_type', ['App\Models\DocumentStandard']);
        })->get();
        // dd($documentStandard);

        return view('admin.instrumentData.form', [
            'title' => $title,
            'categoryUnit' => $categoryUnit,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            'documentStandard' => $documentStandard,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DataInstrument::create([
            'auditor_id' => $request->auditor_id,
            'auditee_id' => $request->auditee_id,
            'category_unit_id' => $request->category_unit_id,
            'status' => 'Menunggu Konfirmasi Kepala P4MP',
            'year' => $request->year,
            'documentStandard'  => $request->documentStandard
        ]);
        // dd($request->all());

        return redirect()->route('admin.data-instruments.index')->with('success', 'Data Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(DataInstrument $dataInstrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Form Edit Data Instrument';
        $dataInstrument=DataInstrument::find($id);
        $userAuditor = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditor']);
        })
            ->get();

        $userAuditee = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditee']);
        })->get();
        $categoryUnit = CategoryUnit::all();
        $instrument = Instrument::all();


        return view('admin.instrumentData.form',[
            'dataInstrument' => $dataInstrument,
            'title' => $title,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            'categoryUnit' => $categoryUnit,
            'instrument' => $instrument,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataInstrument $dataInstrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataInstrument $dataInstrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function indexKepalaP4mp(DataInstrument $dataInstrument)
    {
        $title = 'Konfirmasi Data Penetapan AMI';
        $dataInstrument=DataInstrument::with(['categoryUnit'])
        ->where('status', 'Menunggu Konfirmasi Kepala P4MP')
        ->get();

        return view('kepalaP4mp.index', [
            'title' => $title,
            'dataInstrument'    =>  $dataInstrument
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function indexApproveKepalaP4mp(DataInstrument $dataInstrument)
    {
        //
    }

    public function getDataInstrumentId($id)
    {
        // return 'success';
        $instrument = Instrument::find($id);

        $filter = (object) [
            'category_unit_id' => $instrument->id,
        ];

        $instrument = Instrument::filter($filter)->get();

        return response()->json($instrument);
    }
}
