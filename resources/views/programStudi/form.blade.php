@extends('layouts.base')
@section('content')
    <section>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ isset($programStudi) ? 'Edit' : 'Tambah' }} Data Program Studi
                        </h4>
                    </div>

                    <form
                        action="{{ isset($programStudi) ? route('admin.program-studi.update', $programStudi) : route('admin.program-studi.store') }}"
                        method="POST" enctype="multipart/form-data" class="form form-vertical" id="form">
                        {{ csrf_field() }}

                        @if (isset($programStudi))
                            @method('PUT')
                        @endif

                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 col-form-label">
                                                    Jurusan <sup class="text-danger">*</sup>
                                                </label>

                                                <div class="col-md-12">
                                                    <select name="jurusan_id" id=""
                                                        class="form-select select2 @error('jurusan_id')
                                                        is-invalid
                                                    @enderror">

                                                        <option value="" disabled selected>Pilih Jurusan</option>

                                                        @foreach ($jurusan as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('jurusan_id', @$programStudi->jurusan_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('jurusan_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 col-form-label">
                                                    Jenjang <sup class="text-danger">*</sup>
                                                </label>

                                                <div class="col-md-12">
                                                    <select name="jenjang_id" id=""
                                                        class="form-select select2 @error('jenjang_id')
                                                        is-invalid
                                                    @enderror">

                                                        <option value="" disabled selected>Pilih Jurusan</option>

                                                        @foreach ($jenjang as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('jenjang_id', @$programStudi->jenjang_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('jenjang_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="col-sm-3 col-form-label">
                                                    Nama Program Studi <sup class="text-danger">*</sup>
                                                </label>

                                                <div class="col-md-12">
                                                    <input type="text" name="name"
                                                        class="form-control @error('name')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Masukkan Nama Program Studi"
                                                        value="{{ old('name', @$programStudi->name) }}">

                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-1 mb-1" id="btnSubmit">
                            {{ isset($programStudi) ? 'Edit' : 'Tambah' }}
                            <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                                role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
