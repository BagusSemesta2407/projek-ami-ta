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

            .list,
            .th,
            .td {
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 12pt;
                margin-top: 1.5em;
                margin-left: 0.4em;
                text-align: center;
            }
        </style>
    </head>
    <section class="section">
        {{-- <a href="{{ route('menu-kepala-p4mp.report-pengendalian.cetak', $dataInstrument->id) }}" class="btn btn-warning btn-lg">Cetak</a> --}}
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
                <div class="table-responsive">
                    Waktu AMI :{{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}

                    <table class="table align-items-center mb-0" id="example">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Important
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Urgent</th>
                                {{-- @foreach ($criteria as $item) --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rencana
                                    Tindak Lanjut</th>
                                {{-- @endforeach --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anggaran
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tinjauanPengendalian as $value)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $value->important }}
                                    </td>
                                    <td>
                                        {{ $value->urgent }}
                                    </td>
                                    <td>
                                        {{ strip_tags($value->rencana_tindak_lanjut) }}
                                    </td>
                                    <td>
                                        {{ strip_tags($value->anggaran)}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
