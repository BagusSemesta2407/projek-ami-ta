@extends('layouts.base')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                Data Rapat Tinjauan Manajemen

                {{-- <a href="{{ route('admin.category-unit.create') }}" class="btn btn-outline-primary block float-end">
                    Tambah
                </a> --}}

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Unit</th>
                            <th>Pernyataan</th>
                            <th>Tanggal Audit</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($instrumentAuditee as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->dataInstrument->categoryUnit->name }}
                                </td>

                                <td class="align-middle">
                                    {{ $item->instrument->name }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('menu-kepala-p4mp.peningkatan.create-peningkatan', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        &nbsp;
                                        {{-- <form method="POST" action="{{ route('admin.category-unit.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form> --}}
                                        {{-- <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.category-unit.destroy', $item->id) }}">
                                            <i class="bi bi-trash3"></i>
                                        </button> --}}
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