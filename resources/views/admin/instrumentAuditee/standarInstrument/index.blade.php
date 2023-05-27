@extends('layouts.base')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="card-title">Horizontal Navs</h5>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('admin.instrument-auditee.store-form-instrument-auditee', $dataInstrument->id) }}" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="alert alert-secondary">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label for="" class="col-md-3 text-black">
                                            <b>
                                                Auditee
                                            </b>
                                        </label>
                                        <div class="col-md-3">{{ @$dataInstrument->auditee->name }}</div>
                                        <label for="" class="col-md-3 text-black">
                                            <b>
                                                Unit Kerja
                                            </b>
                                        </label>
                                        <div class="col-md-3">{{ @$dataInstrument->categoryUnit->name }}</div>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-md-3 text-black">
                                            <b>
                                                Auditor
                                            </b>
                                        </label>
                                        <div class="col-md-3">{{ @$dataInstrument->auditor->name }}</div>
                                        <label for="" class="col-md-3 text-black">
                                            <b>
                                                Status
                                            </b>
                                        </label>
                                        <div class="col-md-3">status</div>
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-md-3 text-black">
                                            <b>
                                                Tahun
                                            </b>
                                        </label>
                                        <div class="col-md-3">{{ $dataInstrument->year }}</div>
                                    </div>
                                </div>
                            </div>
                            {{-- <form action="" method="GET"> --}}
                            {{-- <a href="{{ route('admin.instrument.create-form-instrument' , $categoryUnit->id) }}" class="btn btn-outline-primary block float-end">
                                <i class="bi bi-send"></i>
                            </a> --}}

                            <button type="submit" class="btn btn-outline-primary block float-end">
                                <i class="bi bi-send"></i>
                            </button>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="{{ route('admin.instrument-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => null]) }}"
                                        class="nav-link {{ $status_standar == null ? 'active' : '' }}">
                                        Semua
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('admin.instrument-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Pendidikan']) }}"
                                        class="nav-link {{ $status_standar == 'Pendidikan' ? 'active' : '' }}">
                                        Pendidikan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('admin.instrument-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Penelitian']) }}"
                                        class="nav-link {{ $status_standar == 'Penelitian' ? 'active' : '' }}">
                                        Penelitian
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('admin.instrument-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Pengabdian Kepada Masyarakat']) }}"
                                        class="nav-link {{ $status_standar == 'Pengabdian Kepada Masyarakat' ? 'active' : '' }}">
                                        Pengabdian Kepada Masyarakat
                                    </a>
                                </li>
                            </ul>

                            {{-- </form> --}}

                            <div class="card-header">

                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>Ya</th>
                                                <th>Tidak</th>
                                                <th>Keterangan</th>
                                                <th>Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (@$instrument as $item)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>

                                                        <p name="instrument_id[]" value="{{ $item->id }}" {{ old('instrument_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <input class="form-check-input" type="radio"
                                                             id="flexRadioDefault{{ $loop->index }}" name="answer[]{{ $loop->index }}" value="ya" {{ old('ya') }}>
                                                    </td>

                                                    <td>
                                                        <input class="form-check-input" type="radio"
                                                            id="flexRadioDefault{{ $loop->index }}" name="answer[]{{ $loop->index }}" value="tidak" {{ old('tidak') }}>
                                                    </td>

                                                    <td>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $loop->index }}" name="reason[]"></textarea>
                                                    </td>

                                                    <td class="align-middle">
                                                        <input type="file" class="basic-filepond" rows="3" name="proof[]" {{ old('proof') }}>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('change', function() {
            if ('[id=form-instrument]') {
                $('#add-form-instrument').hide();
            } else {
                $('#add-form-instrument').show();
            }
        })
    </script>
@endsection
