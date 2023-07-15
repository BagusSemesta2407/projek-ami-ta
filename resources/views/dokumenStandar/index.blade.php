@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Document Standard AMI
                    <a href="{{ route('admin.dokumen-standar.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar Dokumen Mutu</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (@$dokumenStandar as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->typeDokumenMutuStandar->name }}
                                    </td>
                                    <td>
                                        @if ($item->file_url)
                                            <a href="{{ $item->file_url }}" download title="Unduh">
                                            {{ $item->file }}
                                            </a>
                                        @endif
                                        {{-- {{ $item->file }} --}}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.dokumen-standar.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;

                                            {{-- <form action="{{ route('admin.document-standard.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form> --}}
                                            <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.dokumen-standar.destroy', $item->id) }}">
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

