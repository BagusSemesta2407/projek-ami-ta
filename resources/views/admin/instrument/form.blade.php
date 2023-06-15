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
                            Data Unit Kerja
                        </h4>
                    </div>

                    @if (@$instrument->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.instrument.update', $instrument) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.instrument.store') }}">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Pilih Unit <sup class="text-danger">*</sup>
                                            </label>
        
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select name="category_unit_id"
                                                        class="choices form-select @error('category_unit_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">
                                                            Pilih Kategori Artikel
                                                        </option>
        
                                                        @foreach ($categoryUnit as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('category_unit_id', @$instrument->category_unit_id) == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('category_unit_id'))
                                                    <span class="text-danger">{{ $errors->first('category_unit_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Pertanyaan</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                name="name" placeholder="Masukkan Nama Kategori Unit Kerja"
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
                                                name="target" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('target', @$instrument->target) }}">

                                            @if ($errors->has('target'))
                                                <span class="text-danger">{{ $errors->first('target') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Standar AMI</label>
                                            <select class="choices form-select" name="status_standar" id="status_standar">
                                                <option value="" selected="" disabled="">Masukkan Standar</option>
                                                <option value="Pendidikan" {{ old('Pendidikan', @$instrument->status_standar) == 'Pendidikan' ? 'selected' : ''}}>Pendidikan</option>
                                                <option value="Penelitian" {{ old('Penelitian', @$instrument->status_standar) == 'Penelitian' ? 'selected' : ''}}>Penelitian</option>
                                                <option value="Pengabdian Kepada Masyarakat" {{ old('Pengabdian Kepada Masyarakat', @$instrument->status_standar) == 'Pengabdian Kepada Masyarakat' ? 'selected' : ''}}>Pengabdian Kepada Masyaraket</option>
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
