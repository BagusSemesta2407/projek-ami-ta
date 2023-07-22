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
                    <a href="" class="nav-link">
                        Dokumen Mutu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        Hasil AMI
                    </a>
                </li>
            </ul>
            <div class="page-section" id="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 py-3 wow fadeInUp">
                            <span class="subhead">About us</span>
                            <h2 class="title-section">The number #1 SEO Service Company</h2>
                            <div class="divider"></div>
        
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                                ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
                            <a href="about.html" class="btn btn-primary mt-3">Read More</a>
                        </div>
                        <div class="col-lg-6 py-3 wow fadeInRight">
                            <div class="img-fluid py-3 text-center">
                                <img src="{{ asset('logo-polsub.png') }}" width="500" alt="">
                                <img src="{{ asset('po') }}" width="500" alt="">
                            </div>
                        </div>
                    </div>
                </div> <!-- .container -->
            </div>
        </div>
    </div>

    .
@endsection
