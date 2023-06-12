@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$documentStandard->exists)
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

                    @if (@$documentStandard->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.document-standard.update', $documentStandard) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.document-standard.store') }}" id="repeater-form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">File</label>
                                            <input type="file" id="first-name-vertical"
                                                class="form-control @error('file')
                                                is-invalid
                                            @enderror"
                                                name="file" placeholder="Masukkan File"
                                                value="{{ old('file') }}">

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
