@extends('layouts.app')
@section('pagetitle', 'Admin Login')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="jumbotron" style="padding-top:10%;padding-bottom:10%; margin-bottom:0px;">

                {{-- Success Alert --}}
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold small"
                        role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold small"
                        role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row justify-content-center" style="margin-bottom:1%;">
                    <i class="mdb-color-text fas fa-user-secret fa-3x text-center"></i>
                </div>
                <div class="row justify-content-center" style="margin-bottom:5%;">
                    <h4 class="mdb-color-text">Admin Login</h4>
                </div>
                <form method="POST" action="{{ route($loginRoute) }}">
                    @csrf

                    <div class="form-group row justify-content-center">

                        <div class="col-md-5">
                            <input placeholder="Email" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">


                        <div class="col-md-5">
                            <input placeholder="Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-unique MyButton btn-block">
                                {{ __('Login') }}
                            </button>

                            @if(Route::has('password.request'))
                                <a class="btn btn-link font-weight-bold"
                                    href="{{ route('password.request') }}"><small>
                                        {{ __('Forgot Your Password?') }}</small>
                                </a>
                            @endif
                        </div>
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>
@endsection
