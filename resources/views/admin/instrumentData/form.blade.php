@extends('layouts.base')

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ isset($dataInstrument) ? 'Edit' : 'Tambah' }} Data Penetapan AMI
                        </h4>
                    </div>

                    <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                        action="{{ isset($dataInstrument) ? route('admin.data-instruments.update', $dataInstrument) : route('admin.data-instruments.store') }}"
                        id="form">
                        {{ csrf_field() }}
                        @if (isset($dataInstrument))
                            @method('PUT')
                        @endif

                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kategori Audit</label>
                                                <select class="select2 form-select" name="kategori_audit"
                                                    id="kategori_audit">
                                                    <option value="" selected="" disabled="">Masukkan Standar
                                                    </option>
                                                    <option value="Unit"
                                                        {{ old('Unit', @$dataInstrument->kategori_audit) == 'Unit' ? 'selected' : '' }}>
                                                        Unit</option>
                                                    <option value="Program Studi"
                                                        {{ old('Program Studi', @$dataInstrument->kategori_audit) == 'Program Studi' ? 'selected' : '' }}>
                                                        Program Studi</option>
                                                    <option value="Jurusan"
                                                        {{ old('Jurusan', @$dataInstrument->kategori_audit) == 'Jurusan' ? 'selected' : '' }}>
                                                        Jurusan</option>
                                                </select>
                                                @if ($errors->has('kategori_audit'))
                                                    <span class="text-danger">{{ $errors->first('kategori_audit') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group" id="jurusan_id">
                                                <label for="jurusan_id" class="col-sm-3 col-form-label">
                                                    Pilih Jurusan <sup class="text-danger">*</sup>
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="jurusan_id"
                                                        class="form-select select2 @error('jurusan_id') is-invalid @enderror"
                                                        id="select-jurusan">
                                                        <option value="" disabled selected>Pilih Jurusan</option>
                                                        @foreach ($jurusan as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('jurusan_id', @$dataInstrument->jurusan_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('jurusan_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group" id="program_studi_id">
                                                <label for="program_studi_id" class="col-sm-3 col-form-label">
                                                    Pilih Program Studi
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="program_studi_id"
                                                        class="form-select select2 @error('program_studi_id') is-invalid @enderror"
                                                        id="select-prodi">
                                                        <option value="" disabled selected>Pilih Program Studi
                                                        </option>
                                                        {{-- @foreach ($programStudi as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('program_studi_id', @$dataInstrument->program_studi_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    {{-- @error('program_studi_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror --}}
                                                </div>
                                            </div>
                                            <div class="form-group" id="unit_id">
                                                <label for="unit_id" class="col-sm-3 col-form-label">
                                                    Pilih Unit <sup class="text-danger">*</sup>
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="unit_id"
                                                        class="form-select select2 @error('unit_id') is-invalid @enderror"
                                                        id="select-unit">
                                                        <option value="" disabled selected>Pilih Unit</option>
                                                        @foreach ($unit as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('unit_id', @$dataInstrument->unit_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('unit_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="auditor_id" class="col-sm-3 col-form-label">
                                                    Auditor 1 <sup class="text-danger">*</sup>
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="auditor_id"
                                                        class="form-select select2 @error('auditor_id') is-invalid @enderror"
                                                        id="auditor_id">
                                                        <option value="" disabled selected>Pilih Auditor 1</option>
                                                        @foreach ($userAuditor as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditor_id', @$dataInstrument->auditor_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('auditor_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="auditor2_id" class="col-sm-3 col-form-label">
                                                    Auditor 2 <sup class="text-danger">*</sup>
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="auditor2_id"
                                                        class="form-select select2 @error('auditor2_id') is-invalid @enderror"
                                                        id="auditor2_id">
                                                        <option value="" disabled selected>Pilih Auditor 2</option>
                                                        @foreach ($userAuditor as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditor2_id', @$dataInstrument->auditor2_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('auditor2_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{--  --}}

                                            <div class="form-group">
                                                <label for="auditee_id" class="col-sm-3 col-form-label">
                                                    Penanggun Jawab <sup class="text-danger">*</sup>
                                                </label>
                                                <p>(auditee)</p>
                                                <div class="col-md-12">
                                                    <select name="auditee_id"
                                                        class="form-select select2 @error('auditee_id') is-invalid @enderror"
                                                        id="user-auditee">
                                                        <option value="" disabled selected>Pilih Auditee</option>
                                                        @foreach ($userAuditee as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditee_id', @$dataInstrument->auditee_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('auditee_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggal_audit" class="col-sm-3 col-form-label">
                                                    Tanggal Audit
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="date" name="tanggal_audit"
                                                        class="form-control @error('tanggal_audit') is-invalid @enderror"
                                                        id="input-year"
                                                        value="{{ old('tanggal_audit', @$dataInstrument->tanggal_audit) }}">
                                                    @error('tanggal_audit')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="dokumenStandar" class="col-sm-3 col-form-label">
                                                    Dokumen Standar
                                                </label>
                                                <div class="col-md-12">
                                                    <ul class="list-group">
                                                        @forelse ($dokumenStandar as $item)
                                                            <li class="list-group-item">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="dokumenStandar[]" value="{{ $item->file }}"
                                                                    {{ in_array($item->file, old('dokumenStandar', @$dataInstrument->dokumenStandar ?? [])) ? 'checked' : '' }}>
                                                                {{ $item->file }}
                                                            </li>
                                                        @empty
                                                            <i>Data Document Standard Tidak Ada</i>
                                                        @endforelse
                                                    </ul>
                                                    @error('dokumenStandar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="form-group list-group">
                                                <label for="name" class="col-sm-3 col-form-label">
                                                    Instrument/Butir Mutu
                                                </label>
                                                <div id="section-question" class="col-md-12">

                                                </div>
                                            </div> --}}

                                            <div class="col-8">
                                                <div id="repeater">
                                                    @if (isset($dataInstrument))
                                                        @foreach ($dataInstrument->tujuan as $tujuan)
                                                            <div class="repeater-items">
                                                                <div class="form-group">
                                                                    <label for="tujuan" class="col-12 col-form-label">
                                                                        Tujuan <sup class="text-danger">*</sup>
                                                                    </label>
                                                                    <div class="d-flex justify-content-between">
                                                                        <input type="text" name="deskripsi_tujuan[]"
                                                                            class="form-control"
                                                                            value="{{ $tujuan->deskripsi_tujuan }}">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-outline-danger remove-row"><i
                                                                                class="bi bi-trash-fill"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="repeater-items">
                                                            <div class="form-group">
                                                                <label for="tujuan" class="col-12 col-form-label">
                                                                    Tujuan <sup class="text-danger">*</sup>
                                                                </label>
                                                                <div class="d-flex justify-content-between">
                                                                    <input type="text" name="deskripsi_tujuan[]"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Tujuan">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-danger remove-row"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-outline-primary mt-3"
                                                    id="add-row">
                                                    <i class="bi bi-plus-circle"></i>
                                                </button>
                                            </div>

                                            <div class="col-8">
                                                <div id="repeater-lingkup">
                                                    @if (isset($dataInstrument))
                                                        @foreach ($dataInstrument->lingkup as $lingkup)
                                                            <div class="repeater-items-lingkup">
                                                                <div class="form-group">
                                                                    <label for="lingkup" class="col-12 col-form-label">
                                                                        Lingkup Audit <sup class="text-danger">*</sup>
                                                                    </label>
                                                                    <div class="d-flex justify-content-between">
                                                                        <input type="text" name="deskripsi_lingkup[]"
                                                                            class="form-control"
                                                                            value="{{ $lingkup->deskripsi_lingkup }}">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-outline-danger remove-lingkup"><i
                                                                                class="bi bi-trash-fill"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="repeater-items-lingkup">
                                                            <div class="form-group">
                                                                <label for="lingkup" class="col-12 col-form-label">
                                                                    Lingkup Audit <sup class="text-danger">*</sup>
                                                                </label>
                                                                <div class="d-flex justify-content-between">
                                                                    <input type="text" name="deskripsi_lingkup[]"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Lingkup">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-danger remove-lingkup"><i
                                                                            class="bi bi-trash-fill"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-outline-primary mt-3"
                                                    id="add-lingkup">
                                                    <i class="bi bi-plus-circle"></i>
                                                </button>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-outline-primary me-1 mb-1"
                                                    id="btnSubmit">
                                                    {{ isset($dataInstrument) ? 'Edit' : 'Tambah' }}
                                                    <span class="spinner-border ml-2 d-none" id="loader"
                                                        style="width: 1rem; height: 1rem;" role="status"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // $(document).on('change', function() {
            //     var jurusanId = $('#select-jurusan').val();
            //     var prodiId = $('#select-prodi').val();
            //     var unitId = $('#select-jurusan').val();
            //     console.log(unitId);
            //     // $('#user-auditee').empty();
            //     $.ajax({
            //         type: "GET",
            //         url: "/admin/getDataInstrumentId/" + unitId,
            //         dataType: 'json',
            //         success: function(response) {
            //             var sectionQuestion = $('#section-question');
            //             sectionQuestion.html('');

            //             if (response.length > 0) {
            //                 var table = $(
            //                     '<table class="table table-hover table-secondary table-bordered">'
            //                 );
            //                 var headerRow = $('<tr>');

            //                 headerRow.append($('<th>').text('No'));
            //                 headerRow.append($('<th>').text('Instrument/Butir Mutu'));

            //                 table.append(headerRow);

            //                 response.forEach(function(data, index) {
            //                     var dataRow = $('<tr>');
            //                     dataRow.append('<td>' + (index + 1) + '</td>');
            //                     dataRow.append('<td>' + data.name + '</td>');

            //                     table.append(dataRow);
            //                 });

            //                 // sectionQuestion.append('<h5>List Instrument</h5>');
            //                 sectionQuestion.append(table);
            //             } else {
            //                 sectionQuestion.append('<p>Tidak Ada Data Instrument</p>');
            //             }
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     });

                // if (unitId) {
                //     // Lakukan permintaan ke server untuk mendapatkan data user berdasarkan category unit
                //     $.ajax({
                //         type: "GET",
                //         url: "/admin/getAuditee/" + unitId,
                //         dataType: 'json',
                //         success: function(response) {
                //             if (response.length > 0) {
                //                 // Tambahkan opsi untuk setiap user auditee yang diterima dari server
                //                 response.forEach(function(user) {
                //                     $('#user-auditee').append('<option value="' + user
                //                         .id + '">' + user.name + '</option>');
                //                 });

                //                 // Aktifkan kembali dropdown auditee
                //                 $('#user-auditee').prop('disabled', false);
                //             } else {
                //                 // Tampilkan pesan jika tidak ada user auditee yang ditemukan
                //                 $('#user-auditee').append(
                //                     '<option value="" disabled selected>Tidak Ada User Auditee</option>'
                //                 );
                //                 $('#user-auditee').prop('disabled', true);
                //             }
                //         },
                //         error: function(error) {
                //             console.log(error);
                //         }
                //     });
                // } else {
                //     // Nonaktifkan dropdown auditee jika tidak ada unit yang dipilih
                //     $('#user-auditee').prop('disabled', true);
                // }
            // });



            $('#add-row').click(function() {
                var html = '<div class="repeater-items">' +
                    '<div class="form-group">' +
                    '<label for="tujuan" class="col-12 col-form-label">Tujuan <sup class="text-danger">*</sup></label>' +
                    '<div class="d-flex justify-content-between">' +
                    '<input type="text" name="deskripsi_tujuan[]" class="form-control" placeholder="Masukkan Tujuan">' +
                    '<button type="button" class="btn btn-sm btn-outline-danger remove-row"><i class="bi bi-trash-fill"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $('#repeater').append(html);
            });

            $('#repeater').on('click', '.remove-row', function() {
                $(this).closest('.repeater-items').remove();
            });

            $('#add-lingkup').click(function() {
                var html = '<div class="repeater-items-lingkup">' +
                    '<div class="form-group">' +
                    '<label for="lingkup" class="col-12 col-form-label">Lingkup Audit <sup class="text-danger">*</sup></label>' +
                    '<div class="d-flex justify-content-between">' +
                    '<input type="text" name="deskripsi_lingkup[]" class="form-control" placeholder="Masukkan Lingkup">' +
                    '<button type="button" class="btn btn-sm btn-outline-danger remove-lingkup"><i class="bi bi-trash-fill"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $('#repeater-lingkup').append(html);
            });

            $('#repeater-lingkup').on('click', '.remove-lingkup', function() {
                $(this).closest('.repeater-items-lingkup').remove();
            });

            // $('#select-unit').on('change', function(){
            //     var 
            // })
        });

    

        $(document).ready(function() {
            var programStudiID = "{{ old('program_studi_id', @$dataInstrument->programStudi->name) }}";

            if (programStudiID !== '') {
                $('#select-prodi').append('<option value="' + programStudiID + '" selected>' + programStudiID +
                    '</option>');
            }
            $('#select-jurusan').on('change', function() {
                let jurusanID = $(this).val();
                console.log(jurusanID);

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/admin/getJurusan/' + jurusanID,
                    success: function(data) {
                        let programStudiElement = $('#select-prodi');
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

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#input-year').attr('min', today);


        $(document).ready(function() {
            $('#auditor_id').on('change', function() {
                let selectedAuditorId = $(this).val();

                $('#auditor2_id option').each(function() {
                    if ($(this).val() === selectedAuditorId) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });
        });

        $('#jurusan_id').hide();
        $('#program_studi_id').hide();
        $('#unit_id').hide();

        $('#kategori_audit').on('change', function() {
            let selectedCategoryAudit = $(this).val();

            $('#jurusan_id').hide();
            $('#program_studi_id').hide();
            $('#unit_id').hide();

            if (selectedCategoryAudit === 'Jurusan') {
                $('#jurusan_id').show();
            } else if (selectedCategoryAudit === 'Unit') {
                $('#unit_id').show();
            } else if (selectedCategoryAudit === 'Program Studi') {
                $('#jurusan_id').show();
                $('#program_studi_id').show();
            }
        });
    </script>
@endsection
