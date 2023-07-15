@extends('layouts.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.min.css') }}" />

</head>
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$dokumenStandar->exists)
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

                    @if (@$dokumenStandar->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.dokumen-standar.update', $dokumenStandar) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.dokumen-standar.store') }}" id="repeater-form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Tipe Standar Mutu</label>
                                            <select name="type_dokumen_mutu_standar_id" id="" class="choices form-select">
                                                <option value="" selected disabled>
                                                    Pilih Tipe Standar Mutu
                                                </option>
                                                @foreach ($typeDokumenMutuStandar as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ old('type_dokumen_mutu_standar_id', @$dokumenStandar->type_dokumen_mutu_standar_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">File</label>
                                            <input type="file" id="first-name-vertical"
                                                class="form-control @error('file')
                                                is-invalid
                                            @enderror"
                                                name="file" placeholder="Masukkan File"
                                                value="{{ old('file', @$dokumenStandar->file) }}" data-default-file="{{ @$dokumenStandar->file_url }}">

                                            @if ($errors->has('file'))
                                                <span class="text-danger">{{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit" value="submit">
                        {{ $aksi }}
                        <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                            role="status">
                            <span class="sr-only">Loading...</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        </form>
        </form>
    </section>
@endsection

@section('script')
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    
@endsection
