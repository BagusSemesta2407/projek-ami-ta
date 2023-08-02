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
                                            <label for="">Jurusan</label>
                                            <div class="col-md-12">
                                                <select name="jurusan_id" id="jurusan_id"
                                                    class="form-select select2 @error('jurusan_id')
                                                is-invalid
                                            @enderror">
                                                    <option value="" disabled selected>Pilih Data Jurusan</option>
                                                    @foreach ($jurusan as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('jurusan_id', @$auditor->jurusan_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('jurusan_id'))
                                                    <span class="text-danger">{{ $errors->first('jurusan_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Program Studi</label>
                                            <div class="col-md-12">
                                                <select name="program_studi_id" id="program_studi_id"
                                                    class="form-select select2 @error('program_studi_id')
                                                is-invalid
                                            @enderror">
                                                    <option value="" disabled selected>Pilih Data Program Studi
                                                    </option>
                                                    {{-- @foreach ($programStudi as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('program_studi_id', @$auditor->program_studi_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                                {{-- @if ($errors->has('program_studi_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('program_studi_id') }}</span>
                                                @endif --}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Unit</label>
                                            <div class="col-md-12">
                                                <select name="unit_id" id="unit_id"
                                                    class="form-select select2 @error('unit_id')
                                                is-invalid
                                            @enderror">
                                                    <option value="" disabled selected>Pilih Data Unit</option>
                                                    @foreach ($unit as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('unit_id', @$auditor->unit_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('unit_id'))
                                                    <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="first-name-vertical">Jabatan</label>
                                            <select
                                                class="form-control select2 @error('jabatan')
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

                                        <div class="form-group">
                                            <label for="">Surat Keterangan</label>
                                            <input type="file"
                                                class="form-control @error('file')
                                                is-invalid
                                            @enderror"
                                                name="file" placeholder="Masukkan Surat Keterangan Auditor"
                                                value="{{ old('file', @$auditor->file) }}">
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
            // Ambil nilai program_studi_id dari data auditor yang sedang di-update
            var programStudiID = "{{ old('program_studi_id', @$auditor->programStudi->name) }}";

            // Cek apakah ada nilai program_studi_id yang terpilih
            if (programStudiID !== '') {
                // Jika ada, tambahkan opsi program studi yang terpilih secara default
                $('#program_studi_id').append('<option value="' + programStudiID + '" selected>' + programStudiID +
                    '</option>');
            }
            $('#jurusan_id').on('change', function() {
                let jurusanID = $(this).val();
                if (jurusanID !== '') {
                    // Jika jurusan sudah dipilih, maka disable elemen "unit"
                    $('#unit_id').prop('disabled', true);
                } else {
                    // Jika jurusan belum dipilih, maka enable kembali elemen "unit"
                    $('#unit_id').prop('disabled', false);
                }

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

            $('#unit_id').on('change', function(){
                let unitID = $(this).val();
                if (unitID !== '') {
                    // Jika jurusan sudah dipilih, maka disable elemen "unit"
                    $('#jurusan_id').prop('disabled', true);
                } else {
                    // Jika jurusan belum dipilih, maka enable kembali elemen "unit"
                    $('#jurusan_id').prop('disabled', false);
                }
            })

        })
    </script>
@endsection
