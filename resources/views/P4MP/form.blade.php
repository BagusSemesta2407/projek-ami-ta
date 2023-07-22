@extends('layouts.base')
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$user->exists)
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
                            Data PPPPMP
                        </h4>
                    </div>

                    @if (@$user->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.p4mp.update', $user) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.p4mp.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                        {{$errors}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                                name="name" placeholder="Masukkan Nama"
                                                value="{{ old('name', @$user->name) }}">

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
                                                name="email" placeholder="Masukkan Email"
                                                value="{{ old('email', @$user->email) }}">

                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="first-name-vertical">Jabatan</label>
                                            <select
                                                class="form-select select2 @error('jabatan')
                                                is-invalid
                                            @enderror"
                                                name="jabatan" id="">
                                                <option value="" selected disabled>Masukkan Jabatan</option>
                                                <option value="Kepala P4MP" {{ old('Kepala P4MP', @$ppppmp->jabatan) == 'Kepala P4MP' ? 'selected' : '' }}>
                                                    Kepala P4MP
                                                </option>
                                                <option value="Admin P4MP" {{ old('Admin P4MP', @$ppppmp->jabatan) == 'Admin P4MP' ? 'selected' : '' }}>
                                                    Admin P4MP
                                                </option>
                                            </select>

                                            @if ($errors->has('jabatan'))
                                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                            @endif
                                        </div> --}}
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
