@extends('layouts.base')

@section('content')

    <head>
        <style>
            .repeater-items {
                margin-bottom: 15px;
            }

            .remove-item {
                margin-top: 5px;
            }
        </style>

    </head>
    <section>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Data Kesimpulan dan Dokumentasi
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('menu-p4mp.tinjauan-pengendalian.store-kesimpulan', $dataInstrument) }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12 col-lg-12">
                                <div id="repeater">
                                    <div class="repeater-items">
                                        <div class="form-group">
                                            <label for="" class="col-12 col-form-label">
                                                Kelebihan
                                            </label>
                                            <input type="text" class="form-control" name="kelebihan[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-12 col-form-label">
                                                Kesimpulan
                                            </label>
                                            <input type="text" class="form-control" name="kesimpulan[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-12 col-form-label">
                                                Dokumentasi
                                            </label>
                                            <input type="file" class="image-preview-filepond" name="dokumentasi[]">
                                        </div>
                                        <button class="btn btn-danger remove-item" type="button">Remove</button>
                                    </div>
                                </div>
                                <button id="add-item" type="button" class="btn btn-primary">Add More</button>
                            </div>

                    </div>
                    
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end" id="btnSubmit">
                        Submit
                        <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                            role="status">
                        </span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Fungsi untuk menambahkan entri repeater
            $("#add-item").on("click", function() {
                var newItem = `
                    <div class="repeater-items">
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Kelebihan
                            </label>
                            <input type="text" class="form-control" name="kelebihan[]">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Kesimpulan
                            </label>
                            <input type="text" class="form-control" name="kesimpulan[]">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-12 col-form-label">
                                Dokumentasi
                            </label>
                            <input type="file" class="image-preview-filepond" name="dokumentasi[]">
                        </div>
                        <button class="btn btn-danger remove-item" type="button">Remove</button>
                    </div>
                `;
                $("#repeater").append(newItem);
            });

            // Fungsi untuk menghapus entri repeater
            $(document).on("click", ".remove-item", function() {
                $(this).closest(".repeater-items").remove();
            });
        });
    </script>
@endsection
