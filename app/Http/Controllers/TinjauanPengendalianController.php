<?php

namespace App\Http\Controllers;

use App\Models\AuditLapangan;
use App\Models\DataInstrument;
use App\Models\Kesimpulan;
use App\Models\TinjauanPengendalian;
use Illuminate\Http\Request;

class TinjauanPengendalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tinjauan Manajemen Pengendalian';
        $dataInstrument = DataInstrument::where('status', 'Selesai')
            ->get();

        return view('tinjauanPengendalian.index', [
            'title' => $title,
            'dataInstrument' => $dataInstrument
        ]);
    }

    /**
     * Show the form for dataTinjauanPengendalian a new resource.
     */
    public function dataTinjauanPengendalian($id)
    {
        $title = 'Tinjauan Pengendalian';
        $dataInstrument = DataInstrument::find($id);
        $auditLapangan = AuditLapangan::with(['auditDokumen.evaluasiDiri'])
            ->whereHas('auditDokumen.evaluasiDiri', function ($q) use ($dataInstrument) {
                $q->where('data_instrument_id', $dataInstrument->id);
            })->get();
        $auditLapanganID = $auditLapangan->pluck('id');
        $tinjauanPengendalian = TinjauanPengendalian::whereIn('audit_lapangan_id', $auditLapanganID)->get();

        return view('tinjauanPengendalian.dataTinjauanPengendalian', [
            'title' => $title,
            'auditLapangan' => $auditLapangan,
            'dataInstrument' => $dataInstrument,
            'tinjauanPengendalian' => $tinjauanPengendalian
        ]);
    }

    /**
     * Store a newly createTinjauanPengendalian resource in storage.
     */
    public function createTinjauanPengendalian($id)
    {
        $title = 'Tinjauan Pengendalian';
        $auditLapangan = AuditLapangan::find($id);
        $tinjauanPengendalian = TinjauanPengendalian::where('audit_lapangan_id', $id)->first();

        return view('tinjauanPengendalian.form', [
            'title' => $title,
            'auditLapangan' => $auditLapangan,
            'tinjauanPengendalian' => $tinjauanPengendalian
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function storeTinjauanPengendalian(Request $request, $dataInstrumentId)
    {
        $dataInstrument = DataInstrument::find($dataInstrumentId);
        $data = $request->input('data', []);

        foreach ($data as $key => $value) {
            $dataTinjauanPengendalian = [
                'important' => $value['important'],
                'urgent' => $value['urgent'],
                'anggaran' => $value['anggaran'],
                'rencana_tindak_lanjut' => $value['rencana_tindak_lanjut'],
                'deskripsi_important' => $value['deskripsi_important'],
                'deskripsi_urgent' => $value['deskripsi_urgent'],
                'jumlah_anggaran' => $value['jumlah_anggaran'],
            ];

            TinjauanPengendalian::updateOrCreate(
                [
                    'audit_lapangan_id' => $key,
                ],
                $dataTinjauanPengendalian
            );
        }

        foreach ($request->kelebihan as $index => $kelebihan) {
            $dokumentasi = null;

            // Periksa apakah ada file dokumentasi yang diunggah
            if ($request->hasFile('dokumentasi') && $request->file('dokumentasi')[$index]) {
                $dokumentasi = Kesimpulan::saveDokumentasi($request->file('dokumentasi')[$index]);
            }

            // Simpan data ke database menggunakan metode create
            $dataKesimpulan = Kesimpulan::create([
                'data_instrument_id' => $dataInstrumentId,
                'kelebihan' => $kelebihan,
                'kesimpulan' => $request->kesimpulan[$index],
                'dokumentasi' => $dokumentasi,
            ]);
        }

        return redirect()->route('menu-p4mp.index-tinjauan-pengendalian');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateTinjauanPengendalian(Request $request, $auditLapangan, $tinjauanPengendalian)
    {
        $dataAuditLapangan = AuditLapangan::findOrFail($auditLapangan);

        $data = [
            'audit_lapangan_id' => $auditLapangan,
            'important' => $request->important,
            'urgent'    => $request->urgent,
            'anggaran'  => $request->anggaran,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'deskripsi_important' => $request->deskripsi_important,
            'deskripsi_urgent' => $request->deskripsi_urgent,
        ];

        TinjauanPengendalian::where('id', $tinjauanPengendalian)->update($data);

        return redirect()->route('menu-p4mp.index-tinjauan-pengendalian');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TinjauanPengendalian $tinjauanPengendalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinjauanPengendalian $tinjauanPengendalian)
    {
        //
    }

    public function createKesimpulan($id)
    {
        $title = 'Kesimpulan';
        $dataInstrument = DataInstrument::find($id);

        return view('admin.instrumentData.kesimpulan.form', [
            "title"         => $title,
            "dataInstrument" => $dataInstrument
        ]);
    }

    public function storeKesimpulan(Request $request, $dataInstrumenID)
    {
        // $file = $request->dokumentasi;
        // // $dokumentasi=
        // foreach ($file as $index => $value) {
        //     Kesimpulan::updateOrCreate(
        //         [
        //             'data_instrument_id' => $dataInstrumenID
        //         ],
        //         [
        //             'kelebihan' => $request->kelebihan[$index], // Access kelebihan using $index
        //             'kesimpulan' => $request->kesimpulan[$index], // Access kesimpulan using $index
        //             'dokumentasi' => Kesimpulan::saveDokumentasi($value)
        //         ]
        //     );
        // }

        return redirect()->route('menu-p4mp.index-tinjauan-pengendalian');
    }
}
