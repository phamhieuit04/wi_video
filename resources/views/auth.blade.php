@extends('master')
@section('content')
    <div id="login-form" class="col-md-2 col-md-offset-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Đăng nhập WiVideo</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/auth/facebook/redirect') }}">
                    <img src="{{  asset('assets/images/facebook.png') }}" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/auth/google/redirect') }}">
                    <img src="{{  asset('assets/images/google_ico.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection