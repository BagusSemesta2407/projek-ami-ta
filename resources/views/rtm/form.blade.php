@extends('layouts.base')
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$risalahRapat->exists)
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
                            Data RTM
                        </h4>
                    </div>

                    @if (@$risalahRapat->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('menu-p4mp.rapat-tinjauan-manajemen.update', $risalahRapat) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('menu-p4mp.rapat-tinjauan-manajemen.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Tanggal</label>
                                            <input type="date" id="first-name-vertical"
                                                class="form-control @error('tanggal')
                                            is-invalid
                                        @enderror"
                                                name="tanggal" placeholder="Masukkan NIP/NIK"
                                                value="{{ old('tanggal', @$risalahRapat->tanggal) }}">

                                            @if ($errors->has('tanggal'))
                                                <span class="text-danger">{{ $errors->first('nip') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Waktu</label>
                                            <input type="time" id="first-name-vertical"
                                                class="form-control @error('tanggal')
                                            is-invalid
                                        @enderror"
                                                name="waktu" placeholder="Masukkan NIP/NIK"
                                                value="{{ old('waktu', @$risalahRapat->waktu) }}">

                                            @if ($errors->has('waktu'))
                                                <span class="text-danger">{{ $errors->first('waktu') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="first-nip-vertical">Tempat</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('tempat')
                                            is-invalid
                                        @enderror"
                                                name="tempat" placeholder="Masukkan Nama Tempat"
                                                value="{{ old('tempat', @$risalahRapat->tempat) }}">

                                            @if ($errors->has('tempat'))
                                                <span class="text-danger">{{ $errors->first('tempat') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="first-nip-vertical">Agenda</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('agenda')
                                            is-invalid
                                        @enderror"
                                                name="agenda" placeholder="Masukkan Agenda"
                                                value="{{ old('agenda', @$risalahRapat->agenda) }}">

                                            @if ($errors->has('agenda'))
                                                <span class="text-danger">{{ $errors->first('agenda') }}</span>
                                            @endif
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="first-nip-vertical">Agenda</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('tempat')
                                            is-invalid
                                        @enderror"
                                                name="tempat" placeholder="Masukkan Nama Tempat"
                                                value="{{ old('tempat', @$user->name) }}">

                                            @if ($errors->has('tempat'))
                                                <span class="text-danger">{{ $errors->first('tempat') }}</span>
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
