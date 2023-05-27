<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentRequest;
use App\Models\CategoryUnit;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class InstrumentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instrument';
        $instrument = Instrument::with(['categoryUnit'])->get();
        return view('admin.instrument.index',[
            'title' =>  $title,
            'instrument'  =>  $instrument
        ]);
    }

    /**
     * Show the instrument for creating a new resource.
     */
    public function create()
    {
        $title = 'Pertanyaan';
        $categoryUnit=CategoryUnit::all();
        return view('admin.instrument.form',[
            'categoryUnit'  =>  $categoryUnit,
            'title'          =>  $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstrumentRequest $request)
    {
        Instrument::create([
            'category_unit_id'  =>  $request->category_unit_id,
            'name'  =>  $request->name,
            'status_standar'    =>  $request->status_standar
        ]);

        return redirect()->route('admin.instrument.index')->with('success', 'Data Instrument Berhasil Ditambahkan');
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
        $title = 'Form Edit Instrument';
        $instrument=Instrument::find($id);
        $categoryUnit=CategoryUnit::oldest('name')->get();

        return view('admin.instrument.form',[
            'instrument'  =>  $instrument,
            'categoryUnit' => $categoryUnit,
            'title' =>  $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'category_unit_id'  =>  $request->category_unit_id,
            'name'  =>  $request->name,
            'status_standar'    =>  $request->status_standar
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

        return redirect()->back();
    }

    //FUNGSI INI AKAN DIGUNAKAN UNTUK INSTRUMENT DETAIL, JADI BLADE INSTRUEMENT YANG SUDAH DIBUAT AKAN DIRUBAH MENJADI INSTRUMENT DETAIL
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     $title = 'Instrument';
    //     $categoryUnit = CategoryUnit::oldest('name')->get();

    //     return view('admin.instrument.index', [
    //         'title' => $title,
    //         'categoryUnit' => $categoryUnit
    //     ]);
    // }

    // /**
    //  * Display a listing of the resource.
    //  * 
    //  */
    // public function indexStandarInstrument($id, $status_standar = null)
    // {
    //     $title = 'Instrument';
    //     $categoryUnit = CategoryUnit::find($id);

    //     $filter= (object) [
    //         'category_unit_id' => $categoryUnit->id,
    //         'status_standar'    => $status_standar
    //     ];

    //     $instrument = Instrument::filter($filter)
    //     ->get();
        
    //     return view('admin.instrument.standarInstrument.index', [
    //         'title' => $title,
    //         'instrument' => $instrument,
    //         'categoryUnit' => $categoryUnit,
    //         'status_standar'=>$status_standar
    //     ]);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $title = 'Form Instrument';

    //     // $categoryUnit=CategoryUnit::where('id')
    //     // ->get();
    //     // $categoryUnit=CategoryUnit::find('id ');
    //     // dd($categoryUnit);

    //     return view('admin.instrument.standarInstrument.form',[
    //         'title' => $title,
    //         // 'categoryUnit' => $categoryUnit
    //     ]);
    // }
    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function createFormInstrument($id)
    // {
    //     $title = 'Form Instrument';
    //     $categoryUnit = CategoryUnit::find($id);

    //     return view('admin.instrument.standarInstrument.form',[
    //         'title' => $title,
    //         'categoryUnit' => $categoryUnit,
    //         // 'instrument'    =>$instrument
    //     ]);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function storeFormInstrument(Request $request, $id)
    // {
    //     Instrument::create([
    //         'category_unit_id' => $id,
    //         'name'      =>  $request->name,
    //         'status_standar'    =>  $request->status_standar
    //     ]);

    //     return redirect()->route('admin.instrument.list-instrument-standard', $id);
    // }

    // public function store(Request $request)
    // {
    //     // $categoryUnit=Instrument::where('category')
    //     // $categoryUnit=CategoryUnit::where('id', $id)->first();
    //     // $categoryUnit =CategoryUnit::where('id', $id)->get();

    //     Instrument::create([
    //         // 'category_unit_id' => $categoryUnit->id,
    //         'name'  =>  $request->name,
    //         'status_standar'    =>  $request->status_standar
    //     ]);
    //     dd($request->all());

    //     // Instrument::create([
    //     //     // 'category_unit_id'=>$categoryUnit,
    //     //     'status_standar' => 'Pendidikan',
    //     //     'name'  =>  $request->name,
    //     // ]);

    //     // dd($request->all());

    //     // return redirect()->route('admin.instrument.list-instrument-standard');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Instrument $instrument)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit($id)
    // {
    //     $instrument=Instrument::find($id);

    //     return view('admin.instrument.standarInstrument.index',[
    //         'instrument'    =>  $instrument
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Instrument $instrument)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Instrument $instrument)
    // {
    //     //
    // }
}
