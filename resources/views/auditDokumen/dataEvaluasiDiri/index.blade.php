@extends('layouts.base')

@section('content')
    {{-- <div class="page-content">
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
    </div> --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Evaluasi Diri
            </div>
            <div class="card-body">

                <form action="{{ route('menu-auditor.audit-dokumen.post-audit-dokumen', $dataInstrument) }}"
                    class="form form-vertical" enctype="multipart/form-data" method="POST" id="form">
                    {{ csrf_field() }}
                    @foreach ($evaluasiDiri as $item)
                        <div class="alert alert-secondary">
                            <div class="d-flex">
                                <label for="">{{ $loop->iteration }}.</label>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Standar SPMI
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Instrument/Butir Mutu
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Indikator/Target
                                                </b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-md-2">
                                        <label for=""
                                            id="{{ $item->id }}">{{ $item->instrument->status_standar }}</label>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" id="{{ $item->id }}">{{ $item->instrument->name }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""
                                            id="{{ $item->id }}">{{ $item->instrument->target }}</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="col-12">
                                    <div class="row">
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-2">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Bukti
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Deskripsi Ketercapaian
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Catatan
                                                </b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-md-2">
                                        <a href="{{ $item->bukti }}" target="_blank" class="text-primary"
                                            style="text-decoration: underline">
                                            klik disini
                                        </a>
                                    </div>

                                    <div class="col-md-6" id="{{ $item->id }}">
                                        {{ $item->deskripsi_ketercapaian }}
                                    </div>

                                    <div class="col-md-3" id="{{ $item->id }}">
                                        {{ $item->catatan }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($userId == $dataInstrument->auditor->user->id)
                            <div class="col-12">
                                <div class="row">
                                    <p>&nbsp; &nbsp;Form Audit Dokumen auditor 1</p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-12">
                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Hasil Audit Dokumen
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Daftar Tilik
                                                </b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    {{-- &nbsp;
                                    &nbsp;
                                    <div class="col-md-2">
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian]" value="Tercapai"
                                            {{ old('Tercapai', $item->instrument->status_ketercapaian) == 'Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tercapai</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][status_ketercapaian]"
                                                value="Tidak Tercapai"
                                                {{ old('Tidak Tercapai', $item->instrument->status_ketercapaian) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                            <label for="">Tidak Tercapai</label>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_auditor_1]">{{ @$item->auditDokumen->deskripsi_auditor_1 }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][daftar_tilik_auditor_1]">{{ @$item->auditDokumen->daftar_tilik_auditor_1 }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif ($userId == $dataInstrument->auditor2->user->id)
                            <div class="col-12">
                                <div class="row">
                                    <p>&nbsp; &nbsp;Form Audit Dokumen auditor 2</p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-12">
                                    <div class="row">
                                        &nbsp;
                                        &nbsp;
                                            

                                        <div class="col-md-5">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Deskripsi Ketercapaian
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Catatan
                                                </b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    &nbsp;
                                    &nbsp;
                                    {{-- <div class="col-md-2">
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian]" value="Tercapai"
                                            {{ old('Tercapai', @$item->evaluasiDiri->status_ketercapaian) == 'Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tercapai</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][status_ketercapaian]"
                                                value="Tidak Tercapai"
                                                {{ old('Tidak Tercapai', @$item->evaluasiDiri->status_ketercapaian) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                            <label for="">Tidak Tercapai</label>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-5">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_auditor_2]">{{ @$item->auditDokumen->deskripsi_auditor_2 }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][daftar_tilik_auditor_2]">{{ @$item->auditDokumen->daftar_tilik_auditor_2 }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <br>
                        <br>
                    @endforeach
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-1 mb-1" id="btnSubmit">
                            {{-- {{ isset($dataInstrument) ? 'Edit' : 'Tambah' }} --}}

                            Submit
                            <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                                role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
