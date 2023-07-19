@extends('layouts.base')
@section('content')
    <section class="section">
        @foreach ($evaluasiDiri as $item)
            <div class="card collapse-icon accordion-icon-rotate">
                <div class="card-header">
                    <h1 class="card-title pl-1">Detail Audit Dokumen</h1>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="accordion" id="cardAccordion">

                            <div class="card">
                                <div class="card-header" id="headingOne" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                    role="button">
                                    <span
                                        class="collapsed collapse-title">{{ $item->instrument->name }}</span>
                                </div>
                                <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                    data-parent="#cardAccordion">
                                    I. Audit Mutu Internal
                                    <div class="card-body col-12">
                                        <b>
                                            Standar SPMI :
                                        </b>
                                        {{ $item->instrument->status_standar }}
                                        <div class="col-12">
                                            <b>
                                                Pernyataan/Butir Mutu :
                                            </b>
                                            {{ $item->instrument->name }}
                                        </div>
                                        <div class="col-12">
                                            <b>
                                                Indikator dan Target :
                                            </b>
                                            {{ $item->instrument->target }}
                                        </div>
                                    </div>
                                    II. Evaluasi Diri
                                    <div class="card-body col-12">
                                        <b>
                                            Status Ketercapaian :
                                        </b>
                                        {{ $item->status_ketercapaian }}
                                        <div class="col-12">
                                            <b>
                                                Deskripsi Ketercapaian Standar :
                                            </b>
                                            {{ strip_tags($item->deskripsi_ketercapaian) }}
                                        </div>
                                        <div class="col-12">
                                            <b>
                                                Bukti Ketercapaian Standar :
                                            </b>
                                            <a href="{{ $item->bukti }}" target="_blank">
                                                {{ $item->bukti }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($dataInstrument->status == 'On Progress')
            <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end validate"
                data-url="{{ route('menu-auditee.evaluasi-diri.update-status-audit', $dataInstrument->id) }}"
                data-status="{{ $dataInstrument->status }}">
                {{-- <i class="bi bi-check2-circle"></i> --}}
                Validasi
            </button>
        @elseif ($dataInstrument->status == 'Sudah Di Jawab Auditee')
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
