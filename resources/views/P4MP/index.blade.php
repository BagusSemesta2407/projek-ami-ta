@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Auditor
                    <a href="{{ route('admin.p4mp.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>
                </div>


                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (@$user as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.p4mp.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-outline-danger delete"
                                                data-url="{{ route('admin.p4mp.destroy', $item->id) }}">
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
