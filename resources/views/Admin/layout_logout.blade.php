<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>@section('bodyclass') A Responsive Dashboard Cinema @show</title>

    <meta name="author" content="AbsoluteAdmin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('css')

                <!-- Font CSS (Via CDN) -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>


        <!-- FullCalendar Plugin CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">



        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.min.css') }}">

        <!-- Admin Forms CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-forms.css') }}">

    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

</head>

<body  class="@section('bodyclass')ecommerce-page @show">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">
    <section id="content_wrapper">
        @yield('content')
    </section>
</div>


@section('js')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="{{ asset('jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
{{--<script src="vendor/plugins/jvectormap/jquery.jvectormap.min.js"></script>--}}
{{--<script src="vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>--}}

<!-- FullCalendar Plugin + moment Dependency -->
<script src="{{ asset('plugins/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- Theme Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/demo/widgets.js') }}"></script>

<script>
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

    });
</script>
@show

</body>

</html>