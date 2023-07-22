@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Audit Mutu Internal

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit/Program Studi/Jurusan</th>
                                <th>Tanggal Audit</th>
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
                                        {{ $item->categoryUnit->name }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('menu-p4mp.report-pengendalian.detail-pengendalian', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-eye"></i>
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
@endsection


