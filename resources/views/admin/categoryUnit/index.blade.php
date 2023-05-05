@extends('layouts.base')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Unit Kerja</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="card">
                    <div class="card-header">
                        Data Unit Kerja

                        {{-- <a href="{{ route('admin.category-unit.create') }}" class="btn btn-primary float-end">
                            <i class="dripicons-plus"></i>
                            Tambah
                        </a> --}}

                        <button type="button" class="btn btn-outline-primary block float-end" data-bs-toggle="modal"
                            data-bs-target="#border-less" value="{{ route('admin.category-unit.store') }}">
                            Tambah
                        </button>
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
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->name }}
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        {{-- modal --}}
        <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">
                            @if (@$categoryUnit->exists)
                                Tambah
                                @php
                                    $aksi = 'Tambah';
                                @endphp
                            @else
                                Edit
                                @php
                                    $aksi = 'Edit';
                                @endphp
                            @endif
                            Data Unit Kerja
                        </h5>

                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>

                    </div>

                    @if (@$categoryUnit->exists)
                        <form action="{{ route('admin.category-unit.store') }}" method="POST"
                            enctype="multipart/form-data">
                        @else
                            <form action="{{ route('admin.category-unit.update', $categoryUnit) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="">Nama :</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" value="{{ old('name', @$item->name) }}"
                                class="form-control" placeholder="Masukan Nama Kategori Unit">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">{{ $aksi }}</span>
                            </button>
                        </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
