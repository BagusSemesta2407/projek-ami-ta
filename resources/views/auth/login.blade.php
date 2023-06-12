@extends('layouts.app')

@section('content')
    <section class="vh-100" style="background-color: #ffffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="{{ asset('bg-login.jpg') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
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
                                                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                                 autocomplete="current-password" placeholder="Masukkan Password">

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

                                        {{-- <a class="small text-muted" href="#!">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </a> --}}
                                        {{-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="#!" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a> --}}
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
