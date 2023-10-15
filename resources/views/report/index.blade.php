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
                                        @if ($item->kategori_audit == 'Unit')
                                            {{ $item->unit->name }}
                                        @elseif ($item->kategori_audit == 'Program Studi')
                                            {{ $item->programStudi->name }}
                                        @else
                                            {{ $item->jurusan->name }}
                                        @endif
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        @role('P4MP')
                                        <div class="d-flex">
                                            {{-- <a href="{{ route('menu-p4mp.report-ami.detail-ami', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            &nbsp; --}}
                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('menu-p4mp.cetak-ami', $item->id) }}" target="__blank">                                            <i class="bi bi-printer-fill"></i>
                                            </a>
                                            {{-- <button class="btn btn-sm btn-outline-danger">
                                                
                                            </button> --}}
                                        </div>
                                        @endrole
                                        @role('auditee')
                                        <div class="d-flex">
                                            {{-- <a href="{{ route('menu-p4mp.report-ami.detail-ami', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            &nbsp; --}}
                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('menu-p4mp.cetak-ami', $item->id) }}" target="__blank">                                            <i class="bi bi-printer-fill"></i>
                                            </a>
                                            {{-- <button class="btn btn-sm btn-outline-danger">
                                                
                                            </button> --}}
                                        </div>
                                        @endrole
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


