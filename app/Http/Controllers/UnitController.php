<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Unit';

        $unit =Unit::all();

        return view('unit.index', [
            'title' => $title,
            'unit'=> $unit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Unit';

        return view('unit.form', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.unit.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title='Unit';
        $unit=Unit::find($id);

        return view('unit.form', [
            'title' => $title,
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name
        ];

        Unit::where('id', $id)->update($data);

        return redirect()->route('admin.unit.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit=Unit::find($id);

        $unit->delete();

        return response()->json(['success', 'Data Berhasil Diubah!']);
    }
}
