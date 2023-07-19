@extends('layouts.base')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    </head>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-secondary">
                    <div class="col-md-12">
                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditee
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditee->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Tanggal Audit
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditor 1
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Unit Kerja
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->categoryUnit->name }}
                            </div>
                        </div>

                        <div class="row">

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditor 2
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor2->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Status
                                </b>
                            </label>

                            <div class="col-md-3 badges">
                                @if ($dataInstrument->status == 'On Progress')
                                    <span class="badge bg-secondary">On Progress</span>
                                @elseif ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                                    <span class="badge bg-warning">Audit Dokumen</span>
                                @elseif ($dataInstrument->status == 'Audit Lapangan')
                                    <span class="badge bg-warning">Audit Lapangan</span>
                                @elseif ($dataInstrument->status == 'Selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @elseif ($dataInstrument->status == 'Menunggu Konfirmasi Kepala P4MP')
                                    <span class="badge bg-primary">
                                        Menunggu Konfirmasi Kepala P4MP
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Data AMI Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Data Instrument dan Butir Mutu
                
                <a href="{{ route('menu-auditee.evaluasi-diri.validasi-evaluasi-diri', $dataInstrument->id) }}" class="btn btn-md btn-outline-primary float-end">
                    <i class="bi bi-check2-circle"></i>
                </a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Standar</th>
                            <th>Instrument/Butir Mutu</th>
                            <th>Indikator dan Target</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($instrument as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->status_standar }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->target }}</td>
                                <td>
                                    <a href="{{ route('menu-auditee.evaluasi-diri.form-evaluasi-diri', [$dataInstrument->id, $item->id]) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    {{-- <a href="{{ route('menu-auditee.evaluasi-diri.edit-evaluasi-diri', [$dataInstrument->id, $item->id]) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pen"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
