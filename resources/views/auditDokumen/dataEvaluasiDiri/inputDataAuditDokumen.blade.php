@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Audit Dokumen</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Standard SPMI</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$evaluasiDiri->instrument->status_standar }}" disabled> --}}
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$evaluasiDiri->instrument->status_standar }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$evaluasiDiri->instrument->name }}" disabled> --}}
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$evaluasiDiri->instrument->name }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ $evaluasiDiri->instrument->target }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $evaluasiDiri->instrument->target }}" disabled> --}}
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ $evaluasiDiri->status_ketercapaian }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $evaluasiDiri->status_ketercapaian }}" disabled> --}}
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags($evaluasiDiri->deskripsi_ketercapaian) }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $evaluasiDiri->deskripsi_ketercapaian }}" disabled> --}}
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Bukti</label>
                            <div class="col-12">
                                <a href="{{ $evaluasiDiri->bukti }}" target="_blank">{{ $evaluasiDiri->bukti }}</a>
                            </div>
                        </div>

                    </div>
                    @if (@$auditDokumen->exists)
                        <form
                            action="{{ route('menu-auditor.audit-dokumen.post-update-audit-dokumen', [$evaluasiDiri, $auditDokumen]) }}"
                            class="form form-vertical" enctype="multipart/form-data" method="POST" id="form">
                            @method('PUT')
                        @else
                            <form action="{{ route('menu-auditor.audit-dokumen.post-audit-dokumen', $evaluasiDiri) }}"
                                enctype="multipart/form-data" class="form form-vertical" method="POST" id="form">
                    @endif

                    {{ csrf_field() }}
                    {{-- @if (@$auditDokumen->exists) --}}
                    @if ($userId == $dataInstrument->auditor_id)
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <textarea id="summernote" name="deskripsi_auditor_1" value="{{ @$auditDokumen->deskripsi_auditor_1 }} ">{{ @$auditDokumen->deskripsi_auditor_1 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Daftar Tilik</label>
                            <div class="col-12">
                                <textarea id="summernote1" name="daftar_tilik_auditor_1" value="{{ @$auditDokumen->daftar_tilik_auditor_1 }}"
                                    class="col-12">{{ @$auditDokumen->daftar_tilik_auditor_1 }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end" id="btnSubmit">
                                Submit
                                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                                    role="status">
                                </span>
                            </button>
                        </div>
                    @elseif ($userId == $dataInstrument->auditor2_id)
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <textarea id="summernote" name="deskripsi_auditor_2" value="{{ @$auditDokumen->deskripsi_auditor_2 }}">{{ @$auditDokumen->deskripsi_auditor_2 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Daftar Tilik</label>
                            <div class="col-12">
                                <textarea id="summernote1" name="daftar_tilik_auditor_2" value="{{ @$auditDokumen->daftar_tilik_auditor_2 }}"
                                    class="col-12">{{ @$auditDokumen->daftar_tilik_auditor_2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end" id="btnSubmit">
                                Submit
                                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                                    role="status">
                                </span>
                            </button>
                        </div>
                    @endif
                    {{-- @else
                            abc
                        @endif --}}


                </div>
            </div>
        </div>
        </div>
        </form>
        </form>

    </section>
@endsection
