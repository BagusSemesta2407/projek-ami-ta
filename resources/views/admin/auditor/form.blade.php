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
                            Data Unit Kerja
                        </h4>
                    </div>

                    @if (@$auditor->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.auditor.update', $auditor) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.auditor.store') }}">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                                name="name" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('name', @$auditor->user->name) }}">

                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="first-name-vertical">Email</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                                name="email" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('email', @$auditor->user->email) }}">

                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="first-name-vertical">Jabatan</label>
                                            <select
                                                class="form-control @error('auditor')
                                                is-invalid
                                            @enderror"
                                                name="jabatan" id="">
                                                <option value="" selected disabled>Masukkan Jabatan</option>
                                                <option value="ketua" {{ old('ketua', @$auditor->jabatan) == 'ketua' ? 'selected' : '' }}>
                                                    Ketua Tim Auditor
                                                </option>
                                                <option value="sekretaris" {{ old('sekretaris', @$auditor->jabatan) == 'sekretaris' ? 'selected' : '' }}>
                                                    Sekretaris Tim Auditor
                                                </option>
                                                <option value="anggota" {{ old('anggota', @$auditor->jabatan) == 'anggota' ? 'selected' : '' }}>
                                                    Anggota Tim Auditor
                                                </option>
                                            </select>

                                            @if ($errors->has('auditor'))
                                                <span class="text-danger">{{ $errors->first('auditor') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tugas</label>
                                            <input type="text" class="form-control" name="tugas" placeholder="Masukkan Tugas Auditor" value="{{ old('tugas', @$auditor->tugas) }}">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="top-right">
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
