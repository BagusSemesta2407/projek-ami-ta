@extends('layouts.base')
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$auditor->exists)
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
                            Data Auditor
                        </h4>
                    </div>

                    @if (@$auditor->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.auditor.update', $auditor) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.auditor.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">User</label>
                                            <div class="col-md-12">
                                                <select name="user_id" id=""
                                                    class="form-select select2 @error('user_id')
                                                is-invalid
                                            @enderror">
                                                    <option value="" disabled selected>Pilih Data Auditor</option>
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('user_id', @$auditor->user_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('user_id'))
                                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="first-name-vertical">Jabatan</label>
                                            <select
                                                class="form-control @error('jabatan')
                                                is-invalid
                                            @enderror"
                                                name="jabatan" id="">
                                                <option value="" selected disabled>Masukkan Jabatan</option>
                                                <option value="ketua"
                                                    {{ old('ketua', @$auditor->jabatan) == 'ketua' ? 'selected' : '' }}>
                                                    Ketua Tim Auditor
                                                </option>
                                                <option value="sekretaris"
                                                    {{ old('sekretaris', @$auditor->jabatan) == 'sekretaris' ? 'selected' : '' }}>
                                                    Sekretaris Tim Auditor
                                                </option>
                                                <option value="anggota"
                                                    {{ old('anggota', @$auditor->jabatan) == 'anggota' ? 'selected' : '' }}>
                                                    Anggota Tim Auditor
                                                </option>
                                            </select>

                                            @if ($errors->has('jabatan'))
                                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tugas</label>
                                            <input type="text"
                                                class="form-control @error('tugas')
                                                is-invalid
                                            @enderror"
                                                name="tugas" placeholder="Masukkan Tugas Auditor"
                                                value="{{ old('tugas', @$auditor->tugas) }}">
                                            @if ($errors->has('tugas'))
                                                <span class="text-danger">{{ $errors->first('tugas') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary me-1 mb-1" id="btnSubmit">
                        {{ $aksi }}
                        <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                            role="status">
                        </span>
                    </button>
                </div>
            </div>
        </div>
        </form>
        </form>
    </section>
@endsection
