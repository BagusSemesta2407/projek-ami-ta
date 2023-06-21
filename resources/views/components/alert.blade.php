{{-- <div> --}}
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="alert alert-secondary">
        <div class="col-md-12">
            <div class="row">
                <label for="" class="col-md-3 text-black">
                    <b>
                        Auditee
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->auditee->name }}
                </div>

                <label for="" class="col-md-3 text-black">
                    <b>
                        Unit Kerja
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->categoryUnit->name }}
                </div>
            </div>

            <div class="row">
                <label for="" class="col-md-3 text-black">
                    <b>
                        Auditor
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->auditor->name }}
                </div>

                <label for="" class="col-md-3 text-black">
                    <b>
                        Status
                    </b>
                </label>

                <div class="col-md-3 badges">
                    @if ($dataInstrument->status == 'On Progress')
                        <span class="badge bg-secondary">On Progress</span>
                    @elseif ($dataInstrument->status == 'Sudah Di Jawab Auditee')
                        <span class="badge bg-warning">Menunggu Validasi Auditor</span>
                    @else
                        <span class="badge bg-success">
                            Selesai
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="" class="col-md-3 text-black">
                    <b>
                        Tahun
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->year }}
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}