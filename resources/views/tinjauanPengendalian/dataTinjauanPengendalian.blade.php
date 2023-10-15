@extends('layouts.base')

@section('content')
<head>
    <style>
        .repeater-items {
            margin-bottom: 15px;
        }

        .remove-item {
            margin-top: 5px;
        }
    </style>

</head>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Evaluasi Diri
                <ul class="list-unstyled mb-0">
                    <li class="d-inline-block me-2 mb-1">
                        <div class="form-check form-check-secondary">
                            <input class="form-check-input" type="checkbox" name="secondary" id="secondary">
                            <label class="form-check-label" for="secondary">
                                Indikator
                            </label>
                        </div>
                    </li>
                    <li class="d-inline-block me-2 mb-1">
                        <div class="form-check form-check-info">
                            <input class="form-check-input" type="checkbox" name="info" id="info">
                            <label class="form-check-label" for="info">
                                Evaluasi Diri
                            </label>
                        </div>
                    </li>
                    <li class="d-inline-block me-2 mb-1">
                        <div class="form-check form-check-warning">
                            <input class="form-check-input" type="checkbox" name="warning" id="warning">
                            <label class="form-check-label" for="warning">
                                Audit Dokumen
                            </label>
                        </div>
                    </li>
                    <li class="d-inline-block me-2 mb-1">
                        <div class="form-check form-check-success">
                            <input class="form-check-input" type="checkbox" name="success" id="success">
                            <label class="form-check-label" for="success">
                                Audit Lapangan
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <form action="{{ route('menu-p4mp.tinjauan-pengendalian.post-tinjauan-pengendalian', $dataInstrument) }}"
                    class="form form-vertical" enctype="multipart/form-data" method="POST" id="form">
                    {{ csrf_field() }}
                    @foreach ($auditLapangan as $item)
                        <div class="collapse-icon accordion-icon-rotate">
                            <div class="alert alert-secondary">
                                <div class="accordion" id="cardAccordion">
                                    <div class="d-flex" class="card-header" id="headingOne" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                        role="button">
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
                                                    id="{{ $item->id }}">{{ $item->auditDokumen->evaluasiDiri->instrument->status_standar }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <label for=""
                                                    id="{{ $item->id }}">{{ $item->auditDokumen->evaluasiDiri->instrument->name }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for=""
                                                    id="{{ $item->id }}">{{ $item->auditDokumen->evaluasiDiri->instrument->target }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-secondary">
                                        <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                            data-parent="#cardAccordion">
                                            <div class="alert alert-info">
                                                <div class="d-flex">
                                                    <div class="col-12">
                                                        <div class="row">
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
                                                        <div class="col-md-1">
                                                            <a href="{{ $item->auditDokumen->evaluasiDiri->bukti }}"
                                                                target="_blank" class="text-primary"
                                                                style="text-decoration: underline">
                                                                klik disini
                                                            </a>
                                                        </div>

                                                        <div class="col-md-6" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}
                                                        </div>

                                                        <div class="col-md-3" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->evaluasiDiri->catatan }}
                                                        </div>
                                                        <div class="col-md-1" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->evaluasiDiri->status_ketercapaian }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-warning">
                                                <div class="d-flex">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Auditor 1
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Hasil Audit Dokumen
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Daftar Tilik
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
                                                        <div class="col-md-1">
                                                            {{-- <a href="{{ $item->evaluasiDiri->bukti }}" target="_blank"
                                                                class="text-primary" style="text-decoration: underline">
                                                                klik disini
                                                            </a> --}}
                                                        </div>

                                                        <div class="col-md-6" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->deskripsi_auditor_1 }}
                                                        </div>

                                                        <div class="col-md-3" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->daftar_tilik_auditor_1 }}
                                                        </div>
                                                        <div class="col-md-1" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->status_ketercapaian_auditor_1 }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Auditor 2
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Hasil Audit Dokumen
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Daftar Tilik
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
                                                        <div class="col-md-1">
                                                            {{-- <a href="{{ $item->evaluasiDiri->bukti }}" target="_blank"
                                                                class="text-primary" style="text-decoration: underline">
                                                                klik disini
                                                            </a> --}}
                                                        </div>

                                                        <div class="col-md-6" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->deskripsi_auditor_2 }}
                                                        </div>

                                                        <div class="col-md-3" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->daftar_tilik_auditor_2 }}
                                                        </div>
                                                        <div class="col-md-1" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->status_ketercapaian_auditor_2 }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-success">
                                                <div class="d-flex">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Hasil Temuan Audit
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Rekomendasi
                                                                    </b>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="" id="{{ $item->id }}">
                                                                    <b>
                                                                        Status Temuan
                                                                    </b>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-5" id="{{ $item->id }}">
                                                            {{ $item->hasil_temuan_audit }}
                                                        </div>

                                                        <div class="col-md-5" id="{{ $item->id }}">
                                                            {{ $item->rekomendasi }}
                                                        </div>
                                                        <div class="col-md-2" id="{{ $item->id }}">
                                                            {{ $item->auditDokumen->evaluasiDiri->instrument->status_ketercapaian }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <p>&nbsp; &nbsp;Form Tinjauan Manajemen</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Audit Resiko (Important/Not Important)
                                            </b>
                                        </label>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Deskripsi Audit Resiko (Important/Not Important)
                                            </b>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                @if ($tinjauanPengendalian === null || count($tinjauanPengendalian) === 0)
                                    <div class="col-md-3">
                                        {{-- input status ketercapaian --}}
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][important]" value="Important"
                                            {{ old('data.' . $item->id . '.important', '') === 'Important' ? 'checked' : '' }}>
                                        <label for="">Penting</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][important]" value="Not Important"
                                                {{ old('data.' . $item->id . '.important', '') === 'Not Important' ? 'checked' : '' }}>
                                            <label for="">Tidak Penting</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="deskripsi_important_{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_important]">{{ old('data.' . $item->id . '.deskripsi_important', '') }}</textarea>
                                    </div>
                                @else
                                    @foreach ($tinjauanPengendalian as $al)
                                        @if ($al->audit_lapangan_id == $item->id)
                                            <div class="col-md-3">
                                                {{-- input status ketercapaian --}}
                                                <input type="radio" class="form-check-input"
                                                    id="flexRadioDefault{{ $item->id }}"
                                                    name="data[{{ $item->id }}][important]" value="Important"
                                                    {{ old('data.' . $item->id . '.important', @$al->important) === 'Important' ? 'checked' : '' }}>
                                                <label for="">Penting</label>
                                                <div>
                                                    <input type="radio" class="form-check-input"
                                                        id="flexRadioDefault{{ $item->id }}"
                                                        name="data[{{ $item->id }}][important]" value="Not Important"
                                                        {{ old('data.' . $item->id . '.important', @$al->important) === 'Not Important' ? 'checked' : '' }}>
                                                    <label for="">Tidak Penting</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="hasil_temuan_{{ $item->id }}" rows="2"
                                                    name="data[{{ $item->id }}][deskripsi_important]">{{ old('data.' . $item->id . '.deskripsi_important', @$al->deskripsi_important) }}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Audit Resiko (Urgent/Not Urgent)
                                            </b>
                                        </label>
                                    </div>

                                    <div class="col-md-9">  
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Deskripsi Audit Resiko (Urgent/Not Urgent)
                                            </b>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                @if ($tinjauanPengendalian === null || count($tinjauanPengendalian) === 0)
                                    <div class="col-md-3">
                                        {{-- input status urgensi --}}
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][urgent]" value="Urgent"
                                            {{ old('data.' . $item->id . '.urgent', '') === 'Urgent' ? 'checked' : '' }}>
                                        <label for="">Mendesak</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][urgent]" value="Not Urgent"
                                                {{ old('data.' . $item->id . '.urgent', '') === 'Not Urgent' ? 'checked' : '' }}>
                                            <label for="">Tidak Mendesak</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="deskripsi_urgent_{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][deskripsi_urgent]">{{ old('data.' . $item->id . '.deskripsi_urgent', '') }}</textarea>
                                    </div>
                                @else
                                    @foreach ($tinjauanPengendalian as $al)
                                        @if ($al->audit_lapangan_id == $item->id)
                                            <div class="col-md-3">
                                                {{-- input status urgensi --}}
                                                <input type="radio" class="form-check-input"
                                                    id="flexRadioDefault{{ $item->id }}"
                                                    name="data[{{ $item->id }}][urgent]" value="Urgent"
                                                    {{ old('data.' . $item->id . '.urgent', @$al->urgent) === 'Urgent' ? 'checked' : '' }}>
                                                <label for="">Mendesak</label>
                                                <div>
                                                    <input type="radio" class="form-check-input"
                                                        id="flexRadioDefault{{ $item->id }}"
                                                        name="data[{{ $item->id }}][urgent]" value="Not Urgent"
                                                        {{ old('data.' . $item->id . '.urgent', @$al->urgent) === 'Not Urgent' ? 'checked' : '' }}>
                                                    <label for="">Tidak Mendesak</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="deskripsi_urgent_{{ $item->id }}" rows="2"
                                                    name="data[{{ $item->id }}][deskripsi_urgent]">{{ old('data.' . $item->id . '.deskripsi_urgent', @$al->deskripsi_urgent) }}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Anggaran
                                            </b>
                                        </label>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Nominal Anggaran
                                            </b>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                @if ($tinjauanPengendalian === null || count($tinjauanPengendalian) === 0)
                                    <div class="col-md-3">
                                        {{-- input status anggaran --}}
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][anggaran]" value="Anggaran"
                                            {{ old('data.' . $item->id . '.anggaran', '') === 'Anggaran' ? 'checked' : '' }}>
                                        <label for="">Anggaran</label>
                                        <div>
                                            <input type="radio" class="form-check-input"
                                                id="flexRadioDefault{{ $item->id }}"
                                                name="data[{{ $item->id }}][anggaran]" value="Non Anggaran"
                                                {{ old('data.' . $item->id . '.anggaran', '') === 'Non Anggaran' ? 'checked' : '' }}>
                                            <label for="">Non Anggaran</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"
                                            name="data[{{ $item->id }}][jumlah_anggaran]"
                                            value="{{ old('data.' . $item->id . '.jumlah_anggaran', '') }}">
                                    </div>
                                @else
                                    @foreach ($tinjauanPengendalian as $al)
                                        @if ($al->audit_lapangan_id == $item->id)
                                            <div class="col-md-3">
                                                {{-- input status anggaran --}}
                                                <input type="radio" class="form-check-input"
                                                    id="flexRadioDefault{{ $item->id }}"
                                                    name="data[{{ $item->id }}][anggaran]" value="Anggaran"
                                                    {{ old('data.' . $item->id . '.anggaran', @$al->anggaran) === 'Anggaran' ? 'checked' : '' }}>
                                                <label for="">Anggaran</label>
                                                <div>
                                                    <input type="radio" class="form-check-input"
                                                        id="flexRadioDefault{{ $item->id }}"
                                                        name="data[{{ $item->id }}][anggaran]" value="Non Anggaran"
                                                        {{ old('data.' . $item->id . '.anggaran', @$al->anggaran) === 'Non Anggaran' ? 'checked' : '' }}>
                                                    <label for="">Non Anggaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"
                                                    name="data[{{ $item->id }}][jumlah_anggaran]"
                                                    value="{{ old('data.' . $item->id . '.jumlah_anggaran', @$al->jumlah_anggaran) }}">
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Rencana Tindak Lanjut
                                            </b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                @if ($tinjauanPengendalian === null || count($tinjauanPengendalian) === 0)
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="rencana_tindak_lanjut_{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][rencana_tindak_lanjut]">{{ old('data.' . $item->id . '.rencana_tindak_lanjut') }}</textarea>
                                    </div>
                                @else
                                    @foreach ($tinjauanPengendalian as $al)
                                        @if ($al->audit_lapangan_id == $item->id)
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="rencana_tindak_lanjut_{{ $item->id }}" rows="2"
                                                    name="data[{{ $item->id }}][rencana_tindak_lanjut]">{{ old('data.' . $item->id . '.rencana_tindak_lanjut', $al->rencana_tindak_lanjut) }}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <br>
                        <br>
                    @endforeach

                    <div class="card-body">
                        Data Kesimpulan

                        <div class="col-12 col-lg-12">
                            <div id="repeater">
                                <div class="repeater-items">
                                    <div class="form-group">
                                        <label for="" class="col-12 col-form-label">
                                            Kelebihan
                                        </label>
                                        <input type="text" class="form-control" name="kelebihan[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-12 col-form-label">
                                            Kesimpulan
                                        </label>
                                        <input type="text" class="form-control" name="kesimpulan[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-12 col-form-label">
                                            Dokumentasi
                                        </label>
                                        <input type="file" class="form-control" name="dokumentasi[]">
                                    </div>
                                    <button class="btn btn-danger remove-item" type="button">Remove</button>
                                </div>
                            </div>
                            <button id="add-item" type="button" class="btn btn-primary">Add More</button>
                        </div>
                    </div>
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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.validate', function() {
            var url = $(this).data('url');
            var status = $(this).data('status');
            var icon = 'question';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            Swal.fire({
                title: 'Apakah semua data sudah divalidasi?',
                text: 'Periksa kembali sebelum data divalidasi',
                icon: 'question',
                showCancelButton: true
            }).then((action) => {
                if (action.isConfirmed) {
                    console.log(action);
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire('Berhasil', 'Data Berhasil Divalidasi', 'success')
                                .then(function() {
                                    location.reload();
                                })
                        },
                        error: function(data) {
                            console.log('Error : ' + data);
                        }
                    })
                }
            })
        });

        $(document).ready(function() {
            // Fungsi untuk menambahkan entri repeater
            $("#add-item").on("click", function() {
                var newItem = `
                    <div class="repeater-items">
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Kelebihan
                            </label>
                            <input type="text" class="form-control" name="kelebihan[]">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Kesimpulan
                            </label>
                            <input type="text" class="form-control" name="kesimpulan[]">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Dokumentasi
                            </label>
                            <input type="file" class="form-control" name="dokumentasi[]">
                        </div>
                        <button class="btn btn-danger remove-item" type="button">Remove</button>
                    </div>
                `;
                $("#repeater").append(newItem);
            });

            // Fungsi untuk menghapus entri repeater
            $(document).on("click", ".remove-item", function() {
                $(this).closest(".repeater-items").remove();
            });
        });
    </script>
@endsection
