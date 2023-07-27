@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Evaluasi Diri</h4>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Hasil Audit Dokumen</h4>
            </div>
            <div class="card-body">
                <label for="">
                    Auditor 1
                </label>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->deskripsi_auditor_1) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Daftar Tilik</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_1) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="">Auditor 2</label>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->deskripsi_auditor_2) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Daftar Tilik</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags(@$auditDokumen->daftar_tilik_auditor_2) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Audit Lapangan</h4>
            </div>
            <div class="card-body">
                @if (@$auditLapangan->exists)
                    <form
                        action="{{ route('menu-auditor.audit-lapangan.post-update-audit-lapangan', [$auditDokumen, $instrument, $auditLapangan]) }}"
                        class="form form-vertical" method="POST" enctype="multipart/form-data" id="form">
                        @method('PUT')
                    @else
                        <form
                            action="{{ route('menu-auditor.audit-lapangan.post-audit-lapangan', [$auditDokumen, $instrument]) }}"
                            class="form-form-vertical" enctype="multipart/form-data" method="POST" id="form">
                @endif

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Status Temuan</label>
                    <div class="col-md-6">
                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="status_ketercapaian"
                            value="Tercapai" {{ old('Tercapai', @$instrument) == 'Tercapai' ? 'checked' : '' }}>
                        <label for="">Tercapai</label>
                    </div>
                    <div class="col-md-6">
                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="status_ketercapaian"
                            value="Tidak Tercapai"
                            {{ old('Tidak Tercapai', @$instrument) == 'Tidak Tercapai' ? 'checked' : '' }}>
                        <label for="">Tidak Tercapai</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Hasil Temuan Audit</label>
                    <textarea name="hasil_temuan_audit" class="form-control">{{ @$auditLapangan->hasil_temuan_audit }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Rekomendasi</label>
                    <div class="col-12">
                        <textarea class="form-control" name="rekomendasi">{{ @$auditLapangan->rekomendasi }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary float-end me-1 mb-1" id="btnSubmit">
                    Submit
                    <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                        role="status">
                    </span>
                </button>
                </form>
                </form>
            </div>
        </div>
    </section>
@endsection
