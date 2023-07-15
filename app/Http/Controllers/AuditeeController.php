<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditeeRequest;
use App\Http\Requests\AuditeeUpdateRequest;
use App\Models\Auditee;
use App\Models\User;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Auditee';
        $auditee = User::role('auditee')->get();

        return view('admin.auditee.index', [
            'auditee' => $auditee,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Auditee';
        return view('admin.auditee.form',[
            "title" => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuditeeRequest $request)
    {
        $auditee=User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt('12345678'),
        ]);

        $auditee->assignRole('auditee');

        return redirect()->route('admin.auditee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auditee $auditee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Auditor';
        $auditee=User::find($id);
        return view('admin.auditee.form',[
            'auditee'=> $auditee,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id', $id)->update($data);
        return redirect()->route('admin.auditee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
