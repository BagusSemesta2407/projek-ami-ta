@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Audit Dokumen
                    @if ($userId == $dataInstrument->auditor_id)
                        <a href="{{ route('menu-auditor.audit-dokumen.validasi-audit-dokumen', $dataInstrument->id) }}" class="btn btn-md btn-outline-primary float-end">
                            <i class="bi bi-check2-circle"></i>
                        </a>
                    @endif
                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar SPMI</th>
                                <th>Butir Mutu</th>
                                <th>Status Ketercapaian</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($evaluasiDiri as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->instrument->status_standar }}
                                    </td>
                                    <td>
                                        {{ $item->instrument->name }}
                                    </td>

                                    <td>
                                        {{ $item->status_ketercapaian }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('menu-auditor.audit-dokumen.input-audit-dokumen', $item->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('menu-auditor.audit-dokumen.detail-audit-dokumen', $item->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
@endsection