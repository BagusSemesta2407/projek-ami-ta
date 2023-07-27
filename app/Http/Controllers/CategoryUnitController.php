<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUnitRequest;
use App\Http\Requests\CategoryUnitUpdateRequest;
use App\Models\CategoryUnit;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Unit Kerja';

        $categoryUnit = CategoryUnit::all();

        return view('admin.categoryUnit.index', [
            'categoryUnit' => $categoryUnit,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Unit Kerja';

        $user=User::whereHas('roles', function($q){
            $q->whereIn('name',['auditee']);
        })->get();

        return view('admin.categoryUnit.form', [
            'title' => $title,
            'user'  => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryUnitRequest $request)
    {
        // $user=User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt('12345678')
        // ]);

        // $user->assignRole('auditee');

        CategoryUnit::create([
            'user_id'=>$request->user_id,
            'name' => $request->name,
            'kategori_audit'    => $request->kategori_audit,
            'kepala'    => $request->kepala
        ]);

        return redirect()->route('admin.category-unit.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryUnit $categoryUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Form Data Unit Kerja';
        $categoryUnit = CategoryUnit::findOrFail($id);

        return view('admin.categoryUnit.form', [
            'categoryUnit' => $categoryUnit,
            'title' => $title,
        ]);

        // return response()->json($categoryUnit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUnitUpdateRequest $request, CategoryUnit $categoryUnit)
    {
        $data = [
            'user_id'=>$request->user_id,
            'name' => $request->name,
            'kategori_audit'    => $request->kategori_audit,
            'kepala'    => $request->kepala
        ];

        CategoryUnit::where('id', $categoryUnit->id)->update($data);

        // User::whereId($categoryUnit->user_id)->update([
        //     'name'  =>$request->name,
        //     'email'=>$request->email,
        // ]);


        return redirect()->route('admin.category-unit.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryUnit = CategoryUnit::find($id);

        $categoryUnit->delete();

        // return redirect()->back();
        User::where('id', $categoryUnit->user_id)->delete();

        return response()->json(['success','Data Berhasil Dihapus']);
    }
}
