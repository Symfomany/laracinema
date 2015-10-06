@extends('Admin/layout_logout')


@section('title')
    Authentification
@endsection

@section('bodyclass')
    external-page external-alt sb-l-c sb-r-c
@endsection

@section('content')

        <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Begin: Content -->
        <section id="content">

            <div class="center-block mt70" style="max-width: 625px">

                <!-- Login Logo + Meta -->
                <div class="row table-layout">

                    <div class="col-xs-7 pln">
                        <h2 class="text-dark mbn confirmation-header"><i class="fa fa-check text-success"></i> Account Confirmed.</h2>
                    </div>

                    <div class="col-xs-5 text-right va-b">
                        <div class="meta-links alt">
                            <a href="#" class="">Yoursite.com</a>
                            <span class="ph5"> | </span>
                            <a href="#" class="active">support</a>
                        </div>
                    </div>

                </div>

                <!-- Confirmation Panel -->
                <div class="panel mt15">
                    <div class="panel-body pt30 p25 pb15">

                        <p class="lead">Hello Justin,</p>

                        <hr class="alt short mv25">

                        <p class="lh25 text-muted fs15">Thank you for registering with blank. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac nisi massa. Sed gravida arcu et eros euismod aliquam. Cras at fermentum velit. Praesent ligula nibh, venenatis non vulputate sit amet, bibendum non risus. </p>

                        <p class="text-right mt20"><button class="btn btn-primary btn-rounded ph40" type="button">SIGN IN</button></p>

                    </div>
                </div>

                <!-- Registration Links -->
                <div class="login-links mt30">
                    <p><a href="#" class="active">Need More Help?</a></p>
                    <p> Misc question two? <a href="#">Response Link</a></p>
                </div>

            </div>

        </section>
        <!-- End: Content -->


@endsection