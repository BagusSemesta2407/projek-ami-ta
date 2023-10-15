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
                            Data User
                        </h4>
                    </div>

                    @if (@$user->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.user.update', $user) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.user.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">NIP/NIK</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('nip')
                                            is-invalid
                                        @enderror"
                                                name="nip" placeholder="Masukkan NIP/NIK"
                                                value="{{ old('nip', @$user->nip) }}">

                                            @if ($errors->has('nip'))
                                                <span class="text-danger">{{ $errors->first('nip') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="first-nip-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                                name="name" placeholder="Masukkan Nama User"
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
                                        <div class="form-group">
                                            <label for="first-name-vertical">Role</label>
                                            <select
                                                class="form-control @error('roles')
                                                is-invalid
                                            @enderror"
                                                name="roles" id="">
                                                <option value="" selected disabled>Masukkan Role</option>
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('roles', @$user->id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('roles'))
                                                <span class="text-danger">{{ $errors->first('roles') }}</span>
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
