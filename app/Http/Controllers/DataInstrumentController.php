<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\Instrument;
use App\Models\User;
use Illuminate\Http\Request;

class DataInstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Instrument';
        $dataInstrument = DataInstrument::with(['auditor', 'auditee', 'categoryUnit'])->get();

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

        $instrument = Instrument::all();

        // $filter = (object) [
        //     'category_unit_id' => $categoryUnit,
        // ];

        // $instrument = Instrument::filter($filter);

        return view('admin.instrumentData.form', [
            'title' => $title,
            'categoryUnit' => $categoryUnit,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            'instrument' => $instrument,
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
            'status' => 'Menunggu Validasi',
            'year' => $request->year,
        ]);

        return redirect()->route('admin.data-instruments.index');

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
    public function edit(DataInstrument $dataInstrument)
    {
        //
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

    public function getDataInstrumentId($id)
    {
        // return 'success';
        $dataInstrument = DataInstrument::where('category_unit_id', $id)->get();

        return response()->json($dataInstrument);
    }
}
