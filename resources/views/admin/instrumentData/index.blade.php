@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Unit Kerja

                    <a href="{{ route('admin.data-instruments.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Auditee</th>
                                <th>Auditor 1</th>
                                <th>Auditor 2</th>
                                <th>Unit</th>
                                <th>Tahun</th>
                                <th>Document Standard</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (@$dataInstrument as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ @$item->auditee->name }}
                                    </td>
                                    <td>
                                        {{ @$item->auditor->name }}
                                    </td>
                                    <td>
                                        {{ @$item->auditor2->name }}
                                    </td>
                                    <td>
                                        {{ @$item->categoryUnit->name }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        @if ($item->dokumenStandar)
                                            {{-- {{ $item->dokumenStandar }} --}}
                                            @foreach ($item->dokumenStandar as $items)
                                                <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                                    <option value="{{ $items }}">{{ $items }}</option>
                                                </a>
                                            @endforeach
                                        @endif
                                    </td>

                                    <td class="badges">
                                        @if ($item->status == 'On Progress')
                                            <span class="badge bg-secondary">On Progress</span>
                                        @elseif ($item->status == 'Sudah Di Jawab Auditee')
                                            <span class="badge bg-warning">Menunggu Validasi Auditor</span>
                                        @elseif ($item->status == 'Sudah Divalidasi Auditor')
                                            <span class="badge bg-success">
                                                Selesai
                                            </span>
                                        @elseif ($item->status == 'Menunggu Konfirmasi Kepala P4MP')
                                            <span class="badge bg-primary">
                                                Menunggu Konfirmasi Kepala P4MP
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Data AMI Ditolak
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex ">
                                            <a href="{{ route('admin.data-instruments.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.data-instruments.destroy', $item->id) }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
@endsection
