@extends('layouts.auth')

@section('title', 'Resgister | Bank Syariah Indonesia - UAE')

@section('content')
<div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
    <a href="" class="auth-back">
        <i class="iconly-Light-ArrowLeft"></i>
    </a>
    <h1 class="mb-0 mb-sm-24">Create Account</h1>
    <p class="mt-sm-8 mt-sm-0 text-black-60">Please sign up to your personal account if you want to use all our premium
        products.</p>

    <form class="mt-16 mt-sm-32 mb-8">
        <div class="mb-24">
            <label for="registerUsername" class="form-label">Username :</label>
            <input type="text" class="form-control" id="registerUsername">
        </div>

        <div class="mb-24">
            <label for="registerEmail" class="form-label">E-mail :</label>
            <input type="email" class="form-control" id="registerEmail">
        </div>

        <div class="mb-24">
            <label for="registerPassword" class="form-label">Password :</label>
            <input type="password" class="form-control" id="registerPassword">
        </div>

        <div class="mb-24">
            <label for="registerConfirmPassword" class="form-label">Confirm Password :</label>
            <input type="password" class="form-control" id="registerConfirmPassword">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Sign up
        </button>
    </form>

    <div class="col-12 hp-form-info">
        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Already have an account?</span>
        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="auth-login.html">Login</a>
    </div>

    <div class="col-12 hp-other-links mt-24">
        <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Privacy Policy</a>
        <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Term of use</a>
    </div>
</div>
@endsection
