@extends('layouts.app')

@section('content')
<div class="login-signup">
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">Sign Up</h3>
        <p class="opacity-40">Enter your details to create your account</p>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <form class="form text-center" id="kt_login_signup_form" method="POST" action="{{ route('register') }}">


        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="{{ __('Name') }}" name="fullname" />
        </div>
        

        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
        </div>
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
        </div>
        <div class="form-group text-left px-8">
            <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-white opacity-60 text-white m-0">
                    <input type="checkbox" name="agree" />
                    <span></span>I Agree the
                    <a href="#" class="text-white font-weight-bold ml-1">terms and conditions</a>.</label>
            </div>
            <div class="form-text text-muted text-center"></div>
        </div>
        <div class="form-group">
            <button id="kt_login_signup_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">Sign Up</button>
            <button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Cancel</button>
        </div>
    </form>
</div>
@endsection
