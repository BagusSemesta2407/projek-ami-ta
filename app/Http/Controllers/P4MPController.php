<?php

namespace App\Http\Controllers;

use App\Models\P4MP;
use App\Models\User;
use Illuminate\Http\Request;

class P4MPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='P4MP';
        $p4MP=P4MP::all();

        return view('P4MP.index',[
            'title' => $title,
            'p4MP' => $p4MP
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
    public function store(Request $request)
    {
        $user=User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt('12345678'),
        ]);

        $user->assignRole('p4mp');

        $data =[
            'user_id'   => $user->id,
            'jabatan'   => $request->jabatan,
        ];

        $p4MP=P4MP::create($data);


        return redirect()->route('admin.p4mp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(P4MP $p4MP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'P4MP';
        $p4MP=P4MP::findOrFail($id);

        return view('p4mp.form',[
            'p4MP'=> $p4MP,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, P4MP $p4MP)
    {
        dd($p4MP);
        $data = [
            'jabatan'=>$request->jabatan,
        ];

        P4MP::where('id', $p4MP->id)->update($data);
        User::whereId($p4MP->user_id)->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
        ]);


        return redirect()->route('admin.p4mp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(P4MP $p4MP)
    {
        //
    }
}