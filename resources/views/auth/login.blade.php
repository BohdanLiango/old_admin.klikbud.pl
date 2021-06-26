@extends('layouts.app')
@section('content')
<div class="login-signin">
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">Sign In To Admin</h3>
        <p class="opacity-40">Enter your details to login to your account:</p>
    </div>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror"
                   type="text" placeholder="{{ __('E-Mail Address') }}" name="email" required autocomplete="email" />
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror"
                   type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password"/>
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
            <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <span></span>{{ __('Remember Me') }}</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-white font-weight-bold">{{ __('Forgot Your Password?') }}</a>
            @endif
        </div>
        <div class="form-group text-center mt-10">
            <button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3"> {{ __('Login') }}</button>
        </div>
    </form>
    <div class="mt-10">
        <span class="opacity-40 mr-4">Don't have an account yet?</span>
        <a href="javascript:;" id="kt_login_signup" class="text-white opacity-30 font-weight-normal">Sign Up</a>
    </div>
</div>



<!--begin::Login forgot password form-->
<div class="login-forgot">
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">Forgotten Password ?</h3>
        <p class="opacity-40">Enter your email to reset your password</p>
    </div>
    <form class="form" id="kt_login_forgot_form">
        <div class="form-group mb-10">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group">
            <button id="kt_login_forgot_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">Request</button>
            <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Cancel</button>
        </div>
    </form>
</div>
<!--end::Login forgot password form-->
@endsection
