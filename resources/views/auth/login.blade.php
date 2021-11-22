@extends('layouts.app')
@section('title', 'Login')
@section('content')
<section class="section-account parallax bg-11">
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="login-register">
            <div class="text text-center">

                <h2>{{ __('LOGIN ACCOUNT') }}</h2>
                <p>Lorem Ipsum is simply dummy text of the printing Rasel</p>
                <form method="POST" action="{{ route('login') }}" class="account_form">
                    @csrf
                    <div class="field-form">
                        <input id="email" type="email" class="field-text @error('email') is-invalid @enderror"
                            placeholder="@lang('frontend.login.email')" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="field-form">
                        <input id="password" type="password" class="field-text @error('password') is-invalid @enderror"
                            name="password" placeholder="@lang('frontend.login.password')" required autocomplete="current-password">
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-form">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    @lang('frontend.login.remember')
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="field-form field-submit">
                        <button class="awe-btn awe-btn-13" type="submit">@lang('frontend.login.button')</button>
                    </div>
                    <span class="account-desc">@lang('frontend.login.dont.have') 
                    @if (Route::has('password.request'))<a href="{{ route('password.request') }}">@lang('frontend.login.forgot')</a> @endif</span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection