@extends('frontend.layouts.master')

@section('content')
<section class="container my-5 py-sm-5">
    <div class="row row-divided justify-content-center">
        {{-- left --}}
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col">
                    <a class="btn btn-default w-100 social facebook" href="{{ route('login.redirect', 'facebook') }}">
                        <i class="fa fa-facebook pull-left"></i>
                        @lang('labels.frontend.auth.login_with', ['social_media' => 'Facebook'])
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a class="btn btn-default w-100 social google" href="{{ route('login.redirect', 'google') }}">
                        <i class="fa fa-google-plus pull-left"></i>
                        @lang('labels.frontend.auth.login_with',  ['social_media' => 'Google +'])
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a class="btn btn-default w-100 social github" href="{{ route('login.redirect', 'github') }}">
                        <i class="fa fa-github pull-left"></i>
                        @lang('labels.frontend.auth.login_with', ['social_media' => 'Github'])
                    </a>
                </div>
            </div>
        </div>
        <div class="vertical-divider d-none d-md-block">OR</div>
        {{-- right --}}
        <div class="col-12 col-md-4 mt-5 mt-md-0">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-group mb-2 mb-sm-0">
                        <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder="@lang('labels.frontend.auth.email_address')" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-group mb-2 mb-sm-0">
                        <div class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></div>
                        <input id="password" type="password" class="form-control form-control-lg" name="password" placeholder="@lang('labels.frontend.auth.password')" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="">
                        <label class="align-text-top">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('labels.frontend.auth.remember_me')
                        </label>
                    </div>
                    <div class="ml-auto">
                        <button type="submit" class="btn btn-default">
                            @lang('labels.frontend.auth.login_button')
                        </button>
                    </div>
                </div>

            </form>

            <div class="d-flex my-3">
                <a href="{{ route('register') }}" class="font-weight-bold">
                    @lang('labels.frontend.auth.register_button')
                </a>
                <div class="ml-auto">
                    <a href="{{ route('password.request') }}" class="text-secondary">
                        @lang('labels.frontend.passwords.forgot_password')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
