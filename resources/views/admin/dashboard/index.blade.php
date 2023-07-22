@extends('layouts.base')

@section('content')
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
                                        <h6 class="text-muted font-semibold">Auditor</h6>
                                        <h6 class="font-extrabold mb-0">{{ $userAuditor }}</h6>
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
                                    <h5 class="mb-1">{{ $item->categoryUnit->name }}</h5>
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
                        {{-- <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('assets/images/faces/5.jpg') }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Dean Winchester</h5>
                                <h6 class="text-muted mb-0">@imdean</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('assets/images/faces/1.jpg') }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">John Dodol</h5>
                                <h6 class="text-muted mb-0">@dodoljohn</h6>
                            </div>
                        </div> --}}
                        {{-- <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                            Conversation</button>
                    </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
