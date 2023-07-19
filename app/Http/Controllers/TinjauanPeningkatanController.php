<?php

namespace App\Http\Controllers;

use App\Models\DataInstrument;
use App\Models\DokumenStandar;
use App\Models\TinjauanPengendalian;
use App\Models\TinjauanPeningkatan;
use App\Models\TypeDokumenMutuStandar;
use Illuminate\Http\Request;

class TinjauanPeningkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Tinjauan Manajemen Peningkatan';
        $dataInstrument=DataInstrument::where('status', 'Selesai')->get();

        return view('tinjauanPeningkatan.index', [
            'title' => $title,
            'dataInstrument'    => $dataInstrument
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataTinjauanPeningkatan($id)
    {
        $title='Tinjauan Manajemen Peningkatan';
        $dataInstrument=DataInstrument::find($id);

        $tinjauanPengendalian=TinjauanPengendalian::with(['auditLapangan.auditDokumen.evaluasiDiri'])
        ->whereHas('auditLapangan.auditDokumen.evaluasiDiri', function($q) use ($dataInstrument){
            $q->where('data_instrument_id', $dataInstrument->id);
        })->get();

        return view('tinjauanPeningkatan.dataTinjauanPeningkatan',[
            'title' =>$title,
            'tinjauanPengendalian'=> $tinjauanPengendalian
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createTinjauanPeningkatan($id)
    {
        $title='Tinjauan Manajemen Peningkatan';
        $tinjauanPengendalian=TinjauanPengendalian::find($id);
        $tinjauanPeningkatan=TinjauanPeningkatan::where('tinjauan_pengendalian_id', $id)->first();
        $typeDokumenMutuStandar=TypeDokumenMutuStandar::oldest('name')->get();

        // $statusInstrument=$tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->status_ketercapaian;

        return view('tinjauanPeningkatan.form',[
            'title'=>$title,
            'tinjauanPengendalian'=>$tinjauanPengendalian,
            'typeDokumenMutuStandar'=> $typeDokumenMutuStandar,
            'tinjauanPeningkatan'=>$tinjauanPeningkatan
            // 'statusInstrument'  => $statusInstrument
        ]);
    }   

    /**
     * Display the specified resource.
     */
    public function storeTinjauanPengendalian(Request $request, $tinjauanPengendalian)
    {
        $file=DokumenStandar::saveFile($request);
        $dataDokumenStandar = [
            'type_dokumen_mutu_standar_id'=>$request->type_dokumen_mutu_standar_id,
            'file'=> $file
        ];

        $dokumenStandar=DokumenStandar::create($dataDokumenStandar);

        $dataTinjauanPeningkatan = [
            'dokumen_standar_id'=> $dokumenStandar->id,
            'tinjauan_pengendalian_id'=>$tinjauanPengendalian
        ];

        TinjauanPeningkatan::create($dataTinjauanPeningkatan);

        return redirect()->route('menu-p4mp.index-tinjauan-peningkatan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function updateTinjauanPengendalian(Request $request, $tinjauanPengendalian, $tinjauanPeningkatan)
    {
        // $dataTinjauanPengendalian=TinjauanPengendalian::findOrFail($tinjauanPengendalian);

        // $dataTinjauanPeningkatan=TinjauanPeningkatan::where('dokumen_standar_id', $)
        // $dataDokumenStandar= [
        //     'type_dokumen_mutu_standar_id'=>$request->type_dokumen_mutu_standar_id,
        // ];

        // $dataTinjauanPeningkatan = [
        //     'dokumen_standar_id'=> $dokumenStandar->id,
        //     'tinjauan_pengendalian_id'=>$tinjauanPengendalian
        // ];

        // $file=DokumenStandar::saveFile($request);

        // if ($file) {
        //     $data['file'] =$file;
        //     DokumenStandar::deleteFile($dokumenStandar);
        // }

        // $dokumenStandar=DokumenStandar::where('id', $auditDokumen)->update($dataDokumenStandar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TinjauanPeningkatan $tinjauanPeningkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinjauanPeningkatan $tinjauanPeningkatan)
    {
        //
    }
}
