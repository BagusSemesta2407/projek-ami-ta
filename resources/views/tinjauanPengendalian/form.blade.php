@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hasil AMI</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Standard SPMI</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$auditLapangan->auditDokumen->evaluasiDiri->instrument->status_standar }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$auditLapangan->auditDokumen->evaluasiDiri->instrument->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $auditLapangan->auditDokumen->evaluasiDiri->instrument->target }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $auditLapangan->auditDokumen->evaluasiDiri->status_ketercapaian }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $auditLapangan->auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Bukti</label>
                            <div class="col-12">
                                <a href="{{ $auditLapangan->auditDokumen->evaluasiDiri->bukti }}"
                                    target="_blank">{{ $auditLapangan->auditDokumen->evaluasiDiri->bukti }}</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 1</label>
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$auditLapangan->auditDokumen->deskripsi_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$auditLapangan->auditDokumen->deskripsi_auditor_2) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Daftar Tilik Auditor 1</label>
                                <label for="" class="col-6">Daftar Tilik Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$auditLapangan->auditDokumen->daftar_tilik_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$auditLapangan->auditDokumen->daftar_tilik_auditor_2) }}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit/Visitasi Lapangan</label>
                            <textarea class="col-12" disabled>{{ strip_tags($auditLapangan->hasil_temuan_audit) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Temuan</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $auditLapangan->auditDokumen->evaluasiDiri->instrument->status_ketercapaian }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Rekomendasi</label>
                            <textarea class="col-12" disabled>{{ strip_tags($auditLapangan->rekomendasi) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ isset($tinjauanPengendalian) ? 'Edit' : 'Tambah' }} Tinjauan Pengendalian
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form
                            action="{{ isset($tinjauanPengendalian) ? route('menu-p4mp.tinjauan-pengendalian.update-tinjauan-pengendalian', [$auditLapangan, $tinjauanPengendalian]) : route('menu-p4mp.tinjauan-pengendalian.post-tinjauan-pengendalian', $auditLapangan) }}"
                            method="POST" enctype="multipart/form-data" id="form">
                            {{ csrf_field() }}
                            @if (isset($tinjauanPengendalian))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Audit Resiko </label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="important" value="Important"
                                            {{ old('Important', @$tinjauanPengendalian->important) == 'Important' ? 'checked' : '' }}>
                                        <label for="">Penting</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault1"
                                            name="important" value="Not Important"
                                            {{ old('Not Important', @$tinjauanPengendalian->important) == 'Not Important' ? 'checked' : '' }}>
                                        <label for="">Tidak Penting</label>
                                    </div>
                                </div>
                            </div>

                            <div clas="form-group">
                                <label for="">Deskripsi Audit Resiko (Penting/Tidak Penting)</label>
                                {{-- <div class="col-md-12">
                                    <input type="text" class="form-control" name="deskripsi_important"
                                        value="{{ old('deskripsi_important', @$tinjauanPengendalian->deskripsi_important) }}">
                                </div> --}}
                                <div class="col-12">
                                    <textarea name="deskripsi_important" id="summernote" class="col-12">{{ @$tinjauanPengendalian->deskripsi_important }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Audit Resiko</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault2"
                                            name="urgent" value="Urgent"
                                            {{ old('Urgent', @$tinjauanPengendalian->urgent) == 'Urgent' ? 'checked' : '' }}>
                                        <label for="">Mendesak</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault3"
                                            name="urgent" value="Not Urgent"
                                            {{ old('Not Urgent', @$tinjauanPengendalian->urgent) == 'Not Urgent' ? 'checked' : '' }}>
                                        <label for="">Tidak Mendesak</label>
                                    </div>
                                </div>
                            </div>


                            <div clas="form-group">
                                <label for="">Deskripsi Audit Resiko (Mendesak/Tidak Mendesak)</label>
                                {{-- <input type="text" class="form-control" name="deskripsi_urgent"
                                    value="{{ old('deskripsi_urgent', @$tinjauanPengendalian->deskripsi_urgent) }}"> --}}
                                <div class="col-12">
                                    <textarea name="deskripsi_urgent" id="summernote1" class="col-12">{{ @$tinjauanPengendalian->deskripsi_urgent }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Rencana Tindak Lanjut</label>
                                {{-- <input type="text" class="form-control"> --}}
                                <div class="col-12">
                                    <textarea name="rencana_tindak_lanjut" id="summernote2" class="col-12">{{ @$tinjauanPengendalian->rencana_tindak_lanjut }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Anggaran</label>
                                {{-- <input type="text" class="form-control"> --}}
                                <div class="col-12">
                                    <textarea name="anggaran" id="summernote3" class="col-12">{{ @$tinjauanPengendalian->anggaran }}</textarea>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="form-group">
                                    <label for="">Anggaran</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="anggaran"
                                            value="Anggaran">
                                        <label for="">Anggaran</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="anggaran"
                                            value="Non Anggaran">
                                        <label for="">Non Anggaran</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end"
                                    id="btnSubmit">
                                    {{ isset($tinjauanPengendalian) ? 'Edit' : 'Tambah' }}
                                    <span class="spinner-border ml-2 d-none" id="loader"
                                        style="width: 1rem; height: 1rem;" role="status">
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
