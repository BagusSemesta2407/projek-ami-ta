@extends('layouts.base')
@section('content')
    <section class="section">
        @foreach ($auditLapangan as $item)
            <div class="card collapse-icon accordion-icon-rotate">
                <div class="card-header">
                    <h1 class="card-title pl-1">Detail Audit Lapangan</h1>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="accordion" id="cardAccordion">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                    role="button">
                                    <span
                                        class="collapsed collapse-title">{{ $item->auditDokumen->evaluasiDiri->instrument->name }}</span>
                                </div>
                                <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                    data-parent="#cardAccordion">
                                    I. Audit Mutu Internal
                                    <div class="card-body col-12">
                                        <b>
                                            Standar SPMI :
                                        </b>
                                        {{ $item->auditDokumen->evaluasiDiri->instrument->status_standar }}
                                        <div class="col-12">
                                            <b>
                                                Pernyataan/Butir Mutu :
                                            </b>
                                            {{ $item->auditDokumen->evaluasiDiri->instrument->name }}
                                        </div>
                                        <div class="col-12">
                                            <b>
                                                Indikator dan Target :
                                            </b>
                                            {{ $item->auditDokumen->evaluasiDiri->instrument->target }}
                                        </div>
                                    </div>
                                    II. Evaluasi Diri
                                    <div class="card-body col-12">
                                        <b>
                                            Status Ketercapaian :
                                        </b>
                                        {{ $item->auditDokumen->evaluasiDiri->status_ketercapaian }}
                                        <div class="col-12">
                                            <b>
                                                Deskripsi Ketercapaian Standar :
                                            </b>
                                            {{ $item->auditDokumen->evaluasiDiri->deskripsi_ketercapaian }}
                                        </div>
                                        <div class="col-12">
                                            <b>
                                                Bukti Ketercapaian Standar :
                                            </b>
                                            <a href="{{ $item->auditDokumen->evaluasiDiri->bukti }}" target="_blank">
                                                {{ $item->auditDokumen->evaluasiDiri->bukti }}
                                            </a>
                                        </div>
                                    </div>
                                    III. Audit Dokumen
                                    <div class="card-body col-12">
                                        <div class="col-12">
                                            <b>
                                                Auditor 1
                                            </b>
                                        </div>
                                        <br>
                                        <b>
                                            Hasil Audit Dokumen :
                                        </b>
                                        @if ($item->auditDokumen->deskripsi_auditor_1)
                                            {{ strip_tags($item->auditDokumen->deskripsi_auditor_1) }}
                                        @else
                                            <i>
                                                Auditor Belum Menginput Data Hasil Audit Dokumen
                                            </i>
                                        @endif
                                        <div class="col-12">
                                            <b>
                                                Daftar Tilik :
                                            </b>
                                            @if ($item->auditDokumen->daftar_tilik_auditor_1)
                                                {{ strip_tags($item->auditDokumen->daftar_tilik_auditor_1) }}
                                            @else
                                                <i>
                                                    Auditor Belum Menginput Daftar Tilik
                                                </i>
                                            @endif
                                        </div>

                                        <br>

                                        <div class="col-12">
                                            <b>
                                                Auditor 2
                                            </b>
                                        </div>
                                        <br>
                                        <b>
                                            Hasil Audit Dokumen :
                                        </b>
                                        @if ($item->auditDokumen->deskripsi_auditor_2)
                                            {{ strip_tags($item->auditDokumen->deskripsi_auditor_2) }}
                                        @else
                                            <i>
                                                Auditor Belum Menginput Data Hasil Audit Dokumen
                                            </i>
                                        @endif
                                        <div class="col-12">
                                            <b>
                                                Daftar Tilik :
                                            </b>
                                            @if ($item->auditDokumen->daftar_tilik_auditor_2)
                                                {{ strip_tags($item->auditDokumen->daftar_tilik_auditor_2) }}
                                            @else
                                                <i>
                                                    Auditor Belum Menginput Daftar Tilik
                                                </i>
                                            @endif
                                        </div>
                                    </div>
                                    IV. Audit Lapangan
                                    <div class="card-body col-12">
                                        <b>
                                            Status Temuan Audit :
                                        </b>
                                        {{ strip_tags($item->auditDokumen->evaluasiDiri->instrument->status_ketercapaian) }}

                                        <div class="col-12">
                                            <b>
                                                Hasil Temuan Audit :
                                            </b>
                                            @if ($item->hasil_temuan_audit)
                                                {{ strip_tags($item->hasil_temuan_audit) }}
                                            @else
                                                <i>
                                                    Auditor Belum Menginput Hasil Temuan Audit
                                                </i>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <b>
                                                Rekomendasi :
                                            </b>
                                            @if ($item->rekomendasi)
                                                {{ strip_tags($item->rekomendasi) }}
                                            @else
                                                <i>
                                                    Auditor Belum Menginput Rekomendasi
                                                </i>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($dataInstrument->status == 'Audit Lapangan')
            <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end validate"
                data-url="{{ route('menu-auditor.audit-lapangan.update-status-audit', $dataInstrument->id) }}"
                data-status="{{ $dataInstrument->status }}">
                {{-- <i class="bi bi-check2-circle"></i> --}}
                Validasi
            </button>
        @elseif ($dataInstrument->status == 'Selesai')
            <button class="btn btn-md btn-outline-secondary float-end validate" disabled>
                {{-- <i class="bi bi-dash-circle-fill"></i> --}}
                Validasi    
            </button>
        @endif
    </section>
@endsection

@section('script')
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
@endsection
