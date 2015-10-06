@extends('Admin/layout_logout')


@section('title')
    Enregistrement
@endsection

@section('bodyclass')
    external-page external-alt sb-l-c sb-r-c
@endsection

@section('content')



    <section id="content">

        <div class="admin-form theme-primary mw600" style="margin-top: 3%;" id="register">

            <!-- Registration Logo -->
            <div class="row table-layout">
                <a href="dashboard.html" title="Return to Dashboard">
                    <img src="{{ asset('img/logos/logo.png') }}" title="AdminDesigns Logo" class="center-block img-responsive" style="max-width: 275px;">
                </a>
            </div>

            <!-- Registration Panel/Form -->
            <div class="panel mt40">

                <form method="post"   id="contact">
                    {{ csrf_field() }}

                    <div class="panel-body bg-light p25 pb15">


                        <div class="section row">
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="First name...">
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                    @if ($errors->has('firstname'))
                                    <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                                    @endif
                                </label>
                            </div>
                            <!-- end section -->

                            <div class="col-md-6">
                                <label for="lastname" class="field prepend-icon">
                                    <input type="text" name="lastname" id="lastname" class="gui-input" placeholder="Last name...">
                                    <label for="lastname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                    @if ($errors->has('lastname'))
                                        <p class="help-block text-danger">{{ $errors->first('lastname') }}</p>
                                    @endif
                                </label>
                            </div>
                            <!-- end section -->
                        </div>
                        <!-- end .section row section -->

                        <div class="section">
                            <label for="email" class="field prepend-icon">
                                <input required type="email" name="email" id="email" class="gui-input" placeholder="Email address">
                                <label for="email" class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </label>
                                @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </label>
                        </div>
                        <!-- end section -->


                        <hr class="alt short">

                        <div class="section">
                            <label for="password" class="field prepend-icon">
                                <input required type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                                <label for="password" class="field-icon">
                                    <i class="fa fa-unlock-alt"></i>
                                </label>
                                @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </label>
                        </div>
                        <!-- end section -->

                        <div class="section">
                            <label for="password_confirmation" class="field prepend-icon">
                                <input required type="password" name="password_confirmation" id="password_confirmation" class="gui-input" placeholder="Retype your password">
                                <label for="password_confirmation" class="field-icon">
                                    <i class="fa fa-lock"></i>
                                </label>
                                @if ($errors->has('password_confirmation'))
                                    <p class="help-block text-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </label>
                        </div>
                        <!-- end section -->

                        <hr class="alt short" />

                        <div class="section">
                            <label for="description" class="field prepend-icon">
                                <textarea row="15" name="description" id="description" value="{{ old('description') }}" class="form-control input-lg" placeholder="Description"></textarea>

                                <label for="description" class="field-icon">
                                    <i class="fa fa-file-text"></i>
                                </label>
                                @if ($errors->has('description'))
                                    <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </label>
                        </div>

                        <div class="section">
                            <label for="photo" class="field prepend-icon">
                                <input type="url" name="photo" id="photo" value="{{ old('photo') }}" class="form-control input-lg" placeholder="Photo de profil">
                                @if ($errors->has('photo'))
                                    <p class="help-block text-danger">{{ $errors->first('photo') }}</p>
                                @endif
                                <label for="photo" class="field-icon">
                                    <i class="fa fa-photo"></i>
                                </label>
                            </label>
                        </div>


                    </div>

                    <div class="panel-footer clearfix">

                        <label class="option block mt10">
                            <input required type="checkbox" name="terms">
                            <span class="checkbox"></span>I agree to the
                            <a href="#" class="theme-link"> terms of use. </a>
                        </label>

                        <label class="switch block switch-primary mt10 hidden">
                            <input type="checkbox" name="remember" id="remember" checked>
                            <label for="remember" data-on="YES" data-off="NO"></label>
                            <span>Remember me</span>
                        </label>

                        <div class="row">
                            <button type="submit" class="button btn-primary mr10 pull-right">Enregistrer</button>
                        </div>
                    </div>

                </form>
            </div>

            <!--  Divider -->
            <hr class="alt mt40 mb30 mh70">

            <!-- Registration Social Links -->
            <div class="section row center-block" style="width: 550px;">
                <div class="col-md-4">
                    <a href="#" class="button btn-social facebook span-left btn-block">
                <span>
                  <i class="fa fa-facebook"></i>
                </span>Facebook</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="button btn-social twitter span-left btn-block">
                <span>
                  <i class="fa fa-twitter"></i>
                </span>Twitter</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="button btn-social googleplus span-left btn-block">
                <span>
                  <i class="fa fa-google-plus"></i>
                </span>Google+</a>
                </div>
            </div>

            <!-- Registration Links -->
            <div class="login-links">
                <p>
                    <a href="pages_forgotpw(alt).html" class="active hidden" title="Sign In">Forgot Password?</a>
                </p>
                <p>Deja un compte?
                    <a href="{{ url('auth/login') }}" class="active" title="Sign In">Connecter-vous</a>
                </p>
            </div>


        </div>

    </section>




    {{--<div class="page-signup theme-default">--}}

        {{--<!-- Page background -->--}}
        {{--<div id="page-signup-bg">--}}
            {{--<!-- Background overlay -->--}}
            {{--<div class="overlay"></div>--}}
            {{--<!-- Replace this with your bg image -->--}}
        {{--</div>--}}
        {{--<!-- / Page background -->--}}

        {{--<!-- Container -->--}}
        {{--<div class="signup-container">--}}
            {{--<!-- Header -->--}}
            {{--<div class="signup-header">--}}
                {{--<a href="index.html" class="logo">--}}
                    {{--CineApp--}}
                {{--</a> <!-- / .logo -->--}}
                {{--<div class="slogan">--}}
                    {{--Création de compte--}}
                {{--</div> <!-- / .slogan -->--}}
            {{--</div>--}}
            {{--<!-- / Header -->--}}

            {{--<!-- Form -->--}}
            {{--<div class="signup-form">--}}
                {{--<form method="post" action="" id="signup-form_id">--}}
                {{--{{ csrf_field() }}--}}
                    {{--<div class="signup-text">--}}
                        {{--<span>Vos coordonnées</span>--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control input-lg" placeholder="Nom">--}}
                        {{--<span class="fa fa-user signup-form-icon"></span>--}}
                        {{--@if ($errors->has('name'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('name') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control input-lg" placeholder="Email">--}}
                        {{--<span class="fa fa-envelope signup-form-icon"></span>--}}
                        {{--@if ($errors->has('email'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('email') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control input-lg" placeholder="Mot de passe">--}}
                        {{--<span class="fa fa-lock signup-form-icon"></span>--}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('password') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control input-lg" placeholder="Confirmation de mot de passe">--}}
                        {{--<span class="fa fa-lock signup-form-icon"></span>--}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('password') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<br>--}}
                    {{--<div class="signup-text">--}}
                        {{--<span>Facultatif</span>--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control input-lg" placeholder="Prénom">--}}
                        {{--<span class="fa fa-user signup-form-icon"></span>--}}
                        {{--@if ($errors->has('firstname'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('firstname') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<textarea row="15" name="description" id="register-description" value="{{ old('description') }}" class="form-control input-lg" placeholder="Description"></textarea>--}}
                        {{--<span class="fa fa-pencil signup-form-icon"></span>--}}
                        {{--@if ($errors->has('description'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('description') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div id="register-limit-label" class="limiter-label">Caractères restants : <span class="limiter-count"></span></div>--}}
                    {{--<br>--}}

                    {{--<div class="form-group w-icon">--}}
                        {{--<input type="text" name="photo" id="photo" value="{{ old('photo') }}" class="form-control input-lg" placeholder="Photo de profil">--}}
                        {{--<span class="fa fa-picture-o signup-form-icon"></span>--}}
                        {{--@if ($errors->has('photo'))--}}
                            {{--<p class="help-block text-danger">{{ $errors->first('photo') }}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-actions">--}}
                        {{--<input type="submit" value="S'inscrire" class="signup-btn bg-primary">--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--<!-- / Form -->--}}

                {{--<!-- "Sign In with" block -->--}}
                {{--<div class="signup-with">--}}
                    {{--<!-- Facebook -->--}}
                    {{--<a href="index.html" class="signup-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">S'inscrire avec <span>Facebook</span></a>--}}
                {{--</div>--}}
                {{--<!-- / "Sign In with" block -->--}}
            {{--</div>--}}
            {{--<!-- Right side -->--}}
        {{--</div>--}}

        {{--<div class="have-account">--}}
            {{--Vous êtes déjà inscrit ? <a href="{{ url('auth/login') }}">Connectez-vous</a>--}}
        {{--</div>--}}

{{--</div>--}}
@endsection
