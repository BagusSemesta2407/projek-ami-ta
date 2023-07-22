@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Data AMI</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Standard SPMI</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->status_standar }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->name }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->target }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->status_ketercapaian }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Bukti</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->proof_id }}" disabled> --}}
                            {{-- <p>bukti</p> --}}
                            @if ($tinjauanPengendalian->auditLapangan->auditDokumen->bukti_url)
                                <a href="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->bukti_url }}" download
                                    title="Unduh">
                                    {{ $tinjauanPengendalian->auditLapangan->auditDokumen->bukti }}
                                </a>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 1</label>
                                <label for="" class="col-6">Hasil Audit Dokumen Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$tinjauanPengendalian->auditLapangan->auditDokumen->deskripsi_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$tinjauanPengendalian->auditLapangan->auditDokumen->deskripsi_auditor_2) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-beetwen">
                                <label for="" class="col-6">Daftar Tilik Auditor 1</label>
                                <label for="" class="col-6">Daftar Tilik Auditor 2</label>
                            </div>
                            <div class="d-flex justify-content-beetwen col-12">
                                <textarea disabled class="col-6">{{ strip_tags(@$tinjauanPengendalian->auditLapangan->auditDokumen->daftar_tilik_auditor_1) }}</textarea>
                                &nbsp;
                                <textarea disabled class="col-6">{{ strip_tags(@$tinjauanPengendalian->auditLapangan->auditDokumen->daftar_tilik_auditor_2) }}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit/Visitasi Lapangan</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->hasil_audit_dokumen }}" disabled> --}}
                            <textarea class="col-12" disabled>{{ strip_tags($tinjauanPengendalian->auditLapangan->hasil_temuan_audit) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Temuan</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->status_ketercapaian }}"
                                disabled>
                            {{-- <textarea class="col-12" disabled>{{ strip_tags($tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->hasil_audit_dokumen) }}</textarea> --}}
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Rekomendasi</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->hasil_audit_dokumen }}" disabled> --}}
                            <textarea class="col-12" disabled>{{ strip_tags($tinjauanPengendalian->auditLapangan->rekomendasi) }}</textarea>
                        </div>

                        {{-- <form
                            action="{{ route('menu-kepala-p4mp.peningkatan.store-peningkatan', $instrumentAuditee->id) }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            @if ($instrumentAuditee->status_temuan_audit == 'Tercapai')
                                <div class="form-group">
                                    <label for="">Perubahan Dokumen Standar</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file"
                                        name="change_dokumen">
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                        Submit
                                        <span class="spinner-border ml-2 d-none" id="loader"
                                            style="width: 1rem; height: 1rem;" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                        </form> --}}
                    </div>
                    {{-- <form action="{{ route('menu-auditor.index-audit-dokumen.create-hasil-audit-dokumen', $instrumentAuditee) }}"
                        enctype="multipart/form-data" class="form form-vertical" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <textarea id="summernote" name="hasil_audit_dokumen"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                Submit
                                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </span>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- </form> --}}
        {{-- @if ($tinjauanPengendalian->auditLapangan->auditDokumen->evaluasiDiri->instrument->status_ketercapaian == 'Tercapai') --}}
            
        <div class="card">
            <div class="card-header">
                {{ isset($tinjauanPeningkatan) ? 'Edit' : 'Tambah' }} Tinjauan Peningkatan
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form
                            action="{{ isset($tinjauanPeningkatan) ? route('menu-p4mp.tinjauan-peningkatan.update-tinjauan-peningkatan', [$tinjauanPengendalian, $tinjauanPeningkatan]) : route('menu-p4mp.tinjauan-peningkatan.post-tinjauan-peningkatan', $tinjauanPengendalian) }}"
                            method="POST" enctype="multipart/form-data" id="form">
                            {{ csrf_field() }}
                            @if (isset($tinjauanPeningkatan))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="first-name-vertical">Tipe Standar Mutu</label>
                                <select name="type_dokumen_mutu_standar_id" id="" class="form-select select2 @error('type_dokumen_mutu_standar_id')
                                    is-invalid
                                @enderror">
                                    <option value="" selected disabled>
                                        Pilih Tipe Standar Mutu
                                    </option>
                                    @foreach ($typeDokumenMutuStandar as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('type_dokumen_mutu_standar_id', @$tinjauanPeningkatan->dokumenStandar->type_dokumen_mutu_standar_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_dokumen_mutu_standar_id'))
                                        <span class="text-danger">{{ $errors->first('type_dokumen_mutu_standar_id') }}</span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="first-name-vertical">File</label>
                                <input type="file" id="first-name-vertical"
                                    class="form-control @error('file')
                                    is-invalid
                                @enderror"
                                    name="file" placeholder="Masukkan File"
                                    value="{{ old('file', @$dokumenStandar->file) }}" data-default-file="{{ @$dokumenStandar->file_url }}">

                                @if ($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end"
                                    id="btnSubmit">
                                    {{ isset($tinjauanPeningkatan) ? 'Edit' : 'Tambah' }}
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
        {{-- @endif --}}

    </section>
@endsection
