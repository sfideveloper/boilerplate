@extends('layouts.auth')

@section('title', 'Login | Bank Syariah Indonesia - UAE')

@section('content')
<div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-64 pb-48">
    <div class="d-flex align-items-center mb-sm-24">
        <a href="" class="auth-back">
            <i class="iconly-Light-ArrowLeft"></i>
        </a>
        <h1 class="mb-0">Login</h1>
    </div>
    <p class="mt-sm-8 mt-sm-0 text-black-60">Welcome back, please login to your account.</p>

    <form class="mt-16 mt-sm-32 mb-8" method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-16">
            <label for="email" class="form-label">Email :</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-16">
            <label for="password" class="form-label">Password :</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row align-items-center justify-content-between mb-16">
            <div class="col hp-flex-none w-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="col hp-flex-none w-auto">
                <a class="hp-button text-black-80 hp-text-color-dark-40" href="auth-recover.html">Forgot
                Password?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Sign in
        </button>
    </form>

    <div class="col-12 hp-form-info">
        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Don’t you have an
        account?</span>
        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="auth-register.html">Create an
        account</a>
    </div>

    <div class="col-12 hp-or-line text-center mt-32">
        <span class="hp-caption text-black-80 hp-text-color-dark-30 px-16 bg-black-0 hp-bg-color-dark-100">Or</span>
    </div>

    <div class="col-12 hp-account-buttons mt-32">
        <button type="button" class="btn w-100">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="remix-icon">
            <path
            d="M3.28826 8.39085L2.82415 10.1235L1.12782 10.1593C0.620865 9.21906 0.333313 8.14325 0.333313 7.00002C0.333313 5.89453 0.602167 4.85202 1.07873 3.93408H1.07909L2.5893 4.21096L3.25086 5.7121C3.1124 6.11578 3.03693 6.54911 3.03693 7.00002C3.03698 7.4894 3.12563 7.95828 3.28826 8.39085Z"
            fill="#FBBB00"></path>
            <path
            d="M13.5502 5.75455C13.6267 6.15783 13.6667 6.57431 13.6667 6.99996C13.6667 7.47726 13.6165 7.94283 13.5209 8.39192C13.1963 9.92012 12.3483 11.2545 11.1736 12.1989L11.1733 12.1985L9.27108 12.1014L9.00186 10.4208C9.78134 9.96371 10.3905 9.24832 10.7114 8.39192H7.14655V5.75455H10.7634H13.5502Z"
            fill="#518EF8"></path>
            <path
            d="M11.1732 12.1986L11.1736 12.1989C10.0311 13.1172 8.57981 13.6667 6.99997 13.6667C4.46114 13.6667 2.25382 12.2476 1.12781 10.1594L3.28825 8.39087C3.85124 9.89342 5.3007 10.963 6.99997 10.963C7.73036 10.963 8.41463 10.7656 9.00179 10.4209L11.1732 12.1986Z"
            fill="#28B446"></path>
            <path
            d="M11.2553 1.86812L9.09558 3.63624C8.4879 3.2564 7.76957 3.03697 6.99999 3.03697C5.26225 3.03697 3.78569 4.15565 3.2509 5.71208L1.0791 3.93406H1.07874C2.18827 1.79486 4.42342 0.333328 6.99999 0.333328C8.61756 0.333328 10.1007 0.909526 11.2553 1.86812Z"
            fill="#F14336"></path>
        </svg>
        <span>Continue with Google account</span>
    </button>

    <button type="button" class="btn w-100 mt-16">
        <i class="ri-facebook-fill remix-icon text-primary"></i>
        <span>Continue with Facebook account</span>
    </button>
</div>

<div class="col-12 hp-other-links mt-24">
    <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Privacy Policy</a>
    <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Term of use</a>
</div>
</div>
@endsection
