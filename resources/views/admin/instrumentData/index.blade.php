@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Instrument

                    <a href="{{ route('admin.data-instruments.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Akun Auditee</th>
                                <th>Auditor 1</th>
                                <th>Auditor 2</th>
                                <th>Tahun</th>
                                <th>Dokumen Standar</th>
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
                                        {{ @$item->categoryUnit->name }}
                                    </td>
                                    <td>
                                        {{ @$item->categoryUnit->user->email }}
                                    </td>
                                    <td>
                                        {{ @$item->auditor->user->name}}
                                    </td>
                                    <td>
                                        {{ @$item->auditor2->user->name }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        {{-- @if ($item->dokumenStandar)
                                            @foreach ($item->dokumenStandar as $items)
                                                <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                                    <div class="d-flex">
                                                        <i class="bi bi-filetype-docx"></i>
                                                        <option value="{{ $items }}">{{ $items }}</option>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif --}}
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalLong{{ $loop->index }}"><i>Klik
                                                Disini</i></a>
                                        <div class="modal fade" id="exampleModalLong{{ $loop->index }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Dokumen Standar
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($item->dokumenStandar)
                                                            @foreach ($item->dokumenStandar as $items)
                                                                <a
                                                                    href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                                                    <div class="d-flex">
                                                                        <span class="badge bg-light-secondary"><i
                                                                                class="bi bi-filetype-docx"></i></span>
                                                                        <option value="{{ $items }}">
                                                                            {{ $items }}</option>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="badges">
                                        @if ($item->status == 'On Progress')
                                            <span class="badge bg-secondary">On Progress</span>
                                        @elseif ($item->status == 'Sudah Di Jawab Auditee')
                                            <span class="badge bg-info">Audit Dokumen</span>
                                        @elseif ($item->status == 'Audit Lapangan')
                                            <span class="badge bg-warning">Audit Lapangan</span>
                                        @elseif ($item->status == 'Selesai')
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
                                            <button class="btn btn-sm btn-outline-danger delete"
                                                data-url="{{ route('admin.data-instruments.destroy', $item->id) }}">
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
