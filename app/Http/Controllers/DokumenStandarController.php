<?php

namespace App\Http\Controllers;

use App\Models\DokumenStandar;
use App\Models\TypeDokumenMutuStandar;
use Illuminate\Http\Request;

class DokumenStandarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Dokumen Standar';
        $dokumenStandar=DokumenStandar::with(['typeDokumenMutuStandar'])->get();
        return view('dokumenStandar.index',[
            'title'=>$title,
            'dokumenStandar'=> $dokumenStandar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Dokumen Standar';
        $typeDokumenMutuStandar=TypeDokumenMutuStandar::oldest('name')->get();
        return view('dokumenStandar.form',[
            'title' => $title,
            'typeDokumenMutuStandar'   => $typeDokumenMutuStandar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file=DokumenStandar::saveFile($request);
        DokumenStandar::create([
            'type_dokumen_mutu_standar_id'  => $request->type_dokumen_mutu_standar_id,
            'file'  =>$file
        ]);

        return redirect()->route('admin.dokumen-standar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DokumenStandar $dokumenStandar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title='Dokumen Standar';
        $dokumenStandar=DokumenStandar::find($id);
        $typeDokumenMutuStandar=TypeDokumenMutuStandar::oldest('name')->get();

        return view('dokumenStandar.form',[
            'title'=>$title,
            'dokumenStandar'=> $dokumenStandar,
            'typeDokumenMutuStandar'=>$typeDokumenMutuStandar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=[
            'type_dokumen_mutu_standar_id'  => $request->type_dokumen_mutu_standar_id
        ];

        $file=DokumenStandar::saveFile($request);

        if ($file) {
            $data['file'] =$file;
            DokumenStandar::deleteFile($id);
        }

        DokumenStandar::where('id', $id)->update($data);

        return redirect()->route('admin.dokumen-standar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokumenStandar=DokumenStandar::find($id);

        DokumenStandar::deleteFile($id);

        $dokumenStandar->delete();

        return response()->json(['success','Data Berhasil Dihapus']);
    }
}
