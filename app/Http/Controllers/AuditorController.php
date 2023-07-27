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

        $user=User::whereHas('roles', function($q){
            $q->whereIn('name', ['auditor']);
        })->get();

        return view('admin.auditor.form', [
            'title' => $title,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuditoreRequest $request)
    {
        $data =[
            'user_id'   => $request->user_id,
            'jabatan'   => $request->jabatan,
            'tugas'     =>  $request->tugas,
        ];

        $auditor=Auditor::create($data);


        return redirect()->route('admin.auditor.index')->with('success', 'Data Berhasil Ditambahkan!');

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
        $user=User::whereHas('roles', function($q){
            $q->whereIn('name', ['auditor']);
        })->get();
        return view('admin.auditor.form',[
            'auditor'=> $auditor,
            'title' => $title,
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuditorUpdateRequest $request, $id)
    {
        $data = [
            'jabatan'=>$request->jabatan,
            'tugas'=>$request->tugas,
        ];

        Auditor::where('id', $id)->update($data);


        return redirect()->route('admin.auditor.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
    {
        $auditor= Auditor::find($id);

        $auditor->delete();

        // User::where('id', $auditor->user_id)->delete();
        return response()->json(['success','Data Berhasil Dihapus']);

    }
}
