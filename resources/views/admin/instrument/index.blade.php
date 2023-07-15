@extends('layouts.base')

@section('content')

<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                Data Unit Kerja

                <a href="{{ route('admin.instrument.create') }}" class="btn btn-outline-primary block float-end">
                    Tambah
                </a>

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Standar Instrument</th>
                            <th>Unit</th>
                            <th>Pertanyaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($instrument as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->status_standar }}
                                </td>

                                <td>
                                    {{ $item->categoryUnit->name }}
                                </td>

                                <td>
                                    {{ $item->name }}
                                </td>

                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ route('admin.instrument.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        &nbsp;
                                        {{-- <form method="POST" action="{{ route('admin.instrument.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form> --}}

                                        <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.instrument.destroy', $item->id) }}">
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