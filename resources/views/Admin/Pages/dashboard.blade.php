@extends('Admin/layout')

@section('bodyclass')widgets-scroller-page@endsection
@section('js')
    @parent
    <script src="{{ asset('js/all.js') }}"></script>

    <!-- Page Javascript -->
    <script src="{{ asset('js/demo/charts/highcharts.js') }}"></script>
    <script src="{{ asset('js/utility/utility.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('plugins/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('plugins/circles/circles.js') }}"></script>


    <script>
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core
            Core.init();

            // This page contains more Initilization Javascript than normal.
            // As a result it has its own js page. See charts.js for more info
            demoHighCharts.init();

        });
    </script>
@endsection

@section('title')
    Page d'Administration des Cinémas
@endsection


@section('content')

        <!-- Start: Content-Wrapper -->

                @include('Admin/Partials/_topmenu')
                @include('Admin/Partials/_topbar')




            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center">

                    <!-- dashboard tiles -->
                    <div class="row">
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">{{ $nbComments  }}</h1>
                                    <h6 class="text-system">Nb. Comments</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                  <span class="fs11">
                    <i class="fa fa-arrow-up pr5"></i> 3% INCREASE
                    <b>1W AGO</b>
                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">63,262</h1>
                                    <h6 class="text-success">Nb de séances</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                  <span class="fs11">
                    <i class="fa fa-arrow-up pr5"></i> 2.7% INCREASE
                    <b>1W AGO</b>
                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">248</h1>
                                    <h6 class="text-warning">Nb de Users</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                  <span class="fs11">
                                    <i class="fa fa-arrow-up pr5 text-success"></i> 1% INCREASE
                                    <b>1W AGO</b>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xl-3 visible-xl">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">6,718</h1>
                                    <h6 class="text-danger">Nb de Commentaires</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                  <span class="fs11">
                                    <i class="fa fa-arrow-down pr5 text-danger"></i> 6% DECREASE
                                    <b>1W AGO</b>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="admin-panels">
                            <div class="admin-grid">

                                <div class="col-md-5">
                                    <!-- Pie Chart -->
                                    <div class="panel" data-panel-color="panel-info" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title fw600 text-info"><i class="fa fa-pie-chart"></i> Répartition par catégories des films</span>
                                        </div>
                                        <div class="panel-body pn">
                                            <div id="high-pie" style="width: 100%; height: 210px; margin: 0 auto" data-highcharts-chart="6">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <!-- Circle Stats -->
                                    <div class="panel" data-panel-color="panel-info" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title fw600 text-info"><i class="fa fa-bar-chart"></i> Quelques Statistiques</span>
                                        </div>
                                        <div class="panel-body">
                                            <div class="mb20 text-right">
                                                <span class="fs11 text-muted">
                                                  <i class="fa fa-circle text-warning fs12 pr5"></i> Twitter</span>
                                                <span class="fs11 text-muted ml10">
                                                  <i class="fa fa-circle text-info fs12 pr5"></i> Facebook</span>
                                                <span class="fs11 text-muted ml10">
                                                  <i class="fa fa-circle text-primary fs12 pr5"></i> Google+</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <div class="info-circle" id="c1" title="Twitter" value="80" data-circle-color="primary">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="info-circle" id="c2" title="Facebook" value="30" data-circle-color="info">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="info-circle" id="c3" title="Behance" value="55" data-circle-color="warning">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-8">
                                <div class="panel panel-widget chat-widget">
                                    <div class="panel-heading">
                                        <span class="panel-icon">
                                          <i class="fa fa-pencil"></i>
                                        </span>
                                        <span class="panel-title"> Chat Widget</span>
                                    </div>
                                    <div class="panel-body bg-light dark panel-scroller scroller-lg pn">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/2.jpg') }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status"></span>
                                                <h5 class="media-heading">Courtney Faught
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">Joe Gibbons
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/1.jpg') }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/2.jpg') }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Courtney Faught
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">Joe Gibbons
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/1.jpg') }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/2.jpg') }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Courtney Faught
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">Joe Gibbons
                                                    <small> - 12:30am</small>
                                                </h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64" src="{{ asset('img/avatars/1.jpg') }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter your message here...">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-gradient" type="button">Send Message</button>
                      </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>


                                </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="panel tagcloud-widget">
                                    <div class="panel-heading">
                                <span class="panel-icon">
                                  <i class="fa fa-pencil"></i>
                                </span>
                                        <span class="panel-title"> Mot-Clefs</span>
                                    </div>
                                    <div class="panel-body">
                                        <span class="label label-primary">Photoshop</span>
                                        <span class="label label-primary">Fireworks</span>
                                        <span class="label label-primary">Dreamweaver</span>
                                        <span class="label label-primary">Sublime</span>
                                        <span class="label label-primary">Firefox</span>
                                        <span class="label label-primary">Chrome</span>
                                        <span class="label label-primary">Microsoft</span>
                                        <span class="label label-primary">Apple</span>
                                        <span class="label label-primary">Google</span>
                                        <span class="label label-primary">Facebook</span>
                                        <span class="label label-primary">Twitter</span>
                                        <span class="label label-primary">LinkedIn</span>
                                        <span class="label label-primary">Design</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">


                                <div class="panel listgroup-widget">
                                    <div class="panel-heading">
                                <span class="panel-icon">
                                  <i class="fa fa-tag"></i>
                                </span>
                                        <span class="panel-title"> Catégories de films</span>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge badge-primary">14</span>
                                            Entertainment
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-success">9</span>
                                            Movies
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-info">11</span>
                                            TV Shows
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-warning">18</span>
                                            Celebs &amp; Gossip
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-danger">22</span>
                                            Video Games
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-alert">9</span>
                                            Sports &amp; Events
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <div class="col-md-6">

                            <!-- Task Widget -->
                            <div class="panel panel-widget task-widget ui-sortable">
                                <div class="panel-heading cursor">
                                <span class="panel-icon">
                                  <i class="fa fa-cog"></i>
                                </span>
                                    <span class="panel-title"> Task-List Widget</span>
                                </div>
                                <div class="panel-body pn">

                                    <ul class="task-list task-current">
                                        <li class="task-item success">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task1">
                                                    <label for="task1"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Create documentation for launch</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item primary">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task2">
                                                    <label for="task2"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item info">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task3">
                                                    <label for="task3"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Finish building prototype for Sony</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item warning">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task4">
                                                    <label for="task4"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Order new building supplies for Microsoft</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                        <li class="task-item system">
                                            <div class="task-handle">
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="task5">
                                                    <label for="task5"></label>
                                                </div>
                                            </div>
                                            <div class="task-desc">Add new servers to design board</div>
                                            <div class="task-menu ui-sortable-handle"></div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                            <div class="col-md-6">

                                <div class="bs-component">
                                    <div class="panel">
                                        <div class="panel-heading">
                      <span class="panel-icon">
                        <i class="fa fa-clock-o"></i>
                      </span>
                                            <span class="panel-title"> Activity/Timeline Widget</span>
                                        </div>
                                        <div class="panel-body ptn pbn p10">
                                            <ol class="timeline-list">
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-dark light">
                                                        <span class="fa fa-tags"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Michael</b> Added to his store:
                                                        <a href="#">Ipod</a>
                                                    </div>
                                                    <div class="timeline-date">1:25am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-dark light">
                                                        <span class="fa fa-tags"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Sara</b> Added his store:
                                                        <a href="#">Notebook</a>
                                                    </div>
                                                    <div class="timeline-date">3:05am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-success">
                                                        <span class="fa fa-usd"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Admin</b> created invoice for:
                                                        <a href="#">Software</a>
                                                    </div>
                                                    <div class="timeline-date">4:15am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-success">
                                                        <span class="fa fa-usd"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Admin</b> created invoice for:
                                                        <a href="#">Apple</a>
                                                    </div>
                                                    <div class="timeline-date">7:45am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-success">
                                                        <span class="fa fa-usd"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Admin</b> created invoice for:
                                                        <a href="#">Software</a>
                                                    </div>
                                                    <div class="timeline-date">4:15am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-success">
                                                        <span class="fa fa-usd"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Admin</b> created invoice for:
                                                        <a href="#">Apple</a>
                                                    </div>
                                                    <div class="timeline-date">7:45am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-dark light">
                                                        <span class="fa fa-tags"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Michael</b> Added his store:
                                                        <a href="#">Ipod</a>
                                                    </div>
                                                    <div class="timeline-date">8:25am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-system">
                                                        <span class="fa fa-fire"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Admin</b> created invoice for:
                                                        <a href="#">Software</a>
                                                    </div>
                                                    <div class="timeline-date">4:15am</div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-icon bg-dark light">
                                                        <span class="fa fa-tags"></span>
                                                    </div>
                                                    <div class="timeline-desc">
                                                        <b>Sara</b> Added to his store:
                                                        <a href="#">Notebook</a>
                                                    </div>
                                                    <div class="timeline-date">3:05am</div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>

                            </div>


                    </div>




                    <!-- dashboard metric chart -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"> Croissances des films pour les meilleures catégories</span>
                        </div>
                        <div class="panel-body pn">
                            <div id="ecommerce_chart1" style="height: 300px;"></div>
                        </div>
                    </div>

                    <!-- recent activity table -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Prochaines séances</span>
                            <ul class="nav panel-tabs panel-tabs-merge">
                                <li class="active">
                                    <a href="#tab1_1" data-toggle="tab"> Top Sellers</a>
                                </li>
                                <li>
                                    <a href="#tab1_2" data-toggle="tab"> Most Viewed</a>
                                </li>
                                <li>
                                    <a href="#tab1_3" class="hidden-xs" data-toggle="tab"> New Customers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="">Image</th>
                                        <th class="">Product Title</th>
                                        <th class="">SKU</th>
                                        <th class="">Price</th>
                                        <th class="">Stock</th>
                                        <th class="text-right">Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="w100">
                                            {{--<img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg">--}}
                                        </td>
                                        <td class="">Apple Ipod 4G - Silver</td>
                                        <td class="">#21362</td>
                                        <td class="">$215</td>
                                        <td class="">1,400</td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">
                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Archive</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">Complete</a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">Pending</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Canceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w100">
                                            {{--<img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg">--}}
                                        </td>
                                        <td class="">Apple Smart Watch - 1G</td>
                                        <td class="">#15262</td>
                                        <td class="">$455</td>
                                        <td class="">2,100</td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">
                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Archive</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">Complete</a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">Pending</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Canceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w100">
                                            {{--<img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg">--}}
                                        </td>
                                        <td class="">Apple Macbook 4th Gen - Silver</td>
                                        <td class="">#66362</td>
                                        <td class="">$1699</td>
                                        <td class="">6,100</td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">
                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Archive</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">Complete</a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">Pending</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Canceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w100">
                                            {{--<img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg">--}}
                                        </td>
                                        <td class="">Apple Iphone 16GB - Silver</td>
                                        <td class="">#51362</td>
                                        <td class="">$1299</td>
                                        <td class="">5,200</td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">
                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Archive</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">Complete</a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">Pending</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Canceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- end: .tray-center -->


                    <!-- Start: Right Sidebar -->
                    <aside id="sidebar_right" class="nano affix">

                        <!-- Start: Sidebar Right Content -->
                        <div class="sidebar-right-content nano-content">

                            <div class="tab-block sidebar-block br-n">
                                <ul class="nav nav-tabs tabs-border nav-justified hidden">
                                    <li class="active">
                                        <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
                                    </li>
                                    <li>
                                        <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
                                    </li>
                                    <li>
                                        <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content br-n">
                                    <div id="sidebar-right-tab1" class="tab-pane active">

                                        <h5 class="title-divider text-muted mb20"> Server Statistics
                <span class="pull-right"> 2013
                  <i class="fa fa-caret-down ml5"></i>
                </span>
                                        </h5>
                                        <div class="progress mh5">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                                                <span class="fs11">DB Request</span>
                                            </div>
                                        </div>
                                        <div class="progress mh5">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                                                <span class="fs11 text-left">Server Load</span>
                                            </div>
                                        </div>
                                        <div class="progress mh5">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                                                <span class="fs11 text-left">Server Connections</span>
                                            </div>
                                        </div>

                                        <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <h3 class="text-primary mn pl5">132</h3>
                                            </div>
                                            <div class="col-xs-7 text-right">
                                                <h3 class="text-success-dark mn">
                                                    <i class="fa fa-caret-up"></i> 13.2% </h3>
                                            </div>
                                        </div>

                                        <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <h3 class="text-primary mn pl5">212</h3>
                                            </div>
                                            <div class="col-xs-7 text-right">
                                                <h3 class="text-success-dark mn">
                                                    <i class="fa fa-caret-up"></i> 25.6% </h3>
                                            </div>
                                        </div>

                                        <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <h3 class="text-primary mn pl5">82.5</h3>
                                            </div>
                                            <div class="col-xs-7 text-right">
                                                <h3 class="text-danger mn">
                                                    <i class="fa fa-caret-down"></i> 17.9% </h3>
                                            </div>
                                        </div>

                                        <h5 class="title-divider text-muted mt40 mb20"> Server Statistics
                                            <span class="pull-right text-primary fw600">USA</span>
                                        </h5>


                                    </div>
                                    <div id="sidebar-right-tab2" class="tab-pane"></div>
                                    <div id="sidebar-right-tab3" class="tab-pane"></div>
                                </div>
                                <!-- end: .tab-content -->
                            </div>
                        </div>
                    </aside>
                    <!-- End: Right Sidebar -->






        </section>



@endsection
