@extends('Admin/layout_logout')


@section('title')
    Authentification
@endsection

@section('bodyclass')
    external-page external-alt sb-l-c sb-r-c
@endsection

@section('content')
        <!-- Begin: Content -->
    <section id="content">

        <div class="admin-form theme-info mw600" style="margin-top: 11%;" id="login1">
            <div class="row mb15 table-layout">

                <div class="col-xs-6 pln">
                    <a href="dashboard.html" title="Return to Dashboard">
                        <img src="{{ asset('img/logos/logo.png') }}" title="AdminDesigns Logo" class="img-responsive w250">
                    </a>
                </div>

            </div>
            <div class="panel">

                <!-- end .form-header section -->
                <form method="post" action="/" id="contact">
                    <div class="panel-body bg-light pn">

                        <div class="row table-layout">
                            <div class="col-xs-3 p20 pv15 va-m br-r bg-light">
                                <img class="br-a bw4 br-grey img-responsive center-block" src="{{ asset('img/avatars/3.jpg') }}" title="AdminDesigns Logo">
                            </div>
                            <div class="col-xs-9 p20 pv15 va-m bg-light">
                                <h3 class="mb5"> Votre conmpte est verouillé
                                    <small> - logged out for
                                        <b> :( </b>
                                    </small></h3><small>
                                    <p class="text-muted">julien@meetserious.com</p>

                                </small></div><small>
                            </small></div><small>
                        </small></div><small>
                        <!-- end .form-body section -->


                    </small></form></div><small>
                <button type="submit" class="button btn-info pull-right">Déverouillé</button>
            </small></div><small>

        </small></section>
    <!-- End: Content -->


@endsection