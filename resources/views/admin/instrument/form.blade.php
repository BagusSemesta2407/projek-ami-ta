@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$instrument->exists)
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
                            Data Instrument
                        </h4>
                    </div>

                    @if (@$instrument->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.instrument.update', $instrument) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.instrument.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Kategori Instrument Audit</label>
                                            <select class="select2 form-control" name="kategori_audit_instrument"
                                                id="kategori_audit_instrument">
                                                <option value="" selected="" disabled="">Masukkan Kategori
                                                    Instrument Audit
                                                </option>
                                                <option value="Jurusan"
                                                    {{ old('Jurusan', @$instrument->kategori_audit_instrument) == 'Jurusan' ? 'selected' : '' }}>
                                                    Jurusan</option>
                                                <option value="Program Studi"
                                                    {{ old('Program Studi', @$instrument->kategori_audit_instrument) == 'Program Studi' ? 'selected' : '' }}>
                                                    Program Studi</option>
                                                <option value="Unit"
                                                    {{ old('Unit', @$instrument->kategori_audit_instrument) == 'Unit' ? 'selected' : '' }}>
                                                    Unit</option>
                                            </select>
                                            @if ($errors->has('kategori_audit_instrument'))
                                                <span
                                                    class="text-danger">{{ $errors->first('kategori_audit_instrument') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group" id="select-jurusan">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Jurusan <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="jurusan_id"
                                                        class="select2 form-select @error('jurusan_id') is-invalid @enderror"
                                                        id="jurusan_id">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Data Jurusan
                                                        </option>

                                                        @foreach ($jurusan as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('jurusan_id', @$instrument->jurusan_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('jurusan_id'))
                                                    <span class="text-danger">{{ $errors->first('jurusan_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" id="select-prodi">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Program Studi <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="program_studi_id"
                                                        class="select2 form-select @error('program_studi_id') is-invalid @enderror"
                                                        id="program_studi_id">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Data Program Studi
                                                        </option>

                                                        @foreach ($programStudi as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('program_studi_id', @$instrument->program_studi_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('program_studi_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('program_studi_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" id="select-unit">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Unit
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="unit_id"
                                                        class="select2 form-select @error('unit_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Data Unit
                                                        </option>

                                                        @foreach ($unit as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('unit_id', @$instrument->unit_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('unit_id'))
                                                    <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Instrument/Butir Mutu</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                name="name" placeholder="Masukkan Instrument"
                                                value="{{ old('name', @$instrument->name) }}">

                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Indikator dan Target</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('target')
                                                is-invalid
                                            @enderror"
                                                name="target" placeholder="Masukkan Indikator dan Target"
                                                value="{{ old('target', @$instrument->target) }}">

                                            @if ($errors->has('target'))
                                                <span class="text-danger">{{ $errors->first('target') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Standar AMI</label>
                                            <select class="select2 form-select" name="status_standar" id="status_standar">
                                                <option value="" selected="" disabled="">Masukkan Standar
                                                </option>
                                                <option value="Pendidikan"
                                                    {{ old('Pendidikan', @$instrument->status_standar) == 'Pendidikan' ? 'selected' : '' }}>
                                                    Pendidikan</option>
                                                <option value="Penelitian"
                                                    {{ old('Penelitian', @$instrument->status_standar) == 'Penelitian' ? 'selected' : '' }}>
                                                    Penelitian</option>
                                                <option value="Pengabdian Kepada Masyarakat"
                                                    {{ old('Pengabdian Kepada Masyarakat', @$instrument->status_standar) == 'Pengabdian Kepada Masyarakat' ? 'selected' : '' }}>
                                                    Pengabdian Kepada Masyarakat</option>
                                            </select>
                                            @if ($errors->has('status_standar'))
                                                <span class="text-danger">{{ $errors->first('status_standar') }}</span>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#jurusan_id').on('change', function() {
                let jurusanID = $(this).val();

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/admin/getJurusan/' + jurusanID,
                    success: function(data) {
                        let programStudiElement = $('#program_studi_id');
                        programStudiElement.empty();
                        programStudiElement.append(
                            '<option value="" disabled selected>Pilih Data Program Studi</option>'
                        )

                        $.each(data, function(index, programStudi) {
                            programStudiElement.append('<option value="' + programStudi
                                .id + '">' + programStudi.name + '</option>')
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                })
            })
        })

        $('#select-jurusan').hide();
        $('#select-prodi').hide();
        $('#select-unit').hide();

        $('#kategori_audit_instrument').on('change', function() {
            let selectedCategoryAudit = $(this).val();

            $('#select-jurusan').hide();
            $('#select-prodi').hide();
            $('#select-unit').hide();

            if (selectedCategoryAudit === 'Jurusan') {
                $('#select-jurusan').show();
            } else if (selectedCategoryAudit === 'Unit') {
                $('#select-unit').show();
            } else if (selectedCategoryAudit === 'Program Studi') {
                $('#select-jurusan').show();
                $('#select-prodi').show();
            }
        });
    </script>
@endsection
