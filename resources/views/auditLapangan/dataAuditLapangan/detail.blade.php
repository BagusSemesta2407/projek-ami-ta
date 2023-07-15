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

                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 1</label>
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$auditDokumen->deskripsi_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$auditDokumen->deskripsi_auditor_2) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Daftar Tilik Auditor 1</label>
                                <label for="" class="col-6">Daftar Tilik Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_2) }}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditLapangan->hasil_temuan_audit) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$instrument }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Rekomendasi</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditLapangan->rekomendasi) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
