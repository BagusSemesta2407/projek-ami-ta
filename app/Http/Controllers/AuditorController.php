<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditoreRequest;
use App\Http\Requests\AuditorUpdateRequest;
use App\Models\Auditor;
use App\Models\Jurusan;
use App\Models\ProgramStudi;
use App\Models\Unit;
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
        $auditor = Auditor::all();

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

        $user = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditor']);
        })
        ->whereNotIn('id', Auditor::pluck('user_id')->toArray())
        ->get();

        $jurusan=Jurusan::all();
        $programStudi=ProgramStudi::all();
        $unit=Unit::all();

        return view('admin.auditor.form', [
            'title' => $title,
            'user' => $user,
            'jurusan'=> $jurusan,
            'programStudi'=>$programStudi,
            'unit'=>$unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuditoreRequest $request)
    {
        if ($request->jabatan === 'ketua') {
            // Jika "ketua" sudah ada, maka tambah data tidak diperbolehkan
            $existingKetua = Auditor::where('jabatan', 'ketua')->first();
            if ($existingKetua) {
                return redirect()->back()->with('error', 'Tidak dapat menambahkan lebih dari satu ketua.');
            }
        }

        $file=Auditor::saveFile($request);
        $data = [
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'user_id'   => $request->user_id,
            'jabatan'   => $request->jabatan,
            'tugas'     =>  $request->tugas,
            'file' => $file
        ];

        $auditor = Auditor::create($data);

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
        $auditor = Auditor::find($id);
        $user = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['auditor']);
        })->get();

        $jurusan=Jurusan::all();
        $programStudi=ProgramStudi::all();
        $unit=Unit::all();
        return view('admin.auditor.form', [
            'auditor' => $auditor,
            'title' => $title,
            'user' => $user,
            'jurusan'=> $jurusan,
            'programStudi'=>$programStudi,
            'unit'=>$unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuditorUpdateRequest $request, $id)
    {
        $data = [
            'jurusan_id' => $request->jurusan_id,
            'program_studi_id' => $request->program_studi_id,
            'unit_id' => $request->unit_id,
            'user_id'   => $request->user_id,
            'jabatan'   => $request->jabatan,
            'tugas'     =>  $request->tugas,
        ];

        $file=Auditor::saveFile($request);

        if ($file) {
            $data['file']=$file;
            Auditor::deleteFile($id);
        }

        Auditor::where('id', $id)->update($data);


        return redirect()->route('admin.auditor.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $auditor = Auditor::find($id);

        $auditor->delete();

        // User::where('id', $auditor->user_id)->delete();
        return response()->json(['success', 'Data Berhasil Dihapus']);
    }

    public function getJurusan($jurusanId)
    {
        $programStudi=ProgramStudi::where('jurusan_id', $jurusanId)->get();

        return response()->json($programStudi);
    }
}
