@extends('layouts.base')

@section('content')

    <head>
        <style>
            body {
                font-family: 'Times New Roman', serif;
                font-size: 15px;
            }

            .page-header {
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                margin-bottom: .0001pt;
                font-size: 16px
            }

            ol {
                list-style-type: upper-roman;
            }

            h3 {
                font-size: 16px;
            }

            table,
            tr,
            td {
                border-collapse: collapse;
                border: none;
            }
        </style>
    </head>
    <section class="section">
        <a href="{{ route('menu-kepala-p4mp.report-ami.cetak-ami', $dataInstrument->id) }}" class="btn btn-primary" target="_blank"><i
                class="bi bi-printer-fill"></i></a>
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

                <div class="container">
                    {{-- <ol class="sub-menu">
                        <li>
                        </li>
                    </ol> --}}
                    <h3>I. IDENTITAS</h3>
                    <table class="table border">
                        <tr>
                            <td>
                                Nama Instansi
                            </td>

                            <td>
                                Politeknik Negeri Subang
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Nama Prodi/Unit
                            </td>

                            <td>
                                {{ $dataInstrument->categoryUnit->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Audit :
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Auditor :
                            </td>

                            <td>
                                {{ $dataInstrument->auditor->name }}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    Lembar Kerja Pelaksanaan Audit Mutu Internal
                </div>
                <div class="">
                    <h3 class="container">II. HASIL AMI</h3>
                    &nbsp;
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Standar SPMI</th>
                                        <th>Pernyataan/Butir Mutu</th>
                                        <th>Indikator dan Target</th>
                                        <th>Status Ketercapaian Standar</th>
                                        <th>Deskripsi Ketercapaian</th>
                                        <th>Bukti</th>
                                        <th>Hasil Audit Dokumen dan Daftar Tilik</th>
                                        <th>Hasil Temuan Audit</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($instrumentAuditee as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                {{ $item->instrument->status_standar }}
                                            </td>

                                            <td>
                                                {{ $item->instrument->name }}
                                            </td>

                                            <td>
                                                {{ $item->instrument->target }}
                                            </td>

                                            <td>
                                                {{ $item->status_ketercapaian }}
                                            </td>

                                            <td>
                                                {{ $item->deskripsi_ketercapaian }}
                                            </td>

                                            <td>
                                                <a href="{{ $item->bukti }}"
                                                    target="_blank">{{ $item->bukti }}</a>
                                            </td>

                                            <td>
                                                {{ strip_tags($item->hasil_audit_dokumen) }}
                                            </td>

                                            <td>
                                                {{ $item->status_temuan_audit }}
                                            </td>
                                            <td>
                                                {{ $item->rekomendasi }}
                                            </td>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
