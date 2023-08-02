<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentRequest;
use App\Models\CategoryUnit;
use App\Models\Instrument;
use App\Models\Jurusan;
use App\Models\ProgramStudi;
use App\Models\Unit;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instrument';
        $instrument = Instrument::with(['jurusan', 'programStudi', 'unit'])->get();

        return view('admin.instrument.index', [
            'title' => $title,
            'instrument' => $instrument,
        ]);
    }

    /**
     * Show the instrument for creating a new resource.
     */
    public function create()
    {
        $title = 'Instrument';
        $jurusan=Jurusan::all();
        $programStudi=ProgramStudi::all();
        $unit=Unit::all();

        return view('admin.instrument.form', [
            'title' => $title,
            'jurusan' => $jurusan,
            'programStudi' => $programStudi,
            'unit' => $unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Instrument::create([
            'kategori_audit_instrument' => $request->kategori_audit_instrument,
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'name' => $request->name,
            'target' => $request->target,
            'status_standar' => $request->status_standar,
        ]);

        return redirect()->route('admin.instrument.index')->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrument $instrument)
    {
        //
    }

    /**
     * Show the instrument for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Instrument';
        $instrument = Instrument::find($id);
        $jurusan=Jurusan::all();
        $programStudi=ProgramStudi::all();
        $unit=Unit::all();

        return view('admin.instrument.form', [
            'instrument' => $instrument,
            'title' => $title,
            'jurusan' => $jurusan,
            'programStudi' => $programStudi,
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'kategori_audit_instrument' => $request->kategori_audit_instrument,
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'name' => $request->name,
            'target' => $request->target,
            'status_standar' => $request->status_standar,
        ];

        Instrument::where('id', $id)->update($data);

        return redirect()->route('admin.instrument.index')->with('success', 'Data Instrument Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instrument = Instrument::find($id);

        $instrument->delete();

        return response()->json(['success','Data Berhasil Dihapus']);
    }
}
