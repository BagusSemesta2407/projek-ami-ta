<?php

namespace App\Http\Controllers;

use App\Models\RisalahRapat;
use App\Models\Topic;
use Illuminate\Http\Request;
use PDF;


class RapatTinjauanManajemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Rapat Tinjauan Manajemen';
        $risalahRapat = RisalahRapat::all();
        return view('rtm.index', [
            'title' => $title,
            'risalahRapat' => $risalahRapat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Rapat Tinjauan Manajemen';

        return view('rtm.form', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        RisalahRapat::create([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda
        ]);

        return redirect()->route('menu-p4mp.rapat-tinjauan-manajemen.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RisalahRapat $risalahRapat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Rapat Tinjauan Manajemen';
        $risalahRapat = RisalahRapat::find($id);

        return view('rtm.form', [
            "title"     =>  "$title",
            'risalahRapat' => $risalahRapat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
        ];

        RisalahRapat::where('id', $id)->update($data);

        return redirect()->route('menu-p4mp.rapat-tinjauan-manajemen.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RisalahRapat $risalahRapat)
    {
        //
    }

    public function inputTopic($id)
    {
        $title = 'Rapat Tinjauan Manajemen';
        $risalahRapat = RisalahRapat::find($id);
        $topic = Topic::where('risalah_rapat_id', $risalahRapat->id)->get();

        return view('rtm.topic.form', [
            'title' => $title,
            'risalahRapat' => $risalahRapat,
            'topic' => $topic
        ]);
        // $topic=Topic::where('')
    }

    public function storeTopic(Request $request, $risalahRapatId)
    {
        foreach ($request->topik_diskusi as $index => $topik) {
            Topic::create(
                [
                    'risalah_rapat_id' => $risalahRapatId,
                    'topik_diskusi' => $topik,
                    'deskripsi' => $request->deskripsi[$index]
                ]
            );
        }


        return redirect()->route('menu-p4mp.rapat-tinjauan-manajemen.index')->with('success', 'Data Berhasil Diinput!!');
    }

    public function updateTopic(Request $request, $id)
    {
        $risalahRapat = RisalahRapat::findOrFail($id);
        $risalahRapat->topic()->delete();

        foreach ($request->topik_diskusi as $index => $topik) {
            # code...
            $risalahRapat->topic()->create([
                'risalah_rapat_id' => $id,
                'topik_diskusi' => $topik,
                'deskripsi' => $request->deskripsi[$index]
            ]);
        }

        return redirect()->route('menu-p4mp.rapat-tinjauan-manajemen.index')->with('success', 'Data Berhasil Diinput!!');
    }

    public function cetakRTM($id)
    {
        $risalahRapat=RisalahRapat::find($id);
        $topic=Topic::where('risalah_rapat_id', $risalahRapat->id)->get();

        $pdf = PDF::loadView(
            'rtm.cetak', 
        [
            'risalahRapat' => $risalahRapat,
            'topic'=> $topic
        ])->setPaper('A4', 'potrait');

        return $pdf->stream();
    }
}
