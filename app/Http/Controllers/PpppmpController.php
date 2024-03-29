<?php

namespace App\Http\Controllers;

use App\Http\Requests\PpppmpRequest;
use App\Http\Requests\PpppmpUpdateRequest;
use App\Models\P4MP;
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
        // $ppppmp=Ppppmp::all();
        $user=User::whereHas('roles',  function($q){
            $q->whereIn('name', ['P4MP']);
        })->get();

        return view('p4mp.index',[
            'title' => $title,
            'user'=> $user
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
        $user=User::find($id);
        return view('p4mp.form',[
            'user'=> $user,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user=User::where('id', $id)->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt('12345678'),
        ]);

        return redirect()->route('admin.p4mp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user= User::find($id);

        $user->delete();

        return response()->json(['success','Data Berhasil Dihapus']);
    }
}
