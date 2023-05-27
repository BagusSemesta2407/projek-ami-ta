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
                            <th>Status</th>
                            <th>Tahun</th>
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
                                    {{ @$item->auditor->name }}
                                </td>
                                <td>
                                    {{ @$item->auditee->name }}
                                </td>
                                <td>
                                    {{ @$item->categoryUnit->name }}
                                </td>
                                <td>
                                    {{ $item->status }}
                                </td>

                                <td>
                                    {{ $item->year }}
                                </td>

                                <td>
                                    {{-- <div class="d-flex ">
                                        <a href="{{ route('admin.category-unit.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('admin.category-unit.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div> --}}
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