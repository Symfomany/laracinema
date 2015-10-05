<!-----------------------------------------------------------------+ 
       "#sidebar_left" Helper Classes: 
    -------------------------------------------------------------------+ 
       * Positioning Classes: 
        '.affix' - Sets Sidebar Left to the fixed position 

       * Available Skin Classes:
         .sidebar-dark (default no class needed)
         .sidebar-light  
         .sidebar-light.light   
    -------------------------------------------------------------------+
       Example: <aside id="sidebar_left" class="affix sidebar-light">
       Results: Fixed Left Sidebar with light/white background
    ------------------------------------------------------------------->

<!-- Start: Sidebar -->
<aside id="sidebar_left" class="light sidebar-light affix">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

            <!-- Sidebar Widget - Author -->
            <div class="sidebar-widget author-widget">
                <div class="media">
                    <a class="media-left" href="#">
                        {{--<img src="assets/img/avatars/3.jpg" class="img-responsive">--}}
                    </a>
                    <div class="media-body">
                        <div class="media-links">
                            {{--<a href="#" class="sidebar-menu-toggle">User Menu -</a> --}}
                        </div>
                        <div class="media-author">Boyer Julien
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget - Search (hidden) -->
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Rechercher un film...">
                </div>
            </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li>
                <a href="pages_calendar.html">
                    <span class="fa fa-calendar"></span>
                    <span class="sidebar-title">Nouveaux films</span>
              <span class="sidebar-title-tray">
                <span class="label label-xs bg-primary">3</span>
              </span>
                </a>
            </li>
            <li>
                <a href="../README/index.html">
                    <span class="glyphicon glyphicon-book"></span>
                    <span class="sidebar-title">Meilleurs catégories</span>
                </a>
            </li>

        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>
<!-- End: Sidebar Left -->
