<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/bootstrap.css') }}">     <!--external css--> 
<link rel="stylesheet" href="{{ URL::asset('assetsSidebar/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/zabuto_calendar.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assetsSidebar/js/gritter/css/jquery.gritter.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assetsSidebar/lineicons/style.css') }}">

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/style-responsive.css') }}">

    <script src="assetsSidebar/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>GEEKBUS</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assetsSidebar/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Marcel Newman</h5>
                    
                  <li class="mt">
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Inicio</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Camiones</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Choferes</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Rutas</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 col-xs-12 main-chart">
                  @yield('content')
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 hidden-sm hidden-xs hidden-md ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <h3>NOTIFICACIONES</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>2 Minutes Ago</muted><br/>
                             <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>3 Hours Ago</muted><br/>
                             <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>7 Hours Ago</muted><br/>
                             <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>11 Hours Ago</muted><br/>
                             <a href="#">Mark Twain</a> commented your post.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>18 Hours Ago</muted><br/>
                             <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                          </p>
                        </div>
                      </div>

                       <!-- USERS ONLINE SECTION -->
            <h3>CHOFERES ACTIVOSS</h3>
                      <!-- First Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assetsSidebar/img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DIVYA MANIAN</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Second Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assetsSidebar/img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DJ SHERMAN</a><br/>
                             <muted>I am Busy</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assetsSidebar/img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DAN ROGERS</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assetsSidebar/img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Zac Sniders</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assetsSidebar/img/ui-sam.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Marcel Newman</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>

                      
                  </div><!-- /col-lg-3 -->
              </div>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - GeekBus
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('assetsSidebar/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ URL::asset('assetsSidebar/js/common-scripts.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ URL::asset('assetsSidebar/js/gritter-conf.js') }}"></script>
  </body>
</html>
