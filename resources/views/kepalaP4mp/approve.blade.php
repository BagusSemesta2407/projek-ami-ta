@extends('layouts.base')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Data AMI</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Auditee</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$dataInstrument->auditee->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Auditor 1</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$dataInstrument->auditor->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Auditor 2</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ @$dataInstrument->auditor2->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Unit/Program Studi/Jurusan</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ $dataInstrument->categoryUnit->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Tahun</label>
                            <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text"
                                value="{{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Document Standard</label>
                            <div class="col-md-6">

                                @if ($dataInstrument->dokumenStandar)
                                    @foreach ($dataInstrument->dokumenStandar as $items)
                                        <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                            <option value="{{ $items }}">{{ $items }}</option>
                                        </a>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        @if ($dataInstrument->status == 'Menunggu Konfirmasi Kepala P4MP')
                            <form action="{{ route('menu-p4mp.approval-data-ami.approve-data-ami', $dataInstrument) }}"
                                enctype="multipart/form-data" class="form form-vertical" method="POST" id="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="disabledInput">Status</label>
                                    <select name="status" id="status"
                                        class="choices form-select @error('status')
                                is-invalid
                                @enderror">
                                        <option value="" selected disabled>
                                            Pilih Status
                                        </option>

                                        <option value="On Progress"
                                            {{ old('On Progress', $dataInstrument->status) == 'On Progress' ? 'selected' : '' }}>
                                            Konfirmasi</option>
                                        <option value="Ditolak Kepala P4MP"
                                            {{ old('Ditolak Kepala P4MP', $dataInstrument->status) == 'Ditolak Kepala P4MP' ? 'selected' : '' }}>
                                            Tolak</option>
                                    </select>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-outline-primary me-1 mb-1" id="btnSubmit">
                Submit
                <span class="spinner-border ml-2 d-none" id="loader" style="width: 1rem; height: 1rem;"
                    role="status">
                </span>
            </button>
        </div>
        </form>
        @endif

    </section>
@endsection
