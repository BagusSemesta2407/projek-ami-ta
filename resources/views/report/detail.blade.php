@extends('layouts.base')

@section('content')
    <style>
        .page-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            margin-bottom: .0001pt;
            font-size: 16px
        }

        table,
        tr,
        td {
            border-collapse: collapse;
            border: none;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 15px;
        }

        h3 {
            font-size: 16px;
        }
    </style>
    <!-- Main Content -->
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                LAPORAN AUDIT MUTU INTERNAL
            </div>
            <div class="page-header">
                LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT
            </div>
            <div class="page-header">
                POLITEKNIK NEGERI SUBANG
            </div>
            <br>
            <div class="container">
                <h3>I. IDENTITAS</h3>
                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none'>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>Nama Instansi</span></b>
                            </p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border:solid windowtext 1.0pt; border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>Politeknik
                                    Negeri Subang</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>Unit</span></b></p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $dataInstrument->categoryUnit->name }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $dataInstrument->categoryUnit->kepala }}</span></b>
                            </p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>kepala</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>Tanggal
                                        Audit</span></b></p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>
                                    {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}
                                </span></p>
                        </td>
                    </tr>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt; border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>Auditor 1</span></b>
                            </p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $dataInstrument->auditor->name }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width=198 valign=top
                            style='width:148.6pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>Auditor 2</span></b>
                            </p>
                        </td>
                        <td width=425 valign=top
                            style='width:318.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $dataInstrument->auditor2->name }}</span>
                            </p>
                        </td>
                    </tr>
                </table>
                <br>
                <h3>II. Tujuan Audit Mutu Internal</h3>
                <table>
                    @foreach ($dataInstrument->tujuan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->deskripsi_tujuan }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <h3>III. Lingkup Audit Mutu Internal</h3>
                <table>
                    @foreach ($dataInstrument->lingkup as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->deskripsi_lingkup }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <h3>IV. HASIL AMI</h3>
                {{-- <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=803
                    style='width:602.2pt;border-collapse:collapse;border:none'>
                    <tr>
                        <td width=32 valign=top
                            style='width:23.75pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>No</b>
                        </td>
                        <td width=94 valign=top
                            style='width:70.35pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Standar SPMI </b>
                        </td>
                        <td width=233 valign=top
                            style='width:175.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Instrument/
                                Butir Mutu</b>
                        </td>
                        <td width=189 valign=top
                            style='width:5.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Indikator dan
                                Target</b>
                        </td>
                        <td width=94 valign=top
                            style='width:70.85pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Status Ketercapaian</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Hasil
                                Evaluasi Diri</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Bukti dan Catatan</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Hasil Audit Dokumen dan Daftar Tilik Auditor 1</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Hasil Audit Dokumen dan Daftar Tilik Auditor 2</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Hasil Temuan Audit</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Status Temuan</b>
                        </td>
                        <td width=161 valign=top
                            style='width:120.5pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <b class=MsoNormal style='margin-bottom:0cm;line-height:normal'>Rekomendasi</b>
                        </td>
                    </tr>
                    <tr>
                        @foreach ($auditLapangan as $item)
                            <td width=32 valign=top
                                style='width:23.75pt;border:solid windowtext 1.0pt;
                        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $loop->iteration }}</p>
                            </td>
                            <td width=94 valign=top
                                style='width:70.35pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->instrument->status_standar }}</p>
                            </td>
                            <td width=233 valign=top
                                style='width:175.0pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->instrument->name }}</p>
                            </td>
                            <td width=189 valign=top
                                style='width:5.0cm;border-top:none;border-left:none;
                        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->instrument->target }}</p>
                            </td>
                            <td width=94 valign=top
                                style='width:70.85pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->status_ketercapaian }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}</p>
                            </td>

                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <a href="{{ $item->auditDokumen->evaluasiDiri->bukti }}">{{ $item->auditDokumen->evaluasiDiri->bukti }}</a>
                                <br>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ $item->auditDokumen->evaluasiDiri->catatan }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ strip_tags($item->auditDokumen->deskripsi_auditor_1) }}</p>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b>Daftar Tilik :</b>{{ strip_tags($item->auditDokumen->daftar_tilik_auditor_1) }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ strip_tags($item->auditDokumen->deskripsi_auditor_2) }}</p>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b>Daftar Tilik :</b>{{ strip_tags($item->auditDokumen->daftar_tilik_auditor_2) }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ strip_tags($item->hasil_temuan_audit) }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ strip_tags($item->auditDokumen->evaluasiDiri->instrument->status_ketercapaian) }}</p>
                            </td>
                            <td width=161 valign=top
                                style='width:120.5pt;border-top:none;border-left:
                        none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                        padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>{{ strip_tags($item->rekomendasi) }}</p>
                            </td>
                        @endforeach
                    </tr>
                </table> --}}
                <table class="table align-items-center mb-0" id="example">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Standar SPMI
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Instrument/Butir Mutu
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Indikator dan Target
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Status Ketercapaian
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Hasil Evaluasi Diri
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Bukti
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Hasil Audit Dokumen dan Daftar Tilik Auditor 1
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Hasil Audit Dokumen dan Daftar Tilik Auditor 2
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Visitasi Lapangan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Status Temuan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                Rekomendasi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditLapangan as $value)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $value->auditDokumen->evaluasiDiri->instrument->status_standar }}
                                </td>
                                <td>
                                    {{ $value->auditDokumen->evaluasiDiri->instrument->name }}
                                </td>
                                <td>
                                    {{ $value->auditDokumen->evaluasiDiri->instrument->target }}
                                </td>
                                <td>
                                    {{ $value->auditDokumen->evaluasiDiri->status_ketercapaian }}
                                </td>

                                <td>
                                    {{ strip_tags($value->auditDokumen->evaluasiDiri->deskripsi_ketercapaian) }}
                                </td>
                                <td>
                                    {{-- {{ strip_tags($value->anggaran)}} --}}
                                    <a href="{{ $value->auditDokumen->evaluasiDiri->bukti }}">
                                        {{ $value->auditDokumen->evaluasiDiri->bukti }}
                                    </a>

                                    <div class="mt-3">
                                        Catatan : {{ strip_tags($value->auditDokumen->evaluasiDiri->catatan) }}
                                    </div>
                                </td>
                                <td>
                                    {{ strip_tags($value->auditDokumen->deskripsi_auditor_1) }}
                                    <div class="mt-3">
                                        Daftar Tilik : {{ strip_tags($value->auditDokumen->daftar_tilik_auditor_1) }}
                                    </div>
                                </td>
                                <td class="text-align-middle">
                                    {{ strip_tags($value->auditDokumen->deskripsi_auditor_2) }}
                                    <div class="mt-3">
                                        Daftar Tilik : {{ strip_tags($value->auditDokumen->daftar_tilik_auditor_2) }}
                                    </div>
                                </td>
                                <td>
                                    {{ strip_tags($value->hasil_temuan_audit) }}
                                </td>
                                <td>
                                    {{ $value->auditDokumen->evaluasiDiri->instrument->status_ketercapaian }}
                                </td>
                                <td>
                                    {{ strip_tags($value->rekomendasi) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-md-right pb-4">
        <form action="{{ route('menu-p4mp.report-ami.cetak-ami2', $dataInstrument->id) }}" method="GET" target="_blank">
            {{ csrf_field() }}
            <button class="btn btn-warning btn-icon icon-left">
                <i class="fas fa-print"></i>
                Cetak
            </button>
        </form>
    </div>
@endsection
