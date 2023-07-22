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
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$auditDokumen->evaluasiDiri->instrument->status_standar }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$auditDokumen->evaluasiDiri->instrument->name }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$auditDokumen->evaluasiDiri->instrument->target }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$auditDokumen->evaluasiDiri->status_ketercapaian }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Bukti</label>
                            <div class="col-12">
                                <a href="{{ @$auditDokumen->evaluasiDiri->bukti }}"
                                    target="_blank">{{ @$auditDokumen->evaluasiDiri->bukti }}</a>
                            </div>
                        </div>

                        @if ($userId == $dataInstrument->auditor_id)
                            <div class="form-group">
                                <label for="">Hasil Audit Dokumen Auditor</label>
                                <div class="col-12">
                                    <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->deskripsi_auditor_1) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Daftar Tilik Auditor </label>
                                <div class="col-12">
                                    <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_1) }}</textarea>
                                </div>
                            </div>
                        @endif

                        @if ($userId == $dataInstrument->auditor2_id)
                            <div class="form-group">
                                <label for="">Hasil Audit Dokumen Auditor </label>
                                <div class="col-12">
                                    <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->deskripsi_auditor_2) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Daftar Tilik Auditor </label>
                                <div class="col-12">
                                    <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_2) }}</textarea>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
