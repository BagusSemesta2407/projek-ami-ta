<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUnitRequest;
use App\Models\CategoryUnit;
use Illuminate\Http\Request;

class CategoryUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Unit Kerja';

        $categoryUnit = CategoryUnit::all();
        return view('admin.categoryUnit.index', [
            'categoryUnit'  =>  $categoryUnit,
            'title'     =>  $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Data Unit Kerja';
        return view('admin.categoryUnit.form', [
            'title' =>  $title,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryUnitRequest $request)
    {
         CategoryUnit::create([
            'name'  => $request->name,
        ]);

        // return dd($request->all());
        return redirect()->route('admin.category-unit.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryUnit $categoryUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Form Data Unit Kerja';
        $categoryUnit = CategoryUnit::find($id);

        return view('admin.categoryUnit.form', [
            'categoryUnit'  => $categoryUnit,
            'title'     =>  $title
        ]);

        // return response()->json($categoryUnit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
        ];

        CategoryUnit::where('id', $id)->update($data);

        return redirect()->route('admin.category-unit.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryUnit=CategoryUnit::find($id);

        $categoryUnit->delete();
        return redirect()->back();
    }
}
