<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jenjang Program Studi';

        $jenjang=Jenjang::all();

        return view('jenjang.index', [
            'title' => $title,
            'jenjang' => $jenjang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Jenjang Program Studi';
        return view('jenjang.form',[
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jenjang::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.jenjang.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenjang $jenjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenjang=Jenjang::find($id);
        $title='Jenjang Program Studi';

        return view('jenjang.form',[
            'title' => $title,
            'jenjang' => $jenjang
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

        Jenjang::where('id', $id)->update($data);

        return redirect()->route('admin.jenjang.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenjang=Jenjang::find($id);

        $jenjang->delete();

        return response()->json(['success', 'Data Berhasil Dihapus!']);
    }
}
