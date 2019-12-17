@extends('layouts.app')

@section('content')

<section>
    <div class="container mb-5">
        <h2 class="text-center mt-5 display-3">Weather parser</h2>
        <br>

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
                        <label for="email" class="col-md-4 col-form-label text-md-right required-star">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus data-check="login">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="login-password" class="col-md-4 col-form-label text-md-right required-star">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" data-check="login">
                            @error('password')
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
                            <button type="submit" class="btn btn-primary btn-login" name="btn_login">
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
                        <label for="fname" class="col-md-4 col-form-label text-md-right required-star">First name</label>

                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('first_name') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus data-check="register">

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-md-4 col-form-label text-md-right required-star">Last name</label>

                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('last_name') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus data-check="register">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="register-email" class="col-md-4 col-form-label text-md-right required-star">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="register-email" type="email" class="form-control @error('register_email') is-invalid @enderror" name="register_email" value="{{ old('register_email') }}" required autocomplete="register_email" data-check="register">

                            @error('register_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                        <div class="col-md-6">
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Choose gender...</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth-piker" class="col-md-4 col-form-label text-md-right">Birthday</label>

                        <div class="col-md-6">
                            <div id="birth-piker"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="register-password" class="col-md-4 col-form-label text-md-right required-star">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="register-password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" required autocomplete="new-password" data-check="register">

                            @error('register_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right required-star">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="register_password_confirmation" required autocomplete="new-password" data-check="register">
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
    </div>
</section>

@endsection