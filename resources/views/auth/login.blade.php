<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AMI | POLITEKNIK NEGERI SUBANG</title>
    <link rel="stylesheet" href="{{ asset('assets-lp/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/css/theme.css') }}">

</head>

<body>
    <section class="vh-100" style="background-color: #ffffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="{{ asset('bg-login.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0">Audit Mutu Internal</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Politeknik Negeri
                                            Subang
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="">Email address</label>
                                            <input type="email" id="email"
                                                class="form-control form-control-lg @error('email')
                                                    is-invalid
                                                @enderror"
                                                name="email" value="{{ old('email') }}" autocomplete="email"
                                                autofocus placeholder="Masukkan Email Address">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="">Password</label>
                                            <input id="password" type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" autocomplete="current-password"
                                                placeholder="Masukkan Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets-lp/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/google-maps.js') }}"></script>

    <script src="{{ asset('assets-lp/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/theme.js') }}"></script>

</body>

</html>
