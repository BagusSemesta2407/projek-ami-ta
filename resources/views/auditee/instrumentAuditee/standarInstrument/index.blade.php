@extends('layouts.base')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    </head>

    <section class="section">
        <div class="card">
            <div class="card-body">
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
                            <div class="col-md-3">
                                {{ @$dataInstrument->auditor->name }}
                            </div>
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Status
                                </b>
                            </label>
                            <div class="col-md-3 badges">
                                @if (@$dataInstrument->status == 'On Progress')
                                    {{-- On Progress --}}
                                    <span class="badge bg-secondary">On Progress</span>
                                @elseif (@$dataInstrument->status == 'Sudah Di Jawab Auditee')
                                    <span class="badge bg-warning">Menunggu Validasi Auditor</span>
                                @else
                                    Selesai
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-3 text-black">
                                <b>
                                    Tahun
                                </b>
                            </label>
                            <div class="col-md-3">{{ @$dataInstrument->year }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <div class="card col-md-7">
                    {{-- <div class="card-header">
                        <h5 class="card-title">Horizontal Navs</h5>
                    </div> --}}
                    <div class="card-body">
                        <form
                            action="{{ route('menu-auditee.instruments-auditee.store-form-instrument-auditee', $dataInstrument->id) }}"
                            enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}


                            <button type="submit" class="btn btn-outline-primary block float-end">
                                <i class="bi bi-send"></i>
                            </button>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="{{ route('menu-auditee.instruments-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => null]) }}"
                                        class="nav-link {{ $status_standar == null ? 'active' : '' }}">
                                        Semua
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('menu-auditee.instruments-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Pendidikan']) }}"
                                        class="nav-link {{ $status_standar == 'Pendidikan' ? 'active' : '' }}">
                                        Pendidikan
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('menu-auditee.instruments-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Penelitian']) }}"
                                        class="nav-link {{ $status_standar == 'Penelitian' ? 'active' : '' }}">
                                        Penelitian
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{ route('menu-auditee.instruments-auditee.status-standar', ['dataInstrument' => $dataInstrument->id, 'status_standar' => 'Pengabdian Kepada Masyarakat']) }}"
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
                                                <th class="text-center">Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse (@$instrument as $item)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        <p id="instrument_id">
                                                            {{ $item->name }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <input class="form-check-input" type="radio"
                                                            id="flexRadioDefault{{ $loop->index }}"
                                                            name="data[{{ $item->id }}][answer]{{ $loop->index }}"
                                                            value="ya" {{ old('ya') }}>
                                                    </td>

                                                    <td>
                                                        <input class="form-check-input" type="radio"
                                                            id="flexRadioDefault1{{ $loop->index }}"
                                                            name="data[{{ $item->id }}][answer]{{ $loop->index }}"
                                                            value="tidak" {{ old('tidak') }}>
                                                    </td>

                                                    <td>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1{{ $loop->index }}"
                                                            name="data[{{ $item->id }}][reason]"></textarea>
                                                    </td>

                                                    <td class="text-center">
                                                        {{-- <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                            data-bs-target="#inlineForm" id="modal{{ $loop->index }}">
                                                                <i class="bi bi-front"></i>
                                                            </button> --}}

                                                    </td>
                                                </tr>
                                            @empty
                                                <td class="text-center col-12" colspan="6">
                                                    <img src="{{ asset('empty.svg') }}" alt="" class="m-4">
                                                    <p>
                                                        Instrument Menunggu Validasi
                                                    </p>
                                                    <a href="{{ route('menu-auditee.instruments-auditee.detail-instrument-auditee', $dataInstrument->id) }}"
                                                        class="dropdown-item">
                                                        Klik Untuk Lihat Detail Instrument
                                                    </a>
                                                </td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card col-lg-4">
                    <div class="card-header">
                        <h4 class="card-title">Upload Bukti</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div id="tag-container">
                                <div class="input-group mb-3">
                                    {{-- <div id="input">
                                        <div id="file" class="col-12">
                                            <label for="formFileLg" class="form-label">Large file input example</label>
                                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="name">
                                        </div>

                                        <div id="tag" class="mb-3 col-12">
                                            <label for="formFileLg" class="form-label">Large file input example</label>
                                            <select name="datas[{{ $instrument }}][data]" id="countries" multiple>
                                                @foreach ($instrument as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="input-group-append">
                                {{-- <button class="btn btn-primary add-tag" type="button">Add</button> --}}
                                {{-- <button class="btn btn-danger remove-tag" type="button">Hapus</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('countries') // id
    </script>

    <script>
        $(document).ready(function() {
            $('.add-tag').click(function() {
                var tagContainer = $('#tag-container');
                var tagCount = tagContainer.children().length + 1;
                var newTag =
                    // $('#input').append() +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-danger remove-tag" type="button">Hapus</button>' +
                    '</div>' +
                    '</div>';

                tagContainer.append(newTag);
            });

            $(document).on('click', '.remove-tag', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection
