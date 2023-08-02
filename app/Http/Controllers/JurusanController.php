<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Jurusan';
        $jurusan = Jurusan::all();

        return view('jurusan.index', [
            'title' => $title,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title= 'Jurusan';
        
        return view('jurusan.form', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurusanRequest $request)
    {
        Jurusan::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title='Jurusan';
        $jurusan =Jurusan::find($id);

        return view('jurusan.form', [
            'title' =>$title,
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
        ];

        Jurusan::where('id', $id)->update($data);

        return redirect()->route('admin.jurusan.index')->with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);

        $jurusan->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
