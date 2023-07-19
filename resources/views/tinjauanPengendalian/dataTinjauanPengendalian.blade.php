@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Audit Dokumen

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar SPMI</th>
                                <th>Butir Mutu</th>
                                <th>Indikator dan Target</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($auditLapangan as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->auditDokumen->evaluasiDiri->instrument->status_standar }}
                                    </td>
                                    <td>
                                        {{ $item->auditDokumen->evaluasiDiri->instrument->name }}
                                    </td>

                                    <td>
                                        {{ $item->auditDokumen->evaluasiDiri->instrument->target }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('menu-p4mp.tinjauan-pengendalian.create-tinjauan-pengendalian', $item->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            {{-- <a href="{{ route('menu-auditor.index-audit-dokumen.detail-data-audit-dokumen', $item->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye-fill"></i>
                                            </a> --}}
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

