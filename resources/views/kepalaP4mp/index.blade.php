@extends('layouts.base')

@section('content')
{{-- <form enctype="multipart/form-data" method="POST" action="{{ route('admin.instrument.store') }}"> --}}

    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data AUDIT MUTU INTERNAL
                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Auditee</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dataInstrument as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        @if ($item->kategori_audit == 'Unit')
                                            {{ $item->unit->name }}
                                        @elseif ($item->kategori_audit == 'Program Studi')
                                            {{ $item->programStudi->name }}
                                        @else
                                            {{ $item->jurusan->name }}
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item->status }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('menu-p4mp.approval-data-ami.approve-data-ami', $item->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            &nbsp;
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
{{-- </form> --}}

@endsection