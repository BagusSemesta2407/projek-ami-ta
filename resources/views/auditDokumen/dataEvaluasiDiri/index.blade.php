@extends('layouts.base')

@section('content')
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
                                        <div class="col-md-1">
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
                                        <div class="col-md-1">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Status
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
                                    <div class="col-md-1">
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
                                    <div class="col-md-1" id="{{ $item->id }}">
                                        {{ $item->status_ketercapaian }}
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

                                        <div class="col-md-2">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Status Ketercapaian
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-5">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Hasil Audit Dokumen
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-5">
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
                                    <div class="col-md-2">
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian_auditor_1]" value="Tercapai"
                                            {{ old('Tercapai', @$item->auditDokumen->status_ketercapaian_auditor_1) == 'Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tercapai</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][status_ketercapaian_auditor_1]"
                                                value="Tidak Tercapai"
                                                {{ old('Tidak Tercapai', @$item->auditDokumen->status_ketercapaian_auditor_1) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                            <label for="">Tidak Tercapai</label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_auditor_1]">{{ @$item->auditDokumen->deskripsi_auditor_1 }}</textarea>
                                    </div>
                                    <div class="col-md-5">
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
                                        <div class="col-md-2">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Status Ketercapaian
                                                </b>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="" id="{{ $item->id }}">
                                                <b>
                                                    Hasil Audit Dokumen                                                
                                                </b>
                                            </label>
                                        </div>

                                        <div class="col-md-5">
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
                                    <div class="col-md-2">
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian_auditor_2]" value="Tercapai"
                                            {{ old('Tercapai', @$item->auditDokumen->status_ketercapaian_auditor_2) == 'Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tercapai</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][status_ketercapaian_auditor_2]"
                                                value="Tidak Tercapai"
                                                {{ old('Tidak Tercapai', @$item->auditDokumen->status_ketercapaian_auditor_2) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                            <label for="">Tidak Tercapai</label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_auditor_2]">{{ @$item->auditDokumen->deskripsi_auditor_2 }}</textarea>
                                    </div>
                                    <div class="col-md-5">
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
