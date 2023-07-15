<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataInstrumentRequest;
use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\DocumentStandard;
use App\Models\DokumenStandar;
use App\Models\Instrument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $title = 'Data Penetapan AMI';

        $userAuditor = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditor']);
        })
            ->get();

        $userAuditee = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditee']);
        })->get();

        $categoryUnit = CategoryUnit::all();

        $dokumenStandar=DokumenStandar::all();
        return view('admin.instrumentData.form', [
            'title' => $title,
            'categoryUnit' => $categoryUnit,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            'dokumenStandar'    => $dokumenStandar
            // 'documentStandard' => $documentStandard,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataInstrumentRequest $request)
    {
        DataInstrument::create([
            'auditor_id' => $request->auditor_id,
            'auditor2_id' => $request->auditor2_id,
            'auditee_id' => $request->auditee_id,
            'category_unit_id' => $request->category_unit_id,
            'status' => 'Menunggu Konfirmasi Kepala P4MP',
            'tanggal_audit' => $request->tanggal_audit,
            'dokumenStandar'  => $request->dokumenStandar
        ]);

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
        $title = 'Data Penetapan AMI';
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
        // $dokumenStandar=$dataInstrument->dokumenStandar;
        $dokumenStandar=DokumenStandar::oldest('file')->get();

        return view('admin.instrumentData.form',[
            'dataInstrument' => $dataInstrument,
            'title' => $title,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            'categoryUnit' => $categoryUnit,
            'instrument' => $instrument,
            'dokumenStandar'=> $dokumenStandar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=[
            'auditor_id' => $request->auditor_id,
            'auditee_id' => $request->auditee_id,
            'category_unit_id' => $request->category_unit_id,
            'status' => 'Menunggu Konfirmasi Kepala P4MP',
            'tanggal_audit' => $request->tanggal_audit,
            'dokumenStandar'  => $request->dokumenStandar
        ];

        DataInstrument::where('id', $id)->update($data);

        return redirect()->route('admin.data-instruments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataInstrument = DataInstrument::find($id);

        $dataInstrument->delete();

        return response()->json(['success','Data Berhasil Dihapus']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function indexKepalaP4mp(DataInstrument $dataInstrument)
    {
        $title = 'Konfirmasi Data Penetapan AMI';
        $dataInstrument=DataInstrument::with(['categoryUnit'])
        ->get();

        return view('kepalaP4mp.index', [
            'title' => $title,
            'dataInstrument'    =>  $dataInstrument
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function ApproveKepalaP4mp($id)
    {
        $title = 'Konfirmasi Data Penetapan AMI';
        $dataInstrument=DataInstrument::find($id);
        // dd($dataInstrument);

        return view('kepalaP4mp.approve',[
            'dataInstrument'    =>  $dataInstrument,
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatusDataInstrument(Request $request, $id)
    {
        $data =[
            'status'    => $request->status,
        ];

        DataInstrument::where('id', $id)->update($data);

        return redirect()->route('menu-p4mp.approval-data-ami');
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
