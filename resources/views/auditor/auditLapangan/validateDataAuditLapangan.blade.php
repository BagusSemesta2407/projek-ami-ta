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
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$instrumentAuditee->instrument->status_standar }}" disabled> --}}
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$instrumentAuditee->instrument->status_standar }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Butir Mutu</label>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$instrumentAuditee->instrument->name }}" disabled> --}}
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ @$instrumentAuditee->instrument->name }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Indikator dan Target</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ $instrumentAuditee->instrument->target }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->instrument->target }}" disabled> --}}
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Status Ketercapaian</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ $instrumentAuditee->status_ketercapaian }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->status_ketercapaian }}" disabled> --}}
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Deskripsi Ketercapaian Standard</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ $instrumentAuditee->deskripsi_ketercapaian }}</textarea>
                            </div>
                            {{-- <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $instrumentAuditee->deskripsi_ketercapaian }}" disabled> --}}
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
                                <a href="{{ $instrumentAuditee->bukti }}" target="_blank">{{ $instrumentAuditee->bukti }}</a>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Hasil Audit Dokumen</label>
                            <div class="col-12">
                                <textarea disabled class="col-12">{{ strip_tags($instrumentAuditee->hasil_audit_dokumen) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <form
                        action="{{ route('menu-auditor.index-instrument-auditor.post-validate-data-audit-lapangan', $instrumentAuditee) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Status Temuan</label>
                            <div class="col-md-12">
                                <input type="radio" class="form-check-input" id="flexRadioDefault"
                                    name="status_temuan_audit" value="Tercapai" 
                                    {{ old('Tercapai', $instrumentAuditee->status_temuan_audit) == 'Tercapai' ? 'selected' : '' }}>
                                <label for="">Tercapai</label>
                                <input type="radio" class="form-check-input" id="flexRadioDefault"
                                    name="status_temuan_audit" value="Tidak Tercapai" 
                                    {{ old('Tidak Tercapai', $instrumentAuditee->status_temuan_audit) == 'Tidak Tercapai' ? 'selected' : '' }}>
                                <label for="">Tidak Tercapai</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Hasil Temuan Audit</label>
                            <textarea name="hasil_temuan_audit" id="summernote">{{ $instrumentAuditee->hasil_temuan_audit }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Rekomendasi</label>
                            <div class="col-12">
                                <textarea name="rekomendasi" id="summernote" class="col-12">{{ $instrumentAuditee->rekomendasi }}</textarea>
                            </div>
                        </div>


                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">
                                Submit
                                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                                    role="status">
                                    <span class="sr-only">Loading...</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection --}}
