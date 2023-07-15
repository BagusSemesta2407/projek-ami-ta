@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (@$dataInstrument->exists)
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
                            Instrument Pertanyaan
                        </h4>
                    </div>

                    @if (@$dataInstrument->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.data-instruments.update', $dataInstrument) }}" id="form">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.data-instruments.store') }}" id="form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Auditor 1 <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <select name="auditor_id"
                                                    class="form-select select2 @error('auditor_id') is-invalid @enderror"
                                                     >
                                                     <option value="" selected="" disabled="">
                                                        Pilih Auditor 1
                                                    </option>
                                                    @foreach ($userAuditor as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('auditor_id', @$dataInstrument->auditor_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('auditor_id'))
                                                    <span class="text-danger">{{ $errors->first('auditor_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Auditor 2 <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <select name="auditor2_id"
                                                    class="form-select select2 @error('auditor2_id') is-invalid @enderror">
                                                    <option value="" selected="" disabled="">
                                                        Pilih Auditor 2
                                                    </option>

                                                    @foreach ($userAuditor as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('auditor2_id', @$dataInstrument->auditor2_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('auditor2_id'))
                                                    <span class="text-danger">{{ $errors->first('auditor2_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Auditee <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                {{-- <div class="input-group"> --}}
                                                    <select name="auditee_id"
                                                        class="form-select select2 @error('auditee_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Auditee
                                                        </option>

                                                        @foreach ($userAuditee as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditee_id', @$dataInstrument->auditee_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                {{-- </div> --}}
                                                @if ($errors->has('auditee_id'))
                                                    <span class="text-danger">{{ $errors->first('auditee_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                            Pilih Unit/Program Studi/Jurusan <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="category_unit_id"
                                                        class="form-select select2 @error('category_unit_id') is-invalid @enderror"
                                                        id="select-unit">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Unit/Program Studi/Jurusan
                                                        </option>

                                                        @foreach ($categoryUnit as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('category_unit_id', @$dataInstrument->category_unit_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('category_unit_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('category_unit_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-3 col-form-label">
                                                Tahun
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="date" name="tanggal_audit"
                                                        class="form-control @error('tanggal_audit')
                                                        is-invalid
                                                    @enderror"
                                                        id="input-year"
                                                        value="{{ old('tanggal_audit', @$dataInstrument->tanggal_audit) }}">
                                                </div>
                                                @if ($errors->has('tanggal_audit'))
                                                    <span class="text-danger">{{ $errors->first('tanggal_audit') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group list-group">
                                            <label for="" class="col-sm-3 col-form-label">
                                                 Dokumen Standar
                                            </label>
                                            <ul class="list-group">
                                                @forelse (@$dokumenStandar as $item)
                                                    <li class="list-group-item">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="dokumenStandar[]" value="{{ $item->file }}"
                                                            {{ old('dokumenStandar', @$dataInstrument->dokumenStandar) == $item->id ? 'selected' : '' }}
                                                            aria-label="...">
                                                        {{ $item->file }}
                                                    </li>
                                                @empty
                                                    <i>
                                                        Data Document Standard Tidak Ada
                                                    </i>
                                                @endforelse
                                            </ul>
                                        </div>

                                        {{-- form-question --}}
                                        <div class="border p-4 rounded mt-4" id="section-question">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- 
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            dcdc
                        </h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="col-sm-3 col-form-label">
                                                Tujuan
                                            </label>

                                            <div class="col-md-6" id="repeater">
                                                <button type="button" class="btn btn-primary" id="add-input-tujuan">
                                                    <i class="bi bi-plus-circle"></i>
                                                </button>
                                                <br>
                                                <br>
                                                <div class="input-group input-tujuan">
                                                    <input type="text" class="form-control">
                                                    
                                                    &nbsp;
                                                    &nbsp;
                                                    <button type="button" class="btn btn-danger" id="delete-input-tujuan">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
        $('#select-unit').on('change', function() {
            // console.log('sukses');
            var unitId = $(this).val();
            console.log(unitId);

            $.ajax({
                type: "GET",
                url: "/admin/getDataInstrumentId/" + unitId,
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    var sectionQuetion = $('#section-question');
                    var table = $('<table class="table table-hover table-secondary   table-bordered">');
                    var headerRow = $('<tr>');

                    sectionQuetion.html('');

                    headerRow.append($('<th>').text('No'));
                    headerRow.append($('<th>').text('Pertanyaan'));

                    table.append(headerRow);
                    sectionQuetion.append('<h5>List Instrument</h5>');

                    if (response.length > 0) {
                        response.forEach(function(data, index) {
                            console.log(data);

                            var dataRow = $('<tr>');
                            dataRow.append('<td>' + (index + 1) + '</td>');
                            dataRow.append('<td>' + data.name + '</td>');

                            table.append(dataRow);
                        });
                        sectionQuetion.append(table);
                    } else {
                        sectionQuetion.append('Tidak Ada Data Instrument');
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            })
        })

        // $(document).ready(function(){
        //     $('#add-input-tujuan').click(function(){
        //         var selectedElement=$('.input-tujuan:last').clone();

        //         selectedElement.find('input').val('');
        //         $('#repeater').append(selectedElement);
        //     })
        // })
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Inisialisasi datepicker
            $('#input-year').datepicker({
                dateFormat: 'yy',
                changeYear: true,
                showButtonPanel: true,
                yearRange: '1900:2099',
                onClose: function(dateText, inst) {
                    var year = $(this).datepicker('getDate').getFullYear();
                    $(this).val(year);
                }
            });
        });
    </script> --}}
@endsection
