<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentRequest;
use App\Models\CategoryUnit;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instrument';
        $instrument = Instrument::with(['categoryUnit'])->get();

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
        $categoryUnit = CategoryUnit::all();

        return view('admin.instrument.form', [
            'categoryUnit' => $categoryUnit,
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstrumentRequest $request)
    {
        Instrument::create([
            'category_unit_id' => $request->category_unit_id,
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
        $categoryUnit = CategoryUnit::oldest('name')->get();

        return view('admin.instrument.form', [
            'instrument' => $instrument,
            'categoryUnit' => $categoryUnit,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'category_unit_id' => $request->category_unit_id,
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
