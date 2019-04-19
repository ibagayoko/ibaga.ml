@extends('auth.layout')

@section('styles')
    @include('auth.styles')
@endsection

@section('content')
<div class="limiter" id="app">
		<div class="container-login100">
			<div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                            <img src="/assets/imgs/logo.svg" alt="IMG">
                        </div>
                    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                            <span class="login100-form-title">
                                    Member Login
                                </span>
                        @csrf

                        <div class="wrap-input100">
                            
                            <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}">
                            <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						    {{-- <span class="label-input100">{{ __('E-Mail Address') }}</span> --}}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            {{-- </div> --}}
                        </div>

                        <div class="wrap-input100">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                            <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">
                            <span class="focus-input100"></span>
                            {{-- <span class="label-input100">{{ __('Password') }}</span> --}}
                            <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                            {{-- <div class="col-md-6">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                        </div>
                        <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">
                                        {{ __('Login') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="text-center p-t-12">
                                <span class="txt1">
                                    Forgot
                                </span>
                                <a class="txt2" href="{{ route('password.request') }}">
                                    Username / Password?
                                </a>
                            </div>
                            @endif
                            <div class="text-center p-t-136">
                                <a class="txt2" href="#">
                                    Create your Account
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                </a>
                            </div>

                    </form>
                    {{-- <div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1555485038-a63855aa7ba9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');">
                    </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
