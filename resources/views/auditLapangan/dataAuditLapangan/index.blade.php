@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Evaluasi Diri
            </div>
            <div class="card-body">

                <form
                    action="{{ route('menu-auditor.audit-lapangan.post-audit-lapangan', [$dataInstrument, $instrument->id]) }}"
                    class="form form-vertical" enctype="multipart/form-data" method="POST" id="form">
                    {{ csrf_field() }}
                    @foreach ($auditDokumen as $item)
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
                                                    id="{{ $item->id }}">{{ $item->evaluasiDiri->instrument->status_standar }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <label for=""
                                                    id="{{ $item->id }}">{{ $item->evaluasiDiri->instrument->name }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for=""
                                                    id="{{ $item->id }}">{{ $item->evaluasiDiri->instrument->target }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-secondary">
                                        <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                            data-parent="#cardAccordion">
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
                                                        <a href="{{ $item->evaluasiDiri->bukti }}" target="_blank"
                                                            class="text-primary" style="text-decoration: underline">
                                                            klik disini
                                                        </a>
                                                    </div>

                                                    <div class="col-md-6" id="{{ $item->id }}">
                                                        {{ $item->evaluasiDiri->deskripsi_ketercapaian }}
                                                    </div>

                                                    <div class="col-md-3" id="{{ $item->id }}">
                                                        {{ $item->evaluasiDiri->catatan }}
                                                    </div>
                                                    <div class="col-md-1" id="{{ $item->id }}">
                                                        {{ $item->evaluasiDiri->status_ketercapaian }}
                                                    </div>
                                                </div>
                                            </div>
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
                                                        {{ $item->deskripsi_auditor_1 }}
                                                    </div>

                                                    <div class="col-md-3" id="{{ $item->id }}">
                                                        {{ $item->daftar_tilik_auditor_1 }}
                                                    </div>
                                                    <div class="col-md-1" id="{{ $item->id }}">
                                                        {{ $item->status_ketercapaian_auditor_1 }}
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
                                                        {{ $item->deskripsi_auditor_2 }}
                                                    </div>

                                                    <div class="col-md-3" id="{{ $item->id }}">
                                                        {{ $item->daftar_tilik_auditor_2 }}
                                                    </div>
                                                    <div class="col-md-1" id="{{ $item->id }}">
                                                        {{ $item->status_ketercapaian_auditor_2 }}
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
                                <p>&nbsp; &nbsp;Form Audit Dokumen</p>
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
                                                Rekomendasi
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
                                    <input type="radio" class="form-check-input"
                                        id="flexRadioDefault{{ $item->id }}"
                                        name="data[{{ $item->id }}][status_ketercapaian]" value="Tercapai"
                                        {{ old('Tercapai', @$item->evaluasiDiri->instrument->status_ketercapaian) == 'Tercapai' ? 'checked' : '' }}>
                                    <label for="">Tercapai</label>
                                    <div>
                                        <input type="radio" class="form-check-input"
                                            id="flexRadioDefault{{ $item->id }}"
                                            name="data[{{ $item->id }}][status_ketercapaian]" value="Tidak Tercapai"
                                            {{ old('Tidak Tercapai', @$item->evaluasiDiri->instrument->status_ketercapaian) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tidak Tercapai</label>
                                    </div>
                                </div>

                                {{-- @if ($auditLapangan === null)
                                    <div class="col-md-5">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][hasil_temuan_audit]"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][rekomendasi]"></textarea>
                                    </div>
                                @endif

                                @foreach (@$auditLapangan as $al)
                                    @if ($al->audit_dokumen_id == $item->id)
                                        <div class="col-md-5">
                                            <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                                name="data[{{ $item->id }}][hasil_temuan_audit]">{{ $al->hasil_temuan_audit }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" id="exampleFormControlTextarea1{{ $item->id }}" rows="2"
                                                name="data[{{ $item->id }}][rekomendasi]">{{ @$al->rekomendasi }}</textarea>
                                        </div>
                                    @endif
                                @endforeach --}}

                                @if ($auditLapangan === null || count($auditLapangan) === 0)
                                    <div class="col-md-5">
                                        <textarea class="form-control" id="hasil_temuan_{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][hasil_temuan_audit]"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="rekomendasi_{{ $item->id }}" rows="2"
                                            name="data[{{ $item->id }}][rekomendasi]"></textarea>
                                    </div>
                                @else
                                    @foreach ($auditLapangan as $al)
                                        @if ($al->audit_dokumen_id == $item->id)
                                            <div class="col-md-5">
                                                <textarea class="form-control" id="hasil_temuan_{{ $item->id }}" rows="2"
                                                    name="data[{{ $item->id }}][hasil_temuan_audit]">{{ $al->hasil_temuan_audit }}</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea class="form-control" id="rekomendasi_{{ $item->id }}" rows="2"
                                                    name="data[{{ $item->id }}][rekomendasi]">{{ @$al->rekomendasi }}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif



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
    </script>
@endsection
