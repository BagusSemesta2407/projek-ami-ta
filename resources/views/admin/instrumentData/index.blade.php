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
                                <th>Auditor</th>
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
                                        {{ @$item->categoryUnit->name }}
                                    </td>

                                    <td>
                                        {{ $item->year }}
                                    </td>

                                    <td>
                                        @if ($item->media)
                                            @foreach ($item->media as $items)
                                                <a href="{{ $items->getFirstMediaUrl('documentStandard') }}" download
                                                    title="Unduh">
                                                    {{-- {{ $item->'download' }} --}}
                                                    {{ @$items->getFirstMedia('documentStandard')->file_name }}
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
                                        {{-- @elseif ($item->status == 'Ditolak Kepala P4MP')
                                            <span class="badge bg-danger">
                                                Menunggu Konfirmasi Kepala P4MP
                                            </span> --}}
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
                                            <form method="POST"
                                                action="{{ route('admin.data-instruments.destroy', $item->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
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
