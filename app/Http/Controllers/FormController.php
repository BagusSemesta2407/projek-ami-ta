<?php

namespace App\Http\Controllers;

use App\Models\CategoryUnit;
use App\Models\Instrument;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Data From';
        $form = Instrument::all();
        return view('admin.form.index',[
            'title' =>  $title,
            'form'  =>  $form
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Pertanyaan';
        $categoryUnit=CategoryUnit::all();
        return view('admin.form.form',[
            'categoryUnit'  =>  $categoryUnit,
            'title'          =>  $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Instrument::create([
            'category_unit_id'  =>  $request->category_unit_id,
            'name'  =>  $request->name,
            'status_standar'    =>  $request->status_standar
        ]);

        return redirect()->route('admin.form.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrument $instrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument, $id)
    {
        $form=Instrument::find($id);

        return view('admin.form.form',[
            'form'  =>  $form
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

        return redirect()->route('admin.form.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form = Instrument::find($id);

        $form->delete();

        return redirect()->back();
    }
}
