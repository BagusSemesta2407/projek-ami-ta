@extends('layouts.base')

@section('content')
    <section>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ isset($jenjang) ? 'Edit' : 'Tambah' }} Data Jenjang
                        </h4>
                    </div>

                    <form
                        action="{{ isset($jenjang) ? route('admin.jenjang.update', $jenjang) : route('admin.jenjang.store') }}"
                        enctype="multipart/form-data" class="form form-vertical" id="form" method="POST">
                        {{ csrf_field() }}

                        @if (isset($jenjang))
                            @method('PUT')
                        @endif

                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 col-form-label">
                                                    Jenjang <sup class="text-danger">*</sup>
                                                </label>

                                                <div class="col-md-12">
                                                    <input type="text" name="name"
                                                        class="form-control @error('name')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Masukkan Jenjang" value="{{ old('name', @$jenjang->name) }}">

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
                        {{ isset($jenjang) ? 'Edit' : 'Tambah' }}
                        <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                            role="status"></span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
