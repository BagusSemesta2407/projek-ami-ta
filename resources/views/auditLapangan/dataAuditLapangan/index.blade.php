@extends('layouts.base')

@section('content')
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
                                {{ @$dataInstrument->auditee->name }}
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
                                {{ @$dataInstrument->auditor->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Unit Kerja
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->categoryUnit->name }}
                            </div>

                            
                        </div>

                        <div class="row">

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Auditor 2
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor2->name }}
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

                        <div class="row">
                            <label for="" class="col-md-3">
                                <b>
                                    Dokumen Standar
                                </b>
                            </label>

                            <div class="col-md-3">
                                @if ($dataInstrument->dokumenStandar)
                                    {{-- {{ $dataInstrument->dokumenStandar }} --}}
                                    @foreach ($dataInstrument->dokumenStandar as $items)
                                        <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}" class="text-primary">
                                            <option value="{{ $items }}">{{ $items }}</option>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="col-12 col-md-12">
                            @if ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                                <button class="btn btn-md btn-outline-primary validate"
                                    data-url="{{ route('menu-auditor.index-instrument-auditor.validate', $dataInstrument) }}"
                                    data-status="{{ $dataInstrument->status }}">
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                            @elseif ($dataInstrument->status == 'Sudah Divalidasi Auditor')
                                <button class="btn btn-md btn-outline-secondary validate" disabled>
                                    <i class="bi bi-dash-circle-fill"></i>
                                </button>
                            @endif
                        </div> --}}
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Standard SPMI</th>
                                        <th>Pertanyaan/Butir Mutu</th>
                                        <th>Indikator dan Target</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (@$auditDokumen as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $item->evaluasiDiri->instrument->status_standar }}
                                            </td>
                                            <td>
                                                {{ $item->evaluasiDiri->instrument->name }}
                                            </td>

                                            <td>
                                                {{ $item->evaluasiDiri->instrument->target }}
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('menu-auditor.audit-lapangan.create-audit-lapangan', $item->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="{{ route('menu-auditor.audit-lapangan.detail-audit-lapangan', $item->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="text-center col-12" colspan="8">
                                            <img src="{{ asset('empty.svg') }}" alt="" class="m-4">
                                            <p>
                                                Instrument Menunggu Validasi
                                            </p>
                                            <a href="{{ route('menu-auditee.instruments-auditee.detail-instrument-auditee', $dataInstrument->id) }}"
                                                class="dropdown-item">
                                                Klik Untuk Lihat Detail Instrument
                                            </a>
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
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
