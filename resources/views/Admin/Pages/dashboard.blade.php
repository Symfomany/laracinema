@extends('Admin/layout')

@section('js')
    @parent
    <script src="{{ asset('js/all.js') }}"></script>
@endsection

@section('title')
    Page d'Administration des Cinémas
@endsection


@section('content')

        <!-- Start: Content-Wrapper -->

            <!-- Start: Topbar-Dropdown -->
            <div id="topbar-dropmenu" class="alt">
                <div class="topbar-menu row">
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-primary light">
                            <span class="glyphicon glyphicon-inbox text-muted"></span>
                            <span class="metro-title">Messages</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-info light">
                            <span class="glyphicon glyphicon-user text-muted"></span>
                            <span class="metro-title">Users</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-success light">
                            <span class="glyphicon glyphicon-headphones text-muted"></span>
                            <span class="metro-title">Support</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-system light">
                            <span class="glyphicon glyphicon-facetime-video text-muted"></span>
                            <span class="metro-title">Videos</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-warning light">
                            <span class="fa fa-gears text-muted"></span>
                            <span class="metro-title">Settings</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-alert light">
                            <span class="glyphicon glyphicon-picture text-muted"></span>
                            <span class="metro-title">Pictures</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End: Topbar-Dropdown -->

            <!-- Start: Topbar -->
            <header id="topbar" class="ph10">
                <div class="topbar-left">
                    <ul class="nav nav-list nav-list-topbar pull-left">
                        <li class="active">
                            <a href="ecommerce_dashboard.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="ecommerce_products.html">Products</a>
                        </li>
                        <li>
                            <a href="ecommerce_orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="ecommerce_customers.html">Customers</a>
                        </li>
                        <li>
                            <a href="ecommerce_settings.html">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-right hidden-xs hidden-sm">
                    <a href="ecommerce_orders.html" class="btn btn-default btn-sm fw600 ml10">
                        <span class="fa fa-plus pr5"></span> New Order</a>
                    <a href="ecommerce_products.html" class="btn btn-default btn-sm fw600 ml10">
                        <span class="fa fa-plus pr5"></span> Add Product</a>
                    <a href="ecommerce_customers.html" class="btn btn-default btn-sm fw600 ml10">
                        <span class="fa fa-user pr5"></span> Add Customer</a>
                </div>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center">

                    <!-- dashboard tiles -->
                    <div class="row">
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">1,426</h1>
                                    <h6 class="text-system">NEW ORDERS</h6>
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
                                    <h6 class="text-success">TOTAL SALES GROSS</h6>
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
                                    <h6 class="text-warning">PENDING SHIPMENTS</h6>
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
                                    <h6 class="text-danger">UNIQUE VISITS</h6>
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

                    <!-- dashboard metric chart -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"> Revenue</span>
                        </div>
                        <div class="panel-body pn">
                            <div id="ecommerce_chart1" style="height: 300px;"></div>
                        </div>
                    </div>

                    <!-- recent activity table -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Recent Activity</span>
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

                    <!-- info traffic panels -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Top Geographic Sources</span>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table mbn tc-med-1 tc-bold-last">
                                        <thead>
                                        <tr class="hidden">
                                            <th>#</th>
                                            <th>First Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span class="flag-xs flag-us mr5 va-b"></span>United States</td>
                                            <td>28%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="flag-xs flag-de mr5 va-b"></span>Germany</td>
                                            <td>25%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="flag-xs flag-fr mr5 va-b"></span>France</td>
                                            <td>21%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="flag-xs flag-tr mr5 va-b"></span>Spain</td>
                                            <td>18%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="flag-xs flag-es mr5 va-b"></span>Turkey</td>
                                            <td>10%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Search List -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Top Referals</span>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table mbn tc-med-1 tc-bold-last">
                                        <thead>
                                        <tr class="hidden">
                                            <th>#</th>
                                            <th>First Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span class="favicons google va-t mr10"></span>http://madeupurl.com/pictures/doors</td>
                                            <td>28%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="favicons google va-t mr10"></span>http://secondulr.com/article/14</td>
                                            <td>25%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="favicons yahoo va-t mr10"></span>http://urlthird.com/infogram/ten</td>
                                            <td>21%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="favicons google va-t mr10"></span>http://fourthlink.com/boats/glass</td>
                                            <td>18%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="favicons bing va-t mr10"></span>http://lastlink.com/thebest/ever</td>
                                            <td>10%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end: .tray-center -->

                <!-- begin: .tray-right -->
                <aside class="tray tray-right tray290 pn" data-tray-height="match">

                    <!-- store activity timeline -->
                    <ol class="timeline-list pl5 mt5">
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Michael</b> Added a new item to his store:
                                <a href="#">Ipod</a>
                            </div>
                            <div class="timeline-date">1:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Sara</b> Added a new item to his store:
                                <a href="#">Notebook</a>
                            </div>
                            <div class="timeline-date">3:05am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-success">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Admin</b> created a new invoice for:
                                <a href="#">Software</a>
                            </div>
                            <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-warning">
                                <span class="fa fa-pencil"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Laura</b> edited her work experience</div>
                            <div class="timeline-date">5:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-success">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Admin</b> created a new invoice for:
                                <a href="#">Apple Inc.</a>
                            </div>
                            <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Michael</b> Added a new item to his store:
                                <a href="#">Ipod</a>
                            </div>
                            <div class="timeline-date">8:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Sara</b> Added a new item to his store:
                                <a href="#">Watch</a>
                            </div>
                            <div class="timeline-date">9:35am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-system">
                                <span class="fa fa-fire"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Admin</b> created a new invoice for:
                                <a href="#">Software</a>
                            </div>
                            <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-warning">
                                <span class="fa fa-pencil"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Laura</b> edited her work experience</div>
                            <div class="timeline-date">5:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-success">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Admin</b> created a new invoice for:
                                <a href="#">Software</a>
                            </div>
                            <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-warning">
                                <span class="fa fa-pencil"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Laura</b> edited her work experience</div>
                            <div class="timeline-date">5:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-success">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Admin</b> created a new invoice for:
                                <a href="#">Apple Inc.</a>
                            </div>
                            <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Michael</b> Added a new item to his store:
                                <a href="#">Ipod</a>
                            </div>
                            <div class="timeline-date">8:25am</div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>Sara</b> Added a new item to his store:
                                <a href="#">Watch</a>
                            </div>
                            <div class="timeline-date">9:35am</div>
                        </li>
                    </ol>

                </aside>
                <!-- end: .tray-right -->

            </section>
            <!-- End: Content -->

        </section>

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


@endsection
