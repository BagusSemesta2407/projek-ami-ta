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
                            @if ($instrumentAuditee->bukti_url)
                                <a href="{{ $instrumentAuditee->bukti_url }}" download title="Unduh">
                                    {{ $instrumentAuditee->bukti }}
                                </a>
                            @endif
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
                            action="{{ route('menu-kepala-p4mp.peningkatan.store-peningkatan', $instrumentAuditee->id) }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        

                            @if ($instrumentAuditee->status_temuan_audit == 'Tercapai')
                                <div class="form-group">
                                    <label for="">Perubahan Dokumen Standar</label>
                                    <input class="form-control form-control-lg" id="formFileLg"
                                        type="file" name="change_dokumen">
                                </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                    Submit
                                    <span class="spinner-border ml-2 d-none" id="loader"
                                        style="width: 1rem; height: 1rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </button>
                            </div>
                            @endif

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
