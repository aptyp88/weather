@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h2 class="text-center mt-5 display-3">Weather parser</h2>
        <br>
        <!-- Nav tabs -->


        <div class="row d-flex justify-content-center auth-tabs mb-5">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#login" class="nav-link active" data-toggle="tab">Login</a>
                </li>
                <li class="nav-item">
                    <a href="#register" class="nav-link" data-toggle="tab">Register</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="login-email" class="col-md-4 col-form-label text-md-right required-star">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" id="login-email" class="form-control @error('email') is-invalid @enderror" name="login_email" value="{{ old('login_email') }}" required autocomplete="email" autofocus>
                            @error('login_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="login-password" class="col-md-4 col-form-label text-md-right required-star">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="login_password" required autocomplete="current-password">
                            @error('login_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 d-flex justify-content-md-start justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <form method="POST" action="{{ url('/register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Gender</label>

                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Choose gender...</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Birthday</label>

                        <div class="col-md-6">
                            <div id="birth-piker"></div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{--<ul class="nav nav-tabs" role="tablist">--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link active" data-toggle="tab" href="#home">Login</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" data-toggle="tab" href="#menu1">Register</a>--}}
            {{--</li>--}}
        {{--</ul>--}}

        {{--<!-- Tab panes -->--}}
        {{--<div class="tab-content">--}}
            {{--<div id="home" class="container tab-pane active"><br>--}}
                {{--<div class="container">--}}
                    {{--<div class="row justify-content-center">--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="card">--}}
                                {{--<div class="card-body">--}}
                                    {{--<form method="POST" action="{{ url('/login') }}">--}}
                                        {{--@csrf--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
                                                {{--@error('email')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                                {{--@error('password')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<div class="col-md-6 offset-md-4">--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                                    {{--<label class="form-check-label" for="remember">--}}
                                                        {{--{{ __('Remember Me') }}--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row mb-0">--}}
                                            {{--<div class="col-md-8 offset-md-4">--}}
                                                {{--<button type="submit" class="btn btn-primary">--}}
                                                    {{--{{ __('Login') }}--}}
                                                {{--</button>--}}

                                                {{--@if (Route::has('password.request'))--}}
                                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                        {{--{{ __('Forgot Your Password?') }}--}}
                                                    {{--</a>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div id="menu1" class="container tab-pane fade"><br>--}}
                {{--<div class="container">--}}
                    {{--<div class="row justify-content-center">--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="card">--}}
                                {{--<div class="card-body">--}}
                                    {{--<form method="POST" action="{{ url('/register') }}">--}}
                                        {{--@csrf--}}
                                        {{--<div class="form-group row">--}}
                                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                                                {{--@error('name')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

                                                {{--@error('email')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">Gender</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<select class="form-control">--}}
                                                    {{--<option value="default">Choose gender...</option>--}}
                                                    {{--<option value="male">Male</option>--}}
                                                    {{--<option value="female">Female</option>--}}
                                                {{--</select>--}}
                                                {{--@error('email')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">Birthday</label>--}}

                                            {{--<div class="col-12 col-md-6">--}}
                                                {{--<div id="birth-piker"></div>--}}
                                                {{--@error('email')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                                {{--@error('password')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row">--}}
                                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group row mb-0">--}}
                                            {{--<div class="col-md-6 offset-md-4">--}}
                                                {{--<button type="submit" class="btn btn-primary">--}}
                                                    {{--{{ __('Register') }}--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</section>

@endsection