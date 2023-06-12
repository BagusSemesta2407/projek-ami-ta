@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Document Standard AMI
                    <a href="{{ route('admin.document-standard.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($documentStandard as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @if ($item->media)
                                            <a href="{{ $item->getFirstMediaUrl('documentStandard') }}" download title="Unduh">
                                                {{-- {{ $item->'download' }} --}}
                                                {{ @$item->getFirstMedia('documentStandard')->file_name }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{ $ }} --}}
                                        <div class="d-flex">
                                            <a href="{{ route('admin.document-standard.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;

                                            <form action="{{ route('admin.document-standard.destroy', $item->id) }}" method="POST">
                                                {{-- {{ csrf_field() }} --}}
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
