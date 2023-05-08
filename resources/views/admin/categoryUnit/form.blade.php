@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$categoryUnit->exists)
                                Edit
                                @php
                                    $aksi = 'Edit';
                                @endphp
                            @else
                                Tambah
                                @php
                                    $aksi = 'Tambah';
                                @endphp
                            @endif
                            Data Unit Kerja
                        </h4>
                    </div>

                    @if (@$categoryUnit->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.category-unit.update', $categoryUnit) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.category-unit.store') }}">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="name" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('name', @$categoryUnit->name) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">{{ $aksi }}</button>
                </div>
            </div>
        </div>
        </form>
        </form>
    </section>
@endsection
