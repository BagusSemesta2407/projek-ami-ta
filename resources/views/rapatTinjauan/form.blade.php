@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Data AMI</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="disabledInput">Standard SPMI</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$instrumentAuditee->instrument->status_standar }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$instrumentAuditee->instrument->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->instrument->target }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->status_ketercapaian }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->deskripsi_ketercapaian }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Bukti</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->proof_id }}" disabled> --}}
                            {{-- <p>bukti</p> --}}
                            {{-- @if ($instrumentAuditee->bukti_url)
                                <a href="{{ $instrumentAuditee->bukti_url }}" download title="Unduh">
                                    {{ $instrumentAuditee->bukti }}
                                </a>
                            @endif --}}
                            <div class="col-12">
                                <a href="{{ $instrumentAuditee->bukti }}"
                                    target="_blank">{{ $instrumentAuditee->bukti }}</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen dan Daftar Tilik</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->hasil_audit_dokumen }}" disabled> --}}
                            <textarea class="col-12" disabled>{{ strip_tags($instrumentAuditee->hasil_audit_dokumen) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit/Visitasi Lapangan</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->hasil_audit_dokumen }}" disabled> --}}
                            <textarea class="col-12" disabled>{{ $instrumentAuditee->hasil_temuan_audit }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Temuan</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->status_temuan_audit }}" disabled>
                            {{-- <textarea class="col-12" disabled>{{ strip_tags($instrumentAuditee->hasil_audit_dokumen) }}</textarea> --}}
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Temuan Audit/Visitasi Lapangan</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->hasil_audit_dokumen }}" disabled> --}}
                            <textarea class="col-12" disabled>{{ $instrumentAuditee->rekomendasi }}</textarea>
                        </div>

                        <form
                            action="{{ route('menu-kepala-p4mp.rapat-tinjauan.store-pengendalian', $instrumentAuditee->id) }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Audit Resiko</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="important" value="Important">
                                        <label for="">Penting</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="important" value="Not Important">
                                        <label for="">Tidak Penting</label>
                                    </div>
                                </div>
                            </div>

                            <div clas="form-group">
                                <label for="">Deskripsi</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="deskripsi_penting" value="{{ old('deskripsi_penting', $instrumentAuditee->deskripsi_penting) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Audit Resiko</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="urgent"
                                            value="Urgent">
                                        <label for="">Mendesak</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault" name="urgent"
                                            value="Not Urgent">
                                        <label for="">Tidak Mendesak</label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div clas="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi_urgent" value="{{ old('deskripsi_urgent', @$instrumentAuditee->deskripsi_urgent) }}">
                            </div>

                            <div class="form-group">
                                <label for="">Rencana Tindak Lanjut Siklus Berikutnya</label>
                                {{-- <input type="text" class="form-control"> --}}
                                <div class="col-12">
                                    <textarea name="tindak_lanjut" id="" class="col-12">{{ @$instrumentAuditee->tindak_lanjut }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Anggaran</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="anggaran" value="Anggaran">
                                        <label for="">Anggaran</label>
                                        <input type="radio" class="form-check-input" id="flexRadioDefault"
                                            name="anggaran" value="Non Anggaran">
                                        <label for="">Non Anggaran</label>
                                    </div>
                                </div>
                            </div>

                            {{-- @if ($instrumentAuditee->status_temuan_audit == 'Tercapai')
                                <div class="form-group">
                                    <label for="">Perubahan Dokumen Standar</label>
                                    <input class="form-control form-control-lg" id="formFileLg"
                                        type="file" name="change_dokumen">
                                </div>
                            @endif --}}

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                    Submit
                                    <span class="spinner-border ml-2 d-none" id="loader"
                                        style="width: 1rem; height: 1rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- <form action="{{ route('menu-auditor.index-audit-dokumen.create-hasil-audit-dokumen', $instrumentAuditee) }}"
                        enctype="multipart/form-data" class="form form-vertical" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <textarea id="summernote" name="hasil_audit_dokumen"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                Submit
                                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </span>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </section>
@endsection
