<?php

namespace App\Http\Controllers;

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
        $user = User::role('auditee')->get();

        return view('admin.auditee.index', [
            'user' => $user,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Auditee $auditee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auditee $auditee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auditee $auditee)
    {
        //
    }
}
