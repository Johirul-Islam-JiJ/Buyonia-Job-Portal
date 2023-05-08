@extends('layouts.log_reg')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="/">

                            <h2 class="brand-text text-primary ml-1">{{ $existing_setting->name }}</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('layout-assets/images/pages/login-v2.svg') }}" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->

                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <h2>Forgot Password?</h2>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-10 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Reset Link') }}
                                            </button>

                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-danger" href="{{ url('login') }}">Login</a>
                                        </div>

                                    </div>
                                </form>


                                <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="{{ url('/register') }}">
                                        <span>Create an account</span>
                                    </a>
                                </p>


                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
