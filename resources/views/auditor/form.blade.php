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
                                    {{-- On Progress --}}
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
                        <form
                            action="{{ route('menu-auditor.index-instrument-auditor.confirm-validate-instrument-auditor', $dataInstrument->id) }}"
                            enctype="multipart/form-data" method="POST">
                            
                            {{ csrf_field() }}

                            <div class="d-flex justify-content-between mb-3">
                                    Data Form Validasi Data Instrument
                                <button type="submit" class="btn btn-outline-primary block float-end">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                            {{-- </form> --}}
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Bukti</th>
                                                <th>Valid</th>
                                                <th>Tidak Valid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse (@$instrumentAuditee as $item)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        {{ $item->instrument->name }}
                                                    </td>

                                                    <td>
                                                        {{ $item->answer }}
                                                    </td>

                                                    <td>
                                                        {{ $item->reason }}
                                                    </td>

                                                    <td class="text-center">

                                                    </td>

                                                    <td>
                                                        <input type="radio" class="form-check-input" id="flexRadioDefault{{ $loop->index }}" name="data[{{ $item->id }}][status]{{ $loop->index }}" value="Valid" {{ old('Valid') }}>
                                                    </td>

                                                    <td>
                                                        <input type="radio" class="form-check-input" id="flexRadioDefault{{ $loop->index }}" name="data[{{ $item->id }}][status]{{ $loop->index }}" value="Tidak Valid" {{ old('Tidak Valid') }}>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td class="text-center col-12" colspan="6">
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
                </form>
            </div>
        </div>
    </section>
@endsection
