<?php

namespace App\Http\Controllers;

use App\Models\DocumentStandard;
use Illuminate\Http\Request;

class DocumentStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Document Standard';
        $documentStandard=DocumentStandard::all();
        return view('admin.documentStandard.index',[
            'title' =>  $title,
            'documentStandard' => $documentStandard
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Data Document Standard AMI';
        return view('admin.documentStandard.form',[
            'title' =>  $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $documentStandard = new DocumentStandard();
        $documentStandard->save();

        if ($request->hasFile('file')) {
            $documentStandard->addMediaFromRequest('file')->toMediaCollection('documentStandard');
        }

        return redirect()->route('admin.document-standard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentStandard $documentStandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Document Standard';
        $documentStandard=DocumentStandard::findOrFail($id);
        $media=$documentStandard->getMedia('documentStandard');
        // dd($media);
        return view('admin.documentStandard.form',[
            'title' =>  $title,
            'documentStandard' => $documentStandard,
            'media' => $media,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $documentStandard= DocumentStandard::where('id',$id)->first();
        $documentStandard->save();

        if($request->hasFile('file')){
            $documentStandard->clearMediaCollection('documentStandard');
            $documentStandard->addMediaFromRequest('file')->toMediaCollection('documentStandard');
        }

        return redirect()->route('admin.document-standard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $documentStandard=DocumentStandard::find($id);

        $documentStandard->clearMediaCollection('documentStandard');

        $documentStandard->delete();

        return redirect()->back();
    }
}
