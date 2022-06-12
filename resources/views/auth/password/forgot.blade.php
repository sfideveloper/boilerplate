@extends('layouts.auth')

@section('content')
<div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
    <a href="" class="auth-back">
        <i class="iconly-Light-ArrowLeft"></i>
    </a>
    <h1 class="mb-0 mb-sm-24">Forgot Password</h1>
    <p class="mt-sm-8 mt-sm-0 text-black-60">We’ll e-mail you instructions on how to reset your password.</p>

    <form class="mt-16 mt-sm-32 mb-8">
        <div class="mb-24">
            <label for="recoverEmail" class="form-label">E-mail :</label>
            <input type="email" class="form-control" id="recoverEmail" placeholder="you@example.com">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <a href="auth-reset.html" class="d-block w-100" style="color: inherit;">Reset Password</a>
        </button>
    </form>

    <div class="col-12 hp-other-links mt-24">
        <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Privacy Policy</a>
        <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Term of use</a>
    </div>
</div>
@endsection
