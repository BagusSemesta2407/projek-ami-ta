@extends('landingPage.base')
@section('header')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100" style="background-image: url('lp-polsub.jpg')">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">PPPPMP</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">PPPPMP</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 py-3">
                    <h2 class="title-section">PPPPMP</h2>
                    <div class="divider"></div>

                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a href="{{ route('p4mp') }}" class="nav-link">
                        Dokumen Mutu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hasil-ami') }}" class="nav-link">
                        Hasil AMI
                    </a>
                </li>
            </ul>
            <div class="page-section" id="about">
                <div class="container">
                    {{-- @foreach ($dataInstrument as $value)
                        <td>
                            <a href="{{ route('cetak-hasil-ami', $value->id) }}">
                                AMI 
                            </a>
                        </td>
                    @endforeach --}}
                </div> <!-- .container -->
            </div>
        </div>
    </div>

    .
@endsection
