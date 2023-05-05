<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use Illuminate\Http\Request;

class CategoryUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryUnit=CategoryUnit::all();
        return view('admin.categoryUnit.index',[
            'categoryUnit'  =>  $categoryUnit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoryUnit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CategoryUnit::create([
            'name'  => $request->name,
        ]);

        return dd($request->all());

        return redirect()->route('admin.category-unit.index')->with('succes','Data Berhasil Ditambahkan');
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
    public function edit(CategoryUnit $categoryUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryUnit $categoryUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryUnit $categoryUnit)
    {
        //
    }
}
