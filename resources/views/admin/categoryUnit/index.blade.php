@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Unit Kerja

                    <a href="{{ route('admin.category-unit.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categoryUnit as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.category-unit.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
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

@section('script')
    <script type="text/javascript"></script>
@endsection
