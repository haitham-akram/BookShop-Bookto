
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booksto - Login</title>
    @include('includes.AppStyle')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- Sign in Start -->
<section class="sign-in-page">
<div class="container p-0">
    <div class="row no-gutters height-self-center">
        <div class="col-sm-12 align-self-center page-content rounded">
            <div class="row m-0">
                <div class="col-sm-12 sign-in-page-data">
                    <div class="sign-in-from bg-primary rounded">
                        <h3 class="mb-0 text-center text-white">Sign in</h3>
                        <p class="text-center text-white">Enter your E-Mail and Password to access admin panel.</p>
                    <form method="POST" action="{{ route('login') }}"class="mt-4 form-text" >
                        @csrf

                        <div class="form-group">
                            <label for="email" class="pl-3">{{ __('E-Mail Address') }}</label>
                            <div class="col-lg-12">
                                <input id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="pl-3">{{ __('Password') }}</label>
                            <div class="col-lg-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-inline-block w-100 pl-3">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1 ">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>
                        <div class="sign-info text-center">

                                <button type="submit" class="btn btn-white d-block w-100 mb-2">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('includes.AppJS')
</body>
</html>
