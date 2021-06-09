<!DOCTYPE html>
<html>
    <head>
        <title>@lang('Login') | GuacAdmin</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="ie=edge" http-equiv="x-ua-compatible">

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/admin2/css/main.css') }}" rel="stylesheet">
    </head>
    <body class="auth-wrapper">
        <div class="all-wrapper menu-side with-pattern" style="padding: 10px!important;">
            <div class="auth-box-w">
                <div class="logo-w" style="padding: 60px;">
                    <h2>GuacSuperAdmin</h2>
                </div>
                <h4 class="auth-header" style="padding: 0 20px 20px 20px!important;" >
                    @lang('Login')
                </h4>
                <form
                    action="{{ route('login') }}"
                    method="POST"
                    style="padding: 20px 20px!important;"
                >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label
                            class="form-check-label"
                            style="margin: 0 20px!important;"
                        >
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                >@lang('Remember me')
                        </label>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">@lang('Email')</label>
                        <input
                            class="form-control"
                            placeholder="@lang('Please enter your email')"
                            type="text"
                            style="font-size: 16px!important;"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        {{-- <div class="pre-icon os-icon os-icon-user-male-circle"></div> --}}
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">@lang('Password')</label>
                        <input
                            class="form-control"
                            placeholder="@lang('Please enter your password')"
                            style="font-size: 16px!important;"
                            type="password"
                            id="password"
                            name="password"
                            required
                        >
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        {{-- <div class="pre-icon os-icon os-icon-fingerprint"></div> --}}
                    </div>
                    <div class="buttons-w">
                        <button class="btn btn-primary">
                            @lang('Login')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
