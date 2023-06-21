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
                                    Auditor
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor->name }}
                            </div>

                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Status
                                </b>
                            </label>

                            <div class="col-md-3 badges">
                                @if ($dataInstrument->status == 'On Progress')
                                    On Progress
                                    <span class="badge bg-secondary">On Progress</span>
                                @elseif ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                                    <span class="badge bg-warning">Menunggu Validasi Auditor</span>
                                @else
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Tahun
                                </b>
                            </label>

                            <div class="col-md-3">
                                {{ @$dataInstrument->year }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="card-title">Horizontal Navs</h5>
                    </div> --}}
                    <div class="card-body">
                        {{-- <form
                            action="{{ route('menu-auditor.index-instrument-auditor.confirm-validate-instrument-auditor', $dataInstrument->id) }}"
                            enctype="multipart/form-data" method="POST"> --}}

                        {{-- {{ csrf_field() }} --}}

                        {{-- <div class="d-flex justify-content-between mb-3">
                                Data Form Validasi Data Instrument
                                <button type="submit" class="btn btn-outline-primary block float-end">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div> --}}
                        {{-- </form> --}}
                        <div class="col-12 col-md-12">
                            @if ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                                    <button class="btn btn-md btn-outline-primary validate" data-url="{{ route('menu-auditor.index-instrument-auditor.validate', $dataInstrument) }}" data-status="{{ $dataInstrument->status }}">
                                        <i class="bi bi-check2-circle"></i>
                                    </button>
                            @elseif ($dataInstrument->status == 'Sudah Divalidasi Auditor')
                                <button class="btn btn-md btn-outline-secondary validate" disabled>
                                    {{-- <i class="bi bi-check2-circle"></i> --}}
                                    <i class="bi bi-dash-circle-fill"></i>
                                </button>
                            @endif
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Standard SPMI</th>
                                            <th>Pertanyaan/Butir Mutu</th>
                                            <th>Indikator dan Target</th>
                                            <th>Status Ketercapaian</th>
                                            <th>Deskripsi Ketercapaian</th>
                                            <th>Bukti</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (@$instrumentAuditee as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>
                                                    {{ $item->instrument->status_standar }}
                                                </td>
                                                <td>
                                                    {{ $item->instrument->name }}
                                                </td>

                                                <td>
                                                    {{ $item->instrument->target }}
                                                </td>

                                                <td>
                                                    {{ $item->status_ketercapaian }}
                                                </td>

                                                <td>
                                                    {{ $item->deskripsi_ketercapaian }}
                                                </td>

                                                <td>
                                                    {{-- bukti --}}
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('menu-auditor.index-instrument-auditor.audit-data-validasi', $item->id) }}"
                                                            class="btn btn-sm btn-outline-secondary">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="{{ route('menu-auditor.index-instrument-auditor.detail-audit-lapangan', $item->id) }}"
                                                            class="btn btn-sm btn-outline-success">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>

                                                {{-- <td>
                                                        <input type="radio" class="form-check-input"
                                                            id="flexRadioDefault{{ $loop->index }}"
                                                            name="data[{{ $item->id }}][status_temuan_audit]{{ $loop->index }}"
                                                            value="Tercapai" {{ old('Valid') }}>
                                                    </td>

                                                    <td>
                                                        <input type="radio" class="form-check-input"
                                                            id="flexRadioDefault{{ $loop->index }}"
                                                            name="data[{{ $item->id }}][status_temuan_audit]{{ $loop->index }}"
                                                            value="Tidak Tercapai" {{ old('Tidak Valid') }}>
                                                    </td> --}}

                                            </tr>
                                        @empty
                                            <td class="text-center col-12" colspan="8">
                                                <img src="{{ asset('empty.svg') }}" alt="" class="m-4">
                                                <p>
                                                    Instrument Menunggu Validasi
                                                </p>
                                                {{-- <a href="{{ route('menu-auditee.instruments-auditee.detail-instrument-auditee', $dataInstrument->id) }}"
                                                        class="dropdown-item">
                                                        Klik Untuk Lihat Detail Instrument
                                                    </a> --}}
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
        $(document).on('click', '.validate', function(){
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
                text:'Periksa kembali sebelum data divalidasi',
                icon:'question',
                showCancelButton: true
            }).then((action)=>{
                if (action.isConfirmed) {
                    console.log(action);
                    $.ajax({
                        type:'POST',
                        url:url,
                        dataType:'json',
                        success: function(data) {
                            Swal.fire('Berhasil', 'Data Berhasil Divalidasi', 'success')
                            .then(function(){
                                location.reload();
                            })
                        },
                        error:function(data){
                            console.log('Error : ' + data);
                        }
                    })
                }
            })
        }); 
    </script>
@endsection
