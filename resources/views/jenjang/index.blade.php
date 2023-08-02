@extends('layouts.base')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                Data Jenjang

                <a href="{{ route('admin.jenjang.create') }}" class="btn btn-outline-primary block float-end">
                    Tambah
                </a>

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenjang</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($jenjang as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->name }}
                                </td>

                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ route('admin.jenjang.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        &nbsp;
                                        <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.jenjang.destroy', $item->id) }}">
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