@extends('Admin/layout')

@section('bodyclass') widgets-scroller-page @endsection
@section('css')
    @parent
    <link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet" />
@endsection
@section('js')
    @parent

    <!-- Page Javascript -->
    <script src="{{ asset('js/demo/charts/highcharts.js') }}"></script>
    <script src="{{ asset('js/utility/utility.js') }}"></script>

    <!-- Charts JS -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-3d.js"></script>

    <script src="{{ asset('plugins/circles/circles.js') }}"></script>
    <script src="{{ asset('plugins/slick/slick.js') }}"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeJJa0CpvMqUJop4sOh3w8N3roqzfV_cg&libraries=geometry"></script>
    <script src="{{ asset('plugins/map/gmaps.min.js') }}"></script>
    <script src="{{ asset('plugins/gmap/jquery.ui.map.min.js') }}"></script>
    <script src="{{ asset('plugins/gmap/ui/jquery.ui.map.extensions.min.js') }}"></script>
    <script src="{{ asset('plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
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
                                    <h1 class="fs30 mt5 mbn">{{ $nbfilms  }}</h1>
                                    <h6 class="text-system">Nb. de Films</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                  <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-success"></i> 7 actifs
                    <b>1W AGO</b>
                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">{{ $nbseances  }}</h1>
                                    <h6 class="text-success">Nb de séances</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                  <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-success"></i> 2 films à venir
                    <b>1W AGO</b>
                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">{{ $nbusers  }}</h1>
                                    <h6 class="text-warning">Nb de Users</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                  <span class="fs11">
                                    <i class="fa fa-arrow-up pr5 text-success"></i> 5 de confirmer
                                    <b>1W AGO</b>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xl-3 visible-xl">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                    <h1 class="fs30 mt5 mbn">{{ $nbcomments  }}</h1>
                                    <h6 class="text-danger">Nb de Commentaires</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                  <span class="fs11">
                                    <i class="fa fa-arrow-down pr5 text-danger"></i> 5 actifs
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
                                            <div id="high-pie" data-url="{{ url('admin/api/categories')  }}" style="width: 100%; height: 285px; margin: 0 auto" data-highcharts-chart="6">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <!-- Circle Stats -->
                                    <div class="panel" data-panel-color="panel-info" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title fw600 text-info"><i class="fa fa-bar-chart"></i> Quelques Statistiques sur les films</span>
                                        </div>
                                        <div class="panel-body">
                                            <div class="mb20 text-right">
                                                <span class="fs11 text-muted">
                                                  <i class="fa fa-circle text-warning fs12 pr5"></i> Passés</span>
                                                <span class="fs11 text-muted ml10">
                                                  <i class="fa fa-circle text-info fs12 pr5"></i> Présent</span>
                                                <span class="fs11 text-muted ml10">
                                                  <i class="fa fa-circle text-primary fs12 pr5"></i> Futur</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <div class="info-circle" id="c1" title="Passés" value="80" data-circle-color="primary">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="info-circle" id="c2" title="Présent" value="30" data-circle-color="info">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="info-circle" id="c3" title="Futur" value="55" data-circle-color="warning">
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


                            <div class="slider-demo7">
                                    <div class="center-mode">
                                        @foreach($videos as $video)
                                                <div class="slick-slide">
                                                        <a href="https://www.youtube.com/watch?v={{ $video['data']['id']['videoId'] }}" target="_blank">
                                                            <img src="{{ $video['data']['snippet']['thumbnails']['default']['url'] }}" />
                                                        </a>

                                                </div>
                                        @endforeach
                                     </div>
                            </div>

                    </div>
                    <hr class="clear" />


                    <div class="row">
                        <div class="col-md-8">
                                <div class="panel panel-widget chat-widget">
                                    <div class="panel-heading">
                                        <span class="panel-icon">
                                          <i class="fa fa-comments"></i>
                                        </span>
                                        <span class="panel-title"> Messagerie instantanée</span>
                                    </div>
                                    <div style="height: 300px" class="panel-body bg-light dark panel-scroller scroller-primary scroller-lg pn" id="container_tchat">

                                        @foreach($messages as $message)
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" alt="64x64" src="{{ $message['data']['photo']  }}">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <span class="media-status"></span>
                                                    <h5 class="media-heading">{{ $message['data']['user']  }}
                                                        <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($message['created_at']))->diffForHumans() }}</small>
                                                    </h5> {{ $message['data']['message']  }}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="panel-footer">


                                        <div class="input-group" id="form_tchat">
                                            <input data-token="{{ csrf_token() }}"  maxlength="100" type="text" class="form-control" placeholder="Régissez ici...">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default btn-gradient" type="button"><span class="fa fa-pencil"></span> Ecrivez</button>
                                              </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>


                                </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="pane panel panel-info">
                                    <div class="panel-heading">
                                <span class="panel-icon">
                                  <i class="fa fa-pencil"></i>
                                </span>
                                        <span class="panel-title"> <span class="fa fa-twitter"></span> Tweets</span>
                                    </div>
                                    <div class="panel-body border panel-scroller scroller-lg pn">
                                        @foreach($tweets as $tweet)
                                            <table class="table mbn tc-med-1 tc-bold-last">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {!! Twitter::linkify($tweet['data']['text']) !!}
                                                        </td>
                                                        <td>
                                                            <span class="label label-info"><span class="fa fa-clock-o"></span> {{  Twitter::ago($tweet['data']['created_at']) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        @endforeach
                                        <p></p>
                                    </div>

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



                        <div class="row">
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
                        <div class="col-md-4">


                                <div class="panel listgroup-widget">
                                    <div class="panel-heading">
                                <span class="panel-icon">
                                  <i class="fa fa-youtube"></i>
                                </span>
                                        <span class="panel-title">Statistiques de Youtube</span>
                                        <sub>Mis à jour   {{ \Carbon\Carbon::createFromTimeStamp(strtotime($youtubeinfodateupdated))->diffForHumans() }}
                                        </sub>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">

                                            <h3><span class="fa fa-youtube-play"></span><b> {{ $youtubeinfo['snippet']['title']  }}</b></h3>
                                        </li>
                                        <li class="list-group-item">
                                                <p class="row">
                                                    <img class="pull-right" src="{{ $youtubeinfo['snippet']['thumbnails']['default']['url']  }}" />
                                                    {{ $youtubeinfo['snippet']['description']  }}
                                                </p>
                                        </li>

                                        <li class="list-group-item">
                                            <span class="badge badge-primary">
                                                {{ $youtubeinfo['statistics']['viewCount']  }}
                                            </span>
                                            Nombre de vues

                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-success">{{ $youtubeinfo['statistics']['commentCount']  }}</span>
                                            Nombre de commentaires
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-info">{{ $youtubeinfo['statistics']['subscriberCount']  }}</span>
                                            Nombre de membres
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-warning">{{ $youtubeinfo['statistics']['videoCount']  }}</span>
                                            Nombre de vidéo
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="panel listgroup-widget">
                                    <div class="panel-heading">
                                <span class="panel-icon">
                                  <i class="fa fa-twitter-square"></i>
                                </span>
                                        <span class="panel-title">Statistiques de Twitter</span>
                                        <sub>Mis à jour   {{ \Carbon\Carbon::createFromTimeStamp(strtotime($tweeterinfodateupdated))->diffForHumans() }}
                                        </sub>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                              <h3>
                                                  <span class="fa fa-twitter-square"></span>
                                                  {{ $tweeterinfo['name']  }}
                                              </h3>

                                        </li>
                                        <li class="list-group-item">
                                                <p class="row">
                                                    <img class="pull-right" src="{{ $tweeterinfo['profile_image_url']  }}" />
                                                    {{ $tweeterinfo['description']  }}
                                                </p>
                                        </li>

                                        <li class="list-group-item">
                                            <span class="badge badge-primary">
                                                {{ $tweeterinfo['followers_count']  }}
                                            </span>
                                            Nombre de follower

                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-success">{{ $tweeterinfo['friends_count']  }}</span>
                                            Nombre de follow
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-info">{{ $tweeterinfo['favourites_count']  }}</span>
                                            Nombre de favoris
                                        </li>
                                        

                                    </ul>
                                </div>
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
                        <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title"> Nombre de séances par mois</span>
                        </div>
                        <div class="panel-body pn">
                            <div id="ecommerce_chart2" data-url="{{ url('admin/api/sessions') }}" ></div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-8">
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

                        <div class="col-md-4">
                                <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <span class="panel-title">Film aléatoire: <b>{{ $video['data']['snippet']['title'] }}</b></span>
                                        </div>
                                        <div class="panel-body border">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe src="https://www.youtube.com/embed/{{ str_replace('"', "", $video['data']['id']['videoId']) }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                </div>
                        </div>

                </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel">
                                <div class="panel-heading">
                                <span class="panel-title">
                                  <span class="glyphicon glyphicon-map-marker"></span>Map with Clickable Locations</span>
                                </div>
                                <div class="panel-menu">
                                    <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_1","latlng":{"lat":27.6648274,"lng":-81.51575350000002},"tags":"drupal"}' data-title="Florida DrupalCamp - Feb 11 2012">
                                        <span class="glyphicon glyphicon-map-marker pr5"></span>1</button>
                                    <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_2","latlng":{"lat":1.352083,"lng":103.81983600000001},"tags":"drupal"}' data-title="DrupalCamp Singapore - Mar 03 2012">
                                        <span class="glyphicon glyphicon-map-marker pr5"></span>2</button>
                                    <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_3","latlng":{"lat":39.7391536,"lng":-104.9847034},"tags":"drupal"}' data-title="DrupalCon 2012 Denver - Mar 20 2012">
                                        <span class="glyphicon glyphicon-map-marker pr5"></span>3</button>
                                    <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_4","latlng":{"lat":36.1658899,"lng":-86.7844432},"tags":"drupal"}' data-title="DrupalCamp Nashville - Apr 28 2012">
                                        <span class="glyphicon glyphicon-map-marker pr5"></span>4</button>
                                    <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_5","latlng":{"lat":55.6760968,"lng":12.568337100000008},"tags":"drupal"}' data-title="Camp Copenhagen 5.0 - May 11 2012">
                                        <span class="glyphicon glyphicon-map-marker pr5"></span>5</button>
                                </div>
                                <div class="panel-body">
                                    <div id="map_canvas2" class="map"></div>
                                </div>
                            </div>



                        </div>
                </div>
                <!-- end: .tray-center -->



        </section>



@endsection
