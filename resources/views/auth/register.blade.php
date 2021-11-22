@extends('layouts.app')
@section('title', 'Registration')
@section('content')
<section class="section-account parallax bg-11">
    <div class="awe-overlay"></div>
    <div class="container"> 
        <div class="login-register">
            <div class="text text-center">
                <h2>REGISTER FORM</h2>
                <form action="{{url('register')}}" class="account_form" method="post">
                    @csrf
                    <div class="field-form">
                        <input type="text" class="field-text" name="name" placeholder="First Name*" required value="{{old('name')}}">
                    </div>
                    <div class="field-form">
                        <input type="text" class="field-text" name="last_name" placeholder="Last Name*" required value="{{old('last_name')}}">
                    </div>

                    <div class="field-form">
                        <input type="email" class="field-text" name="email" placeholder="Email*" required value="{{old('email')}}">
                        @if($errors->has('email'))
                            <p class="v-error">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="field-form">
                        <input type="number" class="field-text" name="phone" placeholder="Phone" value="{{old('phone')}}">
                        @if($errors->has('phone'))
                            <p class="v-error">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="field-form">
                        <input type="password" class="field-text" name="password" placeholder="Password*" required>
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        @if($errors->has('password'))
                            <p class="v-error">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="field-form">
                        <input type="password" class="field-text" name="password_confirmation" placeholder="Confirm Password*" required>
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        @if($errors->has('password_confirmation'))
                            <p class="v-error">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <div class="field-form">
                        <input type="text" class="field-text" name="code" placeholder="code" value="{{old('code')}}">
                    </div>
                    <div class="field-form">
                        <input type="text" class="field-text" name="pvm_code" placeholder="PVM Code" value="{{old('pvm_code')}}">
                    </div>
                    <div class="field-form">
                         <textarea class="field-textarea r-text-area" name="adderss" placeholder="Address">{{old('adderss')}}</textarea>
                         @if($errors->has('adderss'))
                            <p class="v-error">{{ $errors->first('adderss') }}</p>
                        @endif
                    </div>
                    <div class="field-form field-submit">
                        <button class="awe-btn awe-btn-13 r-btn">REGISTER</button>
                        <a href="{{route('vendors.all')}}" class="awe-btn awe-btn-13 r-btn">HOME</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection