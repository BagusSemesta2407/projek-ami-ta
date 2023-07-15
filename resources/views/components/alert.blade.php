<div class="card-body">
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
                        Tanggal Audit
                    </b>
                </label>

                <div class="col-md-3">
                    {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}
                </div>
            </div>

            <div class="row">
                <label for="" class="col-md-3 text-black">
                    <b>
                        Auditor 1
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->auditor->name }}
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
                        Auditor 2
                    </b>
                </label>

                <div class="col-md-3">
                    {{ @$dataInstrument->auditor2->name }}
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
                        <span class="badge bg-warning">Audit Dokumen</span>
                    @elseif ($dataInstrument->status == 'Audit Lapangan')
                        <span class="badge bg-warning">Audit Lapangan</span>
                    @elseif ($dataInstrument->status == 'Selesai')
                        <span class="badge bg-success">
                            Selesai
                        </span>
                    @elseif ($dataInstrument->status == 'Menunggu Konfirmasi Kepala P4MP')
                        <span class="badge bg-primary">
                            Menunggu Konfirmasi Kepala P4MP
                        </span>
                    @else
                        <span class="badge bg-danger">
                            Data AMI Ditolak
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>