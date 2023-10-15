@extends('layouts.base')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    </head>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-secondary">
                    <div class="col-md-12">
                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditee
                                </b>
                            </label>

                            <div class="col-md-3">
                                @if ($dataInstrument->kategori_audit == 'Unit')
                                    {{ $dataInstrument->unit->name }}
                                @elseif ($dataInstrument->kategori_audit == 'Program Studi')
                                    {{ $dataInstrument->programStudi->name }}
                                @else
                                    {{ $dataInstrument->jurusan->name }}
                                @endif
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Tanggal Audit
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditor 1
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor->user->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    @if ($dataInstrument->kategori_audit == 'Unit')
                                        Kepala Unit
                                    @elseif ($dataInstrument->kategori_audit == 'Program Studi')
                                        Kepala Program Studi
                                    @else
                                        Kepala Jurusan
                                    @endif
                                </b>
                            </label>

                            <div class="col-md-3">
                                @if ($dataInstrument->kategori_audit == 'Unit')
                                    {{ $dataInstrument->auditee->name }}
                                @elseif ($dataInstrument->kategori_audit == 'Program Studi')
                                    {{ $dataInstrument->auditee->name }}
                                @else
                                    {{ $dataInstrument->auditee->name }}
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditor 2
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor2->user->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Status
                                </b>
                            </label>

                            <div class="col-md-3 badges">
                                @if ($dataInstrument->status == 'On Progress')
                                    <span class="badge bg-secondary">On Progress</span>
                                @elseif ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                                    <span class="badge bg-warning">Audit Dokumen</span>
                                @elseif ($dataInstrument->status == 'Audit Lapangan')
                                    <span class="badge bg-warning">Audit Lapangan</span>
                                @elseif ($dataInstrument->status == 'Selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @elseif ($dataInstrument->status == 'Menunggu Konfirmasi Kepala P4MP')
                                    <span class="badge bg-primary">
                                        Menunggu Konfirmasi Kepala P4MP
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Data AMI Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Data Instrument dan Butir Mutu
            </div>
            <div class="card-body">

                @foreach ($instrument as $item)
                    <form
                        action="{{ route('menu-auditee.evaluasi-diri.post-data-evaluasi-diri', [$dataInstrument->id, $item]) }}"
                        class="form form-vertical" enctype="multipart/form-data" method="POST" id="form">
                        {{ csrf_field() }}
                        @forelse ($tinjauanPengendalian as $tp)
                            @if (
                                $tp->auditLapangan &&
                                    $tp->auditLapangan->auditDokumen &&
                                    $tp->auditLapangan->auditDokumen->evaluasiDiri &&
                                    $tp->auditLapangan->auditDokumen->evaluasiDiri->instrument == $item)
                                <div class="alert alert-secondary"><i class="bi bi-star"></i>
                                    <b>
                                        Rencana Tindak Lanjut :
                                    </b> {{ $tp->rencana_tindak_lanjut }}
                                </div>
                            @endif
                        @empty
                            <div class="alert alert-secondary"><i class="bi bi-star"></i>
                                <b>Rencana Tindak Lanjut :</b> (belum ada rencana tindak lanjut)
                            </div>
                        @endforelse
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
                                    <label for="" id="{{ $item->id }}">{{ $item->status_standar }}</label>
                                </div>

                                <div class="col-md-6">
                                    <label for="" id="{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" id="{{ $item->id }}">{{ $item->target }}</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <div class="row">
                                <p>&nbsp; &nbsp;Form Evaluasi Diri</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-12">
                                <div class="row">
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-md-2">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Status Ketercapaian
                                            </b>
                                        </label>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Deskripsi Ketercapaian
                                            </b>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" id="{{ $item->id }}">
                                            <b>
                                                Bukti
                                            </b>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
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
                                    {{-- input statusketercapaian --}}
                                    <input type="radio"
                                        class="form-check-input @error('data.' . $item->id . '.status_ketercapaian')
                                        is-invalid
                                    @enderror"
                                        id="flexRadioDefault{{ $item->id }}"
                                        name="data[{{ $item->id }}][status_ketercapaian]" value="Tercapai"
                                        {{ old('data.' . $item->id . '.status_ketercapaian', @$evaluasiDiri[$item->id]['status_ketercapaian']) == 'Tercapai' ? 'checked' : '' }}>
                                    <label for="">Tercapai</label>
                                    <div>
                                        <input type="radio"
                                            class="form-check-input @error('status-ketercapaian')
                                            is-invalid
                                        @enderror"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian]" value="Tidak Tercapai"
                                            {{ old('data.' . $item->id . '.status_ketercapaian', @$evaluasiDiri[$item->id]['status_ketercapaian']) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tidak Tercapai</label>
                                    </div>

                                    @error('data.' . $item->id . '.status_ketercapaian')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <textarea
                                        class="form-control @error('data.' . $item->id . '.deskripsi_ketercapaian')
                                        is-invalid
                                    @enderror"
                                        id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                        name="data[{{ $item->id }}][deskripsi_ketercapaian]">{{ old('data.' . $item->id . '.deskripsi_ketercapaian', @$evaluasiDiri[$item->id]['deskripsi_ketercapaian']) }}</textarea>
                                    @error('data.' . $item->id . '.deskripsi_ketercapaian')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    {{-- input bukti --}}
                                    <input type="text"
                                        class="form-control @error('data.' . $item->id . '.bukti')
                                        is-invalid
                                    @enderror"
                                        name="data[{{ $item->id }}][bukti]" id="{{ $item->id }}"
                                        value="{{ old('data.' . $item->id . '.bukti', @$evaluasiDiri->bukti) }}">
                                    @error('data.' . $item->id . '.bukti')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                        name="data[{{ $item->id }}][catatan]">{{ @$evaluasiDiri->catatan }}</textarea>

                                </div>
                            </div>
                        </div>
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
