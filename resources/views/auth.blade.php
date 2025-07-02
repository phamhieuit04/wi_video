@extends('master')
@section('content')
    <div id="login-form" class="col-md-2 col-md-offset-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Đăng nhập WiVideo</h3>
            </div>
            <div class="col-md-6">
                <a href="https://accounts.google.com/o/oauth2/v2/auth?
                        client_id=YOUR_CLIENT_ID
                        &redirect_uri=http://localhost:8000/auth/google/callback
                        &response_type=code
                        &scope=openid%20email%20profile
                        &access_type=offline">
                    <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <a
                    href="https://accounts.google.com/o/oauth2/v2/auth?client_id={{ env('GOOGLE_CLIENT_ID') }}&redirect_uri={{ env('GOOGLE_REDIRECT_URI') }}&response_type=code&scope=openid%20email%20profile&access_type=offline">
                    <img src="{{  asset('assets/images/google_ico.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection