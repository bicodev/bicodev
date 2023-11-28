    @extends('layouts.login')
@php
    $logo=asset(Storage::url('uploads/logo/'));
 $company_logo=Utility::getValByName('company_logo');
     $settings = Utility::settings();

@endphp
    @push('custom-scripts')
        @if(env('RECAPTCHA_MODULE') == 'yes')
            {!! NoCaptcha::renderJs() !!}
        @endif
    @endpush
@section('page-title')
    {{__('Login')}}
@endsection

    @section('content')
        <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->

                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-start">
                                        <h4 class="font-weight-bolder">Sign In</h4>
                                        <p class="mb-0">Enter your email and password to sign in</p>
                                    </div>


                                    <div class="card-body">
                                        <form role="form" action="{{ route('login') }}" method="post">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">{{__('Email')}}</label>
                                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">{{__('Password')}}</label>
                                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                                                @error('password')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                                <label class="form-check-label" for="rememberMe">{{__('Remember me')}}</label>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">{{__('Sign in')}}</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Don't have an account?
                                            <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                                    <span class="mask bg-gradient-primary opacity-6"></span>
                                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                                    <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-------------- ReCaptcha start---------}}
                @if(env('RECAPTCHA_MODULE') == 'yes')
                    <div class="form-group">
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif

                {{-------------- ReCaptcha end---------}}

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-primary">{{ __('Forgot Your Password?') }}</a>
                @endif

                <button type="submit" class="btn-login">{{__('Login')}}</button>
                <!--  @if($settings['enable_signup'] == 'on')
                    <div class="or-text">{{__('OR')}}</div>
                <small class="text-muted">{{__("Don't have an account?")}}</small>
                <a href="{{ route('register') }}" class="text-xs text-primary">{{__('Register')}}</a>
                @endif
                {{Form::close()}}  -->

                </div>

                <h5 class="copyright-text" style="color: orangered;">
                    {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright ©  jsonscomm ') }} {{ date('Y') }}
                </h5>

            </section>
        </main>
    @endsection

@section('content')
    <div class="login-contain">
        <div class="login-inner-contain">


            <div class="login-form">


        </div>
    </div>
@endsection

