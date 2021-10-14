@extends('layouts.front')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<div class="container">
    <img src="{{ asset('img/logo/logo.png') }}" alt="" class="img-fluid mx-auto d-block my-3" width="100">
    <h3 class="font-weight-bold text-center ">Log in Dulu</h3>
    <p class="text-center">Atau belum punya akun ? <a href="{{ route('register') }}" class="font-weight-bold text-decoration-none">Buat Dulu</a></p>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<section class="footer border-top mt-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4">
                <img src="{{ asset('img/logo/sikoding.png') }}" alt="">
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, odit. Enim ratione, eveniet inventore necessitatibus vitae, culpa minima fugiat possimus praesentium suscipit, voluptatum impedit ex nihil nostrum assumenda libero sapiente.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Location</h5>
                <p>PT SiKoding Membangun Indonesia
                    <br>
                    Jln Syeh Quro No 103
                    <br>
                    Karawang, Indonesia
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Say Hello</h5>
                <p>info@sikoding.com</p>
            </div>
        </div>
        <div class="row">
            <p class="text-center">
                Copyright 2021 All Right Reserved | By <span class="text-primary">Sikoding</span>
            </p>
        </div>
    </div>
</section>
@endsection
