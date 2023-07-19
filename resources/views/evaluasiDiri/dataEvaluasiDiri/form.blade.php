@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ isset($evaluasiDiri) ? 'Edit' : 'Tambah' }} Evaluasi Diri
                </h4>

                <form class="form form-vertical" enctype="multipart/form-data" method="POST"
                    action="{{ isset($evaluasiDiri) ? route('menu-auditee.evaluasi-diri.update-data-evaluasi-diri', [$getDataInstrument, $getInstrument, $evaluasiDiri]) : route('menu-auditee.evaluasi-diri.post-data-evaluasi-diri', [$getDataInstrument, $getInstrument]) }}" id="form">
                    {{ csrf_field() }}
                    @if (isset($evaluasiDiri))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <b>
                                    Standar SPMI :
                                </b>
                                <div>
                                    {{ $getInstrument->status_standar }}
                                </div>

                                <div class="col-12">
                                    <b>
                                        Instrument/Butir Mutu :
                                    </b>
                                    <div>
                                        {{ $getInstrument->name }}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <b>
                                        Indikator dan Target :
                                    </b>
                                    <div>
                                        {{ $getInstrument->target }}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Status Ketercapaian</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="status_ketercapaian" value="Tercapai"
                                            {{ old('Tercapai', @$evaluasiDiri->status_ketercapaian) == 'Tercapai' ? 'checked' : '' }}>
                                        <label for="">Penting</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault1"
                                            name="status_ketercapaian" value="Tidak Tercapai"
                                            {{ old('Tidak Tercapai', @$evaluasiDiri->status_ketercapaian) == 'Tidak Tercapai' ? 'checked' : '' }}>
                                        <label for="">Tidak Penting</label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Hasil Evaluasi Diri</label>
                                    <p>(Deskripsi Ketercapaian Standar)</p>
                                    <div class="col-12">
                                        <textarea name="deskripsi_ketercapaian" id="summernote" class="col-12">{{ @$evaluasiDiri->deskripsi_ketercapaian }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti</label>
                                    <div class="col-12">
                                        <input type="text" name="bukti" class="form-control" value="{{ @$evaluasiDiri->bukti }}">
                                        {{-- <textarea name="deskripsi_ketercapaian" id="summernote" class="col-12">{{ @$evaluasiDiri->deskripsi_ketercapaian }}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Catatan</label>
                                    <div class="col-12">
                                        <textarea name="catatan" id="summernote1" class="col-12">{{ @$evaluasiDiri->catatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-1 mb-1 float-end"
                            id="btnSubmit">
                            {{ isset($evaluasiDiri) ? 'Edit' : 'Tambah' }}
                            <span class="spinner-border ml-2 d-none" id="loader"
                                style="width: 1rem; height: 1rem;" role="status">
                            </span>
                        </button>
                    </div>
                </form>
            </div>
    </section>
@endsection
