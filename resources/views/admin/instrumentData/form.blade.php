@extends('layouts.base')

@section('content')
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
                                                        id="datepicker">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- form-question --}}
                                        <div class="border p-4 rounded mt-4"
                                            id="section-question">
                                            
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
    {{-- <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy'
            });
        });​
    </script> --}}

    <script type="text/javascript">
        $('#select-unit').on('change', function() {
            // console.log('sukses');
            var unitId = $(this).val();
            console.log(unitId);

            $.ajax({
                type: "GET",
                url: "/admin/getDataInstrumentId/" + unitId,
                dataType:'json',
                success:function(data){
                    console.log(data);
                    
                },
                error:function(error){
                    console.log(error);
                }
            })

            $('#section-question').html('');

            $('#section-question').append(
                `<div>
                    <h4>Form Instrument</h4>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <table class="table table-hover table-secondary table-bordered-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@$instrument as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $item->name }}
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                `
            )
        })
    </script>
@endsection
