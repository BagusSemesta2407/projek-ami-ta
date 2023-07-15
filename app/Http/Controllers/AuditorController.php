<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditoreRequest;
use App\Http\Requests\AuditorUpdateRequest;
use App\Models\Auditor;
use App\Models\User;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Auditor';
        $auditor=Auditor::all();

        return view('admin.auditor.index', [
            'auditor' => $auditor,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Auditor';
        return view('admin.auditor.form', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuditoreRequest $request)
    {
        $user=User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt('12345678'),
        ]);

        $user->assignRole('auditor');

        $data =[
            'user_id'   => $user->id,
            'jabatan'   => $request->jabatan,
            'tugas'     =>  $request->tugas,
        ];

        $auditor=Auditor::create($data);


        return redirect()->route('admin.auditor.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Auditor $auditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Auditor';
        // $auditor = Auditor::with(['user'])
        //     ->where('id', $id)
        //     ->first();
        $auditor=Auditor::find($id);
        return view('admin.auditor.form',[
            'auditor'=> $auditor,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuditorUpdateRequest $request, Auditor $auditor)
    {
        $data = [
            'jabatan'=>$request->jabatan,
            'tugas'=>$request->tugas,
        ];

        Auditor::where('id', $auditor->id)->update($data);

        User::whereId($auditor->user_id)->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
        ]);

        return redirect()->route('admin.auditor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $auditor= Auditor::find($id);

        $auditor->delete();

        User::where('id', $auditor->user_id)->delete();
        return response()->json(['success','Data Berhasil Dihapus']);

    }
}
