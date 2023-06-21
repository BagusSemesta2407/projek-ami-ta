@extends('layouts.base')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
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

                    @if (@$categoryUnit->exists)
                        <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.category-unit.update', $categoryUnit) }}">
                            @method('PUT')
                        @else
                            <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.category-unit.store') }}" id="repeater-form">
                    @endif
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row repeater">
                                    <div class="col-lg-6" data-repeater-list="">
                                        <div class="form-group" data-repeater-item>
                                            <label for="first-name-vertical">Unit/Program Studi/Jurusan</label>
                                            <input type="text" id="first-name-vertical"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                name="name" placeholder="Masukkan Nama Kategori Unit Kerja"
                                                value="{{ old('name', @$categoryUnit->name) }}">
                                            {{-- <button data-repeater-delete type="button">Delete</button> --}}


                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex justify-content-start">
                                        <button data-repeater-create type="button" value="Add"
                                            class="btn btn-sm font-weight-bolder btn-light-primary">Add</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit" value="submit">
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

    {{-- <form id="repeater-form">
        <div class="repeater">
            <div data-repeater-list="group-a">
                <div data-repeater-item>
                    <select name="field-1" class="field-1">
                        <option value="">Select an option</option>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                    <select name="field-2" class="field-2" disabled>
                        <option value="">Select an option</option>
                    </select>
                    <button data-repeater-delete type="button">Delete</button>
                </div>
            </div>
            <button data-repeater-create type="button">Add</button>
        </div>
        <input type="submit" value="Submit" />
    </form> --}}
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/jquery-1.11.1.js') }}"></script>
    <script src="{{ asset('assets/jquery.repeater.js') }}"></script>
    <script>
        $(document).ready(function() {
            'use strict';

            $('.repeater').repeater({
                
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function(setIndexes) {

                }
            });

        });
    </script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });


            $('#repeater-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: {{ url('admin/category-unit/store') }},
                    data: formData,
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script> --}}
@endsection
