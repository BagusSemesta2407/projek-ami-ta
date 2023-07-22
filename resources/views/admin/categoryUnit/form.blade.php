@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-12">
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


                    <div class="card-content">
                        <div class="card-body">
                            @if (@$categoryUnit->exists)
                                <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                    action="{{ route('admin.category-unit.update', $categoryUnit) }}" id="form">
                                    @method('PUT')
                                @else
                                    <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                        action="{{ route('admin.category-unit.store') }}" id="form">
                            @endif
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Kategori Audit</label>
                                            <select name="kategori_audit" id="kategori-unit"
                                                class="form-select select2 @error('kategori_auidt')
                                                is-invalid
                                            @enderror">
                                                <option value="" selected disabled>Pilih Kategori Yang Akan Di Audit
                                                </option>
                                                <option value="Unit"
                                                    {{ old('Unit', @$categoryUnit->kategori_audit) == 'Unit' ? 'selected' : '' }}>
                                                    Unit
                                                </option>
                                                <option value="Program Studi"
                                                    {{ old('Program Studi', @$categoryUnit->kategori_audit) == 'Program Studi' ? 'selected' : '' }}>
                                                    Program Studi
                                                </option>
                                                <option value="Jurusan"
                                                    {{ old('Jurusan', @$categoryUnit->kategori_audit) == 'Jurusan' ? 'selected' : '' }}>
                                                    Jurusan
                                                </option>
                                            </select>

                                            @if ($errors->has('kategori_audit'))
                                                <span class="text-danger">{{ $errors->first('kategori_audit') }}</span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label for="first-name-vertical">Unit/Program Studi/Jurusan</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                name="name" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('name', @$categoryUnit->name) }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group" id="kepala-unit">
                                            <label for="">Nama Kepala Unit/Program Studi/Jurusan</label>
                                            <input type="text" class="form-control @error('kepala')
                                                is-invalid
                                            @enderror" name="kepala"
                                                placeholder="Masukkan Kepala Unit"
                                                value="{{ old('kepala', @$categoryUnit->kepala) }}">
                                            @if ($errors->has('kepala'))
                                                <span class="text-danger">{{ $errors->first('kepala') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group" id="kepala-unit">
                                            <label for="">Tambahkan Akun Pengguna</label>
                                            <input type="text" class="form-control @error('email')
                                                is-invalid
                                            @enderror" name="email"
                                                placeholder="Masukkan Akun Pengguna"
                                                value="{{ old('email', @$categoryUnit->user->email) }}">
                                                @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                            </div>
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
                {{ $aksi }}
                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;" role="status">
                </span>
            </button>
        </div>
        </form>
        </form>
    </section>
@endsection

{{-- @section('script')
    <script>
        $('#kepala-unit').hide();
        $('#kepala-prodi').hide();
        $('#kepala-jurusan').hide();

        $('#kategori-unit').on('change', function() {
            var selectedVal = $(this).val();

            console.log(selectedVal);

            if (selectedVal == 'Unit') {
                $('#kepala-unit').show();
            } else {
                $('#kepala-unit').hide();
            }

            if (selectedVal == 'Program Studi') {
                $('#kepala-prodi').show();
            } else {
                $('#kepala-prodi').hide();
            }

            if (selectedVal == 'Jurusan') {
                $('#kepala-jurusan').show();
            } else {
                $('#kepala-jurusan').hide();
            }

        })
    </script>
@endsection --}}
