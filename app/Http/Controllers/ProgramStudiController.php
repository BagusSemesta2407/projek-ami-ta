<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramStudiRequest;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Program Studi';
        $programStudi=ProgramStudi::all();

        return view('programStudi.index', [
            'title'=> $title,
            'programStudi' => $programStudi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Program Studi';

        $jurusan = Jurusan::all();
        $jenjang=Jenjang::all();

        return view('programStudi.form', [
            'title'=>$title,
            'jurusan' => $jurusan,
            'jenjang' => $jenjang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramStudiRequest $request)
    {
        ProgramStudi::create([
            'jurusan_id'=> $request->jurusan_id,
            'jenjang_id' => $request->jenjang_id,
            'name' => $request->name
        ]);

        return redirect()->route('admin.program-studi.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title='Program Studi';

        $programStudi=ProgramStudi::find($id);
        $jurusan = Jurusan::all();
        $jenjang=Jenjang::all();

        return view('programStudi.form', [
            'title'=>$title,
            'jurusan' => $jurusan,
            'programStudi' => $programStudi,
            'jenjang' => $jenjang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'jurusan_id' => $request->jurusan_id,
            'jenjang_id' => $request->jenjang_id,
            'name' => $request->name
        ];

        ProgramStudi::where('id', $id)->update($data);

        return redirect()->route('admin.program-studi.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programStudi=ProgramStudi::find($id);

        $programStudi->delete();

        return response()->json(['success', 'Data Berhasil Dihapus!']);
    }

    
}
