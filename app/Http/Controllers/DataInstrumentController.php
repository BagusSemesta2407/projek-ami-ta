<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataInstrumentRequest;
use App\Models\Auditor;
use App\Models\CategoryUnit;
use App\Models\DataInstrument;
use App\Models\DocumentStandard;
use App\Models\DokumenStandar;
use App\Models\Instrument;
use App\Models\Jurusan;
use App\Models\Lingkup;
use App\Models\ProgramStudi;
use App\Models\Tujuan;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

        $userAuditor = Auditor::all();

        $countAuditor=DataInstrument::where('status', 'Selesai')
        ->where('auditor_id', [$userAuditor])
        ->orWhere('auditor2_id', [$userAuditor])
        ->where('status', 'Selesai')
        ->count();

        // $categoryUnit = CategoryUnit::all();

        $userAuditee = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditee']);
        })->get();
        $jurusan = Jurusan::all();
        $programStudi = ProgramStudi::all();
        $unit = Unit::all();

        $dokumenStandar = DokumenStandar::all();
        return view('admin.instrumentData.form', [
            'title' => $title,
            'userAuditor' => $userAuditor,
            'dokumenStandar'    => $dokumenStandar,
            'jurusan'           => $jurusan,
            'programStudi'      => $programStudi,
            'unit'              => $unit,
            'userAuditee'       => $userAuditee,
            'countAuditor'=>$countAuditor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataInstrumentRequest $request)
    {
        $dataInstrument = DataInstrument::create([
            'auditor_id' => $request->auditor_id,
            'auditor2_id' => $request->auditor2_id,
            'auditee_id' => $request->auditee_id,
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'kategori_audit' => $request->kategori_audit,
            'status' => 'Menunggu Konfirmasi Kepala P4MP',
            'tanggal_audit' => $request->tanggal_audit,
            'dokumenStandar'  => $request->dokumenStandar,
        ]);

        $tujuan = $request->deskripsi_tujuan;
        $lingkup = $request->deskripsi_lingkup;

        foreach ($tujuan as $value) {
            Tujuan::create([
                'data_instrument_id'    => $dataInstrument->id,
                'deskripsi_tujuan'  => $value,
            ]);
        }

        foreach ($lingkup as $key) {
            # code...
            Lingkup::create([
                'data_instrument_id'    => $dataInstrument->id,
                'deskripsi_lingkup' => $key
            ]);
        }
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
        $dataInstrument = DataInstrument::find($id);
        // $userAuditor = User::whereHas('roles', function ($q) {
        //     $q->whereIn('name', ['auditor']);
        // })
        //     ->get();

        
        $userAuditor = Auditor::all();

        $countAuditor=DataInstrument::where('status', 'Selesai')
        ->where('auditor_id', [$userAuditor])
        ->orWhere('auditor2_id', [$userAuditor])
        ->where('status', 'Selesai')
        ->count();

        // $categoryUnit = CategoryUnit::all();

        $userAuditee = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditee']);
        })->get();
        $jurusan = Jurusan::all();
        $programStudi = ProgramStudi::all();
        $unit = Unit::all();

        $dokumenStandar = DokumenStandar::all();

        return view('admin.instrumentData.form', [
            'dataInstrument' => $dataInstrument,
            'title' => $title,
            'userAuditor' => $userAuditor,
            'userAuditee' => $userAuditee,
            // 'categoryUnit' => $categoryUnit,
            // 'instrument' => $instrument,
            'jurusan' => $jurusan,
            'programStudi' =>$programStudi,
            'unit' => $unit,
            'countAuditor' => $countAuditor,
            'dokumenStandar' => $dokumenStandar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'auditor2_id' => $request->auditor2_id,
            'auditor_id' => $request->auditor_id,
            'auditee_id' => $request->auditee_id,
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'kategori_audit' => $request->kategori_audit,
            'status' => 'Menunggu Konfirmasi Kepala P4MP',
            'tanggal_audit' => $request->tanggal_audit,
            'dokumenStandar'  => $request->dokumenStandar
        ];

        // $dataInstrument = DataInstrument::where('id', $id)->update($data);
        $dataInstrument = DataInstrument::findOrFail($id);
        $dataInstrument->update($data);
        $tujuan = $request->deskripsi_tujuan;
        $lingkup = $request->deskripsi_lingkup;

        $dataInstrument->tujuan()->delete(); // Hapus semua tujuan audit yang ada sebelumnya
        $dataInstrument->lingkup()->delete(); // Hapus semua lingkup audit yang ada sebelumnya

        foreach ($tujuan as $value) {
            $dataInstrument->tujuan()->create([
                'deskripsi_tujuan' => $value
            ]);
        }

        foreach ($lingkup as $value) {
            $dataInstrument->lingkup()->create([
                'deskripsi_lingkup' => $value
            ]);
        }

        return redirect()->route('admin.data-instruments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataInstrument = DataInstrument::find($id);

        $dataInstrument->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }

    public function getJurusan($jurusanId)
    {
        $programStudi = ProgramStudi::where('jurusan_id', $jurusanId)->get();

        return response()->json($programStudi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function indexKepalaP4mp(DataInstrument $dataInstrument)
    {
        $title = 'Konfirmasi Data Penetapan AMI';
        $dataInstrument = DataInstrument::with(['categoryUnit'])
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
        $dataInstrument = DataInstrument::find($id);
        // dd($dataInstrument);

        return view('kepalaP4mp.approve', [
            'dataInstrument'    =>  $dataInstrument,
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatusDataInstrument(Request $request, $id)
    {
        $data = [
            'status'    => $request->status,
            'alasan_tolak' => $request->alasan_tolak
        ];

        DataInstrument::where('id', $id)->update($data);

        return redirect()->route('menu-p4mp.approval-data-ami');
    }

    public function getDataInstrumentId($id)
    {
        // return 'success';
        $instrument = Instrument::find($id);

        $filter = (object) [
            'jurusan_id' => $instrument->jurusan_id,
            'program_studi_id' => $instrument->program_studi_id,
            'unit_id' => $instrument->unit_id,
        ];

        $instrument = Instrument::filter($filter)
            ->where('status_ketercapaian', 'Tidak Tercapai')
            ->get();

        return response()->json($instrument);
    }

    public function getAuditee($id)
    {
        $user = User::find($id);

        $categoryUnit = CategoryUnit::where('id', $user->id)->get();

        return response()->json($categoryUnit);
    }

    public function getAuditor(Request $request)
    {
        $jurusanId = $request->input('jurusan_id');
        $programStudiId = $request->input('program_studi_id');
        $unit_id = $request->input('unit_id');

        $auditor = Auditor::where(function ($query) use ($jurusanId, $programStudiId) {
            $query->where('jurusan_id', '<>', $jurusanId)
                ->orWhere('program_studi_id', '<>', $programStudiId);
        })->get();
        return response()->json($auditor);
    }

    public function countAuditor($auditorId)
    {
        $countAuditor=DataInstrument::where('auditor_id', $auditorId)
        ->where('status', 'Selesai')
        ->count();

        return response()->json($countAuditor) ?? 0;
    }
}
