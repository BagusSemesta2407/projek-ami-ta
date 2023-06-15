@extends('layouts.base')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                Data User

                <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary block float-end">
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
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user as $item)
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
                                    {{-- {{ $item->name }} --}}
                                    @if ($item->getRoleNames()[0] == 'admin')
                                        Admin
                                    @elseif ($item->getRoleNames()[0] == 'auditee')
                                        Auditee
                                    @elseif ($item->getRoleNames()[0] == 'auditor')
                                        Auditor
                                    @elseif ($item->getRoleNames()[0] == 'kepala_p4mp')
                                        Kepala P4MP
                                    @endif
                                </td>


                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ route('admin.user.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        &nbsp;
                                        <form method="POST" action="{{ route('admin.user.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
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