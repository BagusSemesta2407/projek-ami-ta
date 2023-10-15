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
                                                    <option value="" selected disabled>Masukkan Standar</option>
                                                    <option value="Unit"
                                                        {{ old('kategori_audit', @$dataInstrument->kategori_audit) === 'Unit' ? 'selected' : '' }}>
                                                        Unit</option>
                                                    <option value="Program Studi"
                                                        {{ old('kategori_audit', @$dataInstrument->kategori_audit) === 'Program Studi' ? 'selected' : '' }}>
                                                        Program Studi</option>
                                                    <option value="Jurusan"
                                                        {{ old('kategori_audit', @$dataInstrument->kategori_audit) === 'Jurusan' ? 'selected' : '' }}>
                                                        Jurusan</option>
                                                </select>
                                                @if ($errors->has('kategori_audit'))
                                                    <span class="text-danger">{{ $errors->first('kategori_audit') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group" id="jurusan_id"
                                                @if (old('kategori_audit', @$dataInstrument->kategori_audit) !== 'Jurusan') style="display:none;" @endif>
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
                                            <div class="form-group" id="program_studi_id"
                                                @if (old('kategori_audit', @$dataInstrument->kategori_audit) !== 'Program Studi') style="display:none;" @endif>
                                                <label for="program_studi_id" class="col-sm-3 col-form-label">
                                                    Pilih Program Studi
                                                </label>
                                                <div class="col-md-12">
                                                    <select name="program_studi_id"
                                                        class="form-select select2 @error('program_studi_id') is-invalid @enderror"
                                                        id="select-prodi">
                                                        <option value="" disabled selected>Pilih Program Studi
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="unit_id"
                                                @if (old('kategori_audit', @$dataInstrument->kategori_audit) !== 'Unit') style="display:none;" @endif>
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

                                            <div class="form-group" id="select-auditor">
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
                                                                {{ old('auditor_id', @$dataInstrument->auditor_id) == $item->id ? 'selected' : '' }}
                                                                data-jurusan_id="{{ $item->jurusan_id }}"
                                                                data-program_studi_id="{{ $item->program_studi_id }}"
                                                                >
                                                                {{ $item->user->name }} ({{ $countAuditor }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('auditor_id'))
                                                        <span class="text-danger">{{ $errors->first('auditor_id') }}</span>
                                                    @endif
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
                                                                {{ old('auditor2_id', @$dataInstrument->auditor2_id) == $item->id ? 'selected' : '' }}
                                                                data-jurusan_id="{{ $item->jurusan_id }}"
                                                                data-program_studi_id="{{ $item->program_studi_id }}">
                                                                {{ $item->user->name }} ({{ $countAuditor }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('auditor2_id'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('auditor2_id') }}</span>
                                                    @endif
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
        //     $(document).ready(function() {
        //         var programStudiName = "{{ old('program_studi_id', @$dataInstrument->programStudi->name) }}";

        //         if (programStudiName !== '') {
        //             // The option value and displayed text should both be the name of Program Studi
        //             $('#select-prodi').append('<option value="' + programStudiName + '" selected>' + programStudiName +
        //                 '</option>');
        //         }

        //         $('#select-jurusan').on('change', function() {
        //             let jurusanID = $(this).val();

        //             $.ajax({
        //                 type: 'GET',
        //                 dataType: 'json',
        //                 url: '/admin/getJurusan/' + jurusanID,
        //                 success: function(data) {
        //                     let programStudiElement = $('#select-prodi');
        //                     programStudiElement.empty();
        //                     programStudiElement.append(
        //                         '<option value="" disabled selected>Pilih Data Program Studi</option>'
        //                     )

        //                     $.each(data, function(index, programStudi) {
        //                         // Append the name of Program Studi as both option value and displayed text
        //                         programStudiElement.append('<option value="' + programStudi
        //                             .id + '">' + programStudi.name + '</option>');
        //                     });

        //                     // Trigger the change event to update the selected Program Studi if it exists in the new list
        //                     programStudiElement.val(programStudiName).trigger('change');
        //                 },
        //                 error: function(xhr, status, error) {
        //                     console.error(error);
        //                 }
        //             })
        //         });
        //     });

        //     $(document).ready(function () {
        //     $('#select-jurusan, #select-prodi').change(function () {
        //         // Ambil nilai jurusan_id dan program_studi_id yang dipilih
        //         var jurusanId = $('#select-jurusan').val();
        //         var programStudiId = $('#select-prodi').val();

        //         // Buat permintaan Ajax
        //         $.ajax({
        //             url: '/admin/getAuditor/',
        //             type: 'GET',
        //             data: { jurusan_id: jurusanId, program_studi_id: programStudiId },
        //             success: function (response) {
        //                 // Tampilkan opsi auditor yang tersedia dalam elemen select auditor_id
        //                 var availableAuditors = response.available_auditors;
        //                 var auditorOptions = '';
        //                 availableAuditors.forEach(function (auditor) {
        //                     auditorOptions += '<option value="' + auditor.id + '">' + auditor.name + '</option>';
        //                     // Tambahkan informasi auditor lainnya sesuai kebutuhan
        //                 });
        //                 $('#auditor_id').html(auditorOptions);
        //             },
        //             error: function (xhr, status, error) {
        //                 console.log(error);
        //             }
        //         });
        //     });
        // });

        $(document).ready(function() {
            var programStudiName = "{{ old('program_studi_id', @$dataInstrument->programStudi->name) }}";
            var auditorName1 = "{{ old('auditor_id', @$dataInstrument->auditor->user->name) }}";
            var auditorName2 = "{{ old('auditor2_id', @$dataInstrument->auditor->user->name) }}";

            // Fungsi untuk mengisi opsi program studi dan menghapus opsi auditor yang sama
            function populateProgramStudiAndFilterAuditor() {
                var selectedJurusanId = $('#select-jurusan').val();

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/admin/getJurusan/' + selectedJurusanId,
                    success: function(data) {
                        var programStudiElement = $('#select-prodi');
                        programStudiElement.empty();
                        programStudiElement.append(
                            '<option value="" disabled selected>Pilih Data Program Studi</option>'
                        );

                        $.each(data, function(index, programStudi) {
                            // Append the name of Program Studi as both option value and displayed text
                            programStudiElement.append('<option value="' + programStudi.id +
                                '">' + programStudi.name + '</option>');
                        });

                        // Panggil fungsi filterAuditorOptions setelah memuat opsi program studi
                        filterAuditorOptions();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Fungsi untuk menonaktifkan atau menghapus opsi auditor yang memiliki jurusan dan program studi yang sama
            function filterAuditorOptions() {
                var selectedJurusanId = $('#select-jurusan').val();
                var selectedProgramStudiId = $('#select-prodi').val();

                $('#auditor_id option, #auditor2_id option').each(function() {
                    var auditorJurusanId = $(this).data('jurusan_id');
                    var auditorProgramStudiId = $(this).data('program_studi_id');

                    if (
                        auditorJurusanId == selectedJurusanId &&
                        auditorProgramStudiId == selectedProgramStudiId
                    ) {
                        // Nonaktifkan atau hapus opsi auditor yang memiliki jurusan dan program studi yang sama
                        $(this).prop('disabled', true);
                        if ($(this).val() == auditorName1) {
                            // Jika opsi auditor yang sama telah dipilih sebelumnya, hapus pilihan auditor tersebut
                            $('#auditor_id').val('');
                        }
                        if ($(this).val() == auditorName2) {
                            // Jika opsi auditor yang sama telah dipilih sebelumnya, hapus pilihan auditor tersebut
                            $('#auditor2_id').val('');
                        }
                    } else {
                        // Aktifkan kembali opsi auditor yang tidak memiliki jurusan dan program studi yang sama
                        $(this).prop('disabled', false);
                    }
                });

            }

            // Panggil fungsi populateProgramStudiAndFilterAuditor saat halaman dimuat
            populateProgramStudiAndFilterAuditor();

            $('#select-jurusan').on('change', function() {
                // Panggil fungsi populateProgramStudiAndFilterAuditor saat jurusan berubah
                populateProgramStudiAndFilterAuditor();
            });

            $('#select-prodi').on('change', function() {
                // Panggil fungsi filterAuditorOptions saat program studi berubah
                filterAuditorOptions();
            });
        });


        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#input-year').attr('min', today);


        // $(document).ready(function() {
        //     $('#auditor_id').on('change', function() {
        //         let selectedAuditorId = $(this).val();

        //         $('#auditor2_id option').each(function() {
        //             if ($(this).val() === selectedAuditorId) {
        //                 $(this).prop('disabled', true);
        //             } else {
        //                 $(this).prop('disabled', false);
        //             }
        //         });
        //     });
        // });

        let selectedCategoryAudit = $('#kategori_audit').val();
        toggleFields(selectedCategoryAudit);

        // Update the fields when the "kategori_audit" value changes
        $('#kategori_audit').on('change', function() {
            let selectedCategoryAudit = $(this).val();
            toggleFields(selectedCategoryAudit);
        });

        // Function to toggle the visibility of fields based on "kategori_audit"
        function toggleFields(selectedCategoryAudit) {
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
        }
    </script>
@endsection
