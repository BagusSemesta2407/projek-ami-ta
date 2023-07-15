<?php

namespace App\Http\Controllers;

use App\Http\Requests\PpppmpRequest;
use App\Http\Requests\PpppmpUpdateRequest;
use App\Models\Ppppmp;
use App\Models\User;
use Illuminate\Http\Request;

class PpppmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='P4MP';
        $ppppmp=Ppppmp::all();

        return view('P4MP.index',[
            'title' => $title,
            'ppppmp'=> $ppppmp
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'P4MP';
        return view('p4mp.form', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PpppmpRequest $request)
    {
        $user=User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt('12345678'),
        ]);

        $user->assignRole('P4MP');

        $data =[
            'user_id'   => $user->id,
            'jabatan'   => $request->jabatan,
        ];

        $ppppmp=Ppppmp::create($data);


        return redirect()->route('admin.p4mp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ppppmp $ppppmp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Auditor';
        $ppppmp=Ppppmp::find($id);
        return view('p4mp.form',[
            'ppppmp'=> $ppppmp,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ppppmp $ppppmp, $id)
    {
        dd($ppppmp);
        $dataP4mp = [
            'jabatan'=>$request->jabatan,
        ];

        $dataP4mp=Ppppmp::where('id', $ppppmp->id)->update($dataP4mp);
        dd($dataP4mp);
        User::where('id', $dataP4mp->user_id)->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
        ]);

        return redirect()->route('admin.p4mp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppppmp= Ppppmp::find($id);

        $ppppmp->delete();

        User::where('id', $ppppmp->user_id)->delete();
        return response()->json(['success','Data Berhasil Dihapus']);
    }
}
