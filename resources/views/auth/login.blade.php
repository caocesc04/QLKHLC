@extends('layouts.app')

@section('content')
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
            <span class="login100-form-title p-b-49">Đăng Nhập</span>

            <div class="wrap-input100 validate-input m-b-23">
                <span class="label-input100">Email</span>
                <input id="email" name="email" type="email" class="input100" required="">
                <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <span class="label-input100">Password</span>
                <input id="password" name="password" type="password" class="input100" required="">
                <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div><br>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-blue btn-block" style="font-size: 18px" href="{{ route('register') }}">Create an account</a>
        </form>
    </div>
@endsection
