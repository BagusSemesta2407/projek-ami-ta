@extends('layouts.base')

@section('content')
    <section>
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
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawab</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
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
                                            @if ($item->status_ketercapaian == 'Tidak Tercapai')
                                                {{-- <span class="badge badge-success">Ya</span> --}}
                                                Tidak
                                            @else
                                                {{-- <span class="badge badge-danger">Tidak</span> --}}
                                                Ya
                                            @endif
                                            {{-- {{ $item->answer }} --}}
                                        </td>

                                        <td>
                                            {{ $item->desrkripsi_ketercapaian }}
                                        </td>

                                        <td>

                                        </td>
                                    </tr>
                                @empty
                                    <td class="text-center col-12" colspan="5">
                                        <img src="{{ asset('empty.svg') }}" alt="" class="m-4">
                                        <p>
                                            Belum Mengisi Instrument
                                        </p>
                                        {{-- <a href="{{ route('admin.category-unit.index') }}">Klik Disini</a> --}}
                                        <a
                                            href="{{ route('menu-auditee.instruments-auditee.create-form-instrument-auditee', $dataInstrument->id) }}">
                                            Input Instrument
                                        </a>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
