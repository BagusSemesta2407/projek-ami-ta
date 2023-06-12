@extends('layouts.base')

@section('content')
    {{-- <head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head> --}}
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                {{-- <div class="card">
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
                            Data Unit Kerja
                        </h4>
                    </div>

                    @if (@$dataInstrument->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.data-instruments.update', $dataInstrument) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.data-instruments.store') }}">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Auditor <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="auditor_id"
                                                        class="form-control select2 @error('auditor_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Auditor
                                                        </option>

                                                        @foreach ($userAuditor as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditor_id', @$dataInstrument->auditor_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('auditor_id'))
                                                    <span class="text-danger">{{ $errors->first('auditor_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Auditee <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="auditee_id"
                                                        class="form-control select2 @error('auditee_id') is-invalid @enderror">
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
                                                </div>
                                                @if ($errors->has('auditee_id'))
                                                    <span class="text-danger">{{ $errors->first('auditee_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Unit Kerja <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="category_unit_id"
                                                        class="form-control select2 @error('category_unit_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Unit
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
                                                    <input type="number" name="year" class="form-control" id="datepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> --}}
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
                            action="{{ route('admin.data-instruments.update', $dataInstrument) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.data-instruments.store') }}">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Auditor <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="auditor_id"
                                                        class="form-control select2 @error('auditor_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Auditor
                                                        </option>

                                                        @foreach ($userAuditor as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('auditor_id', @$dataInstrument->auditor_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('auditor_id'))
                                                    <span class="text-danger">{{ $errors->first('auditor_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Auditee <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="auditee_id"
                                                        class="form-control select2 @error('auditee_id') is-invalid @enderror">
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
                                                </div>
                                                @if ($errors->has('auditee_id'))
                                                    <span class="text-danger">{{ $errors->first('auditee_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Unit Kerja <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="category_unit_id"
                                                        class="form-control select2 @error('category_unit_id') is-invalid @enderror"
                                                        id="select-unit">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Unit
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
                                                    <input type="number" name="year" class="form-control"
                                                        id="input-year" value="{{ old('year', @$dataInstrument->year) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group list-group">
                                            <label for="" class="col-sm-3 col-form-label">
                                                Pilih Document Standard
                                            </label>
                                            <ul class="list-group">
                                                @forelse (@$documentStandard as $item)
                                                    <li class="list-group-item">
                                                        @if ($item->media)
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $item->getFirstMediaUrl('documentStandard') }}"
                                                            aria-label="..." name="documentStandard[]">
                                                            {{ @$item->getFirstMedia('documentStandard')->file_name }}
                                                        @endif
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
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
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
