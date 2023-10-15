@extends('layouts.base')

@section('content')
    @role('admin|P4MP')
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">User</h6>
                                            <h6 class="font-extrabold mb-0">{{ $user }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Audit</h6>
                                            <h6 class="font-extrabold mb-0">{{ $categoryUnit }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Report RTM </h6>
                                            <h6 class="font-extrabold mb-0">{{ $risalahRapat }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Hasil AMI</h6>
                                            <h6 class="font-extrabold mb-0">{{ $dataInstrument }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Profile Visit</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                    {{-- <h6 class="text-muted mb-0">{{ Auth::user()->roles() = 'name' }}</h6> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Unit Audit</h4>
                        </div>
                        <div class="card-content pb-4">

                            @foreach ($listDataInstrument as $item)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        {{-- <img src="{{ asset('assets/images/faces/4.jpg') }}"> --}}
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">
                                            @if ($item->kategori_audit == 'Unit')
                                                {{ $item->unit->name }}
                                            @elseif ($item->kategori_audit == 'Program Studi')
                                                {{ $item->programStudi->name }}
                                            @else
                                                {{ $item->jurusan->name }}
                                            @endif
                                        </h5>
                                        {{-- <h6 class="text-muted mb-0">@johnducky</h6> --}}
                                        @if ($item->status == 'On Progress')
                                            <span class="badge bg-secondary">On Progress</span>
                                        @elseif ($item->status == 'Sudah Di Jawab Auditee')
                                            <span class="badge bg-info">Audit Dokumen</span>
                                        @elseif ($item->status == 'Audit Lapangan')
                                            <span class="badge bg-warning">Audit Lapangan</span>
                                        @elseif ($item->status == 'Selesai')
                                            <span class="badge bg-success">
                                                Selesai
                                            </span>
                                        @elseif ($item->status == 'Menunggu Konfirmasi Kepala P4MP')
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endrole
    @role('auditee')
        <div class="card">
            <div class="card-header">
                Data Instrument

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Auditee</th>
                            <th>Akun Auditee</th>
                            <th>Auditor 1</th>
                            <th>Auditor 2</th>
                            <th>Tahun</th>
                            <th>Dokumen Standar</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach (@$listDataInstrument as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if ($item->kategori_audit == 'Unit')
                                        {{ $item->unit->name }}
                                    @elseif ($item->kategori_audit == 'Program Studi')
                                        {{ $item->programStudi->name }}
                                    @else
                                        {{ $item->jurusan->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ @$item->auditee->email }}
                                </td>
                                <td>
                                    {{ @$item->auditor->user->name }}
                                </td>
                                <td>
                                    {{ @$item->auditor2->user->name }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                </td>

                                <td>
                                    {{-- @if ($item->dokumenStandar)
                                    @foreach ($item->dokumenStandar as $items)
                                        <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                            <div class="d-flex">
                                                <i class="bi bi-filetype-docx"></i>
                                                <option value="{{ $items }}">{{ $items }}</option>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif --}}
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLong{{ $loop->index }}"><i>Klik
                                            Disini</i></a>
                                    <div class="modal fade" id="exampleModalLong{{ $loop->index }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Dokumen Standar
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($item->dokumenStandar)
                                                        @foreach ($item->dokumenStandar as $items)
                                                            <a
                                                                href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                                                <div class="d-flex">
                                                                    <span class="badge bg-light-secondary"><i
                                                                            class="bi bi-filetype-docx"></i></span>
                                                                    <option value="{{ $items }}">
                                                                        {{ $items }}</option>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="badges">
                                    @if ($item->status == 'On Progress')
                                        <span class="badge bg-secondary">On Progress</span>
                                    @elseif ($item->status == 'Sudah Di Jawab Auditee')
                                        <span class="badge bg-info">Audit Dokumen</span>
                                    @elseif ($item->status == 'Audit Dokumen')
                                        <span class="badge bg-warning">Audit Dokumen</span>
                                    @elseif ($item->status == 'Audit Lapangan')
                                        <span class="badge bg-warning">Audit Lapangan</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span class="badge bg-success">
                                            Selesai
                                        </span>
                                    @elseif ($item->status == 'Menunggu Konfirmasi Kepala P4MP')
                                        <span class="badge bg-primary">
                                            Menunggu Konfirmasi Kepala P4MP
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Data AMI Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endrole
    @role('auditor')
        <div class="card">
            <div class="card-header">
                Data Instrument

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Auditee</th>
                            <th>Akun Auditee</th>
                            <th>Auditor 1</th>
                            <th>Auditor 2</th>
                            <th>Tahun</th>
                            <th>Dokumen Standar</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach (@$listDataInstrument as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if ($item->kategori_audit == 'Unit')
                                        {{ $item->unit->name }}
                                    @elseif ($item->kategori_audit == 'Program Studi')
                                        {{ $item->programStudi->name }}
                                    @else
                                        {{ $item->jurusan->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ @$item->auditee->email }}
                                </td>
                                <td>
                                    {{ @$item->auditor->user->name }}
                                </td>
                                <td>
                                    {{ @$item->auditor2->user->name }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('d F Y') }}
                                </td>

                                <td>
                                    {{-- @if ($item->dokumenStandar)
                                    @foreach ($item->dokumenStandar as $items)
                                        <a href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                            <div class="d-flex">
                                                <i class="bi bi-filetype-docx"></i>
                                                <option value="{{ $items }}">{{ $items }}</option>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif --}}
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLong{{ $loop->index }}"><i>Klik
                                            Disini</i></a>
                                    <div class="modal fade" id="exampleModalLong{{ $loop->index }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Dokumen Standar
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($item->dokumenStandar)
                                                        @foreach ($item->dokumenStandar as $items)
                                                            <a
                                                                href="{{ asset('storage/public/file/dokumenStandar/' . $items) }}">
                                                                <div class="d-flex">
                                                                    <span class="badge bg-light-secondary"><i
                                                                            class="bi bi-filetype-docx"></i></span>
                                                                    <option value="{{ $items }}">
                                                                        {{ $items }}</option>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="badges">
                                    @if ($item->status == 'On Progress')
                                        <span class="badge bg-secondary">On Progress</span>
                                    @elseif ($item->status == 'Sudah Di Jawab Auditee')
                                        <span class="badge bg-info">Audit Dokumen</span>
                                    @elseif ($item->status == 'Audit Dokumen')
                                        <span class="badge bg-warning">Audit Dokumen</span>
                                    @elseif ($item->status == 'Audit Lapangan')
                                        <span class="badge bg-warning">Audit Lapangan</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span class="badge bg-success">
                                            Selesai
                                        </span>
                                    @elseif ($item->status == 'Menunggu Konfirmasi Kepala P4MP')
                                        <span class="badge bg-primary">
                                            Menunggu Konfirmasi Kepala P4MP
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Data AMI Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endrole
@endsection

@section('script')
    <script type="text/javascript">
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'sales',
                data: [<?= $data['januari'] ?>, <?= $data['februari'] ?>, <?= $data['maret'] ?>,
                    <?= $data['april'] ?>, <?= $data['mei'] ?>, <?= $data['juni'] ?>,
                    <?= $data['juli'] ?>, <?= $data['agustus'] ?>, <?= $data['september'] ?>,
                    <?= $data['oktober'] ?>, <?= $data['november'] ?>,
                    <?= $data['desember'] ?>
                ]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember"
                ],
            },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();
    </script>
@endsection
