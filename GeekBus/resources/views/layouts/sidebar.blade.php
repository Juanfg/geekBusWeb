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
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/bootstrap.css') }}">
    <!--external css-->
    <link href="/assetsSidebar/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assetsSidebar/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/assetsSidebar/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/assetsSidebar/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="/assetsSidebar/css/style.css" rel="stylesheet">
    <link href="/assetsSidebar/css/style-responsive.css" rel="stylesheet">

    <script src="/assetsSidebar/js/chart-master/Chart.js"></script>
    @stack('scripts')

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
            <!--logo start-->
            {{--<a href={{ url('user/profile'); }} class="logo"><b>GEEKBUS</b></a>--}}
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                    <!-- inbox dropdown end -->
                </ul>
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

              	  <p class="centered"><a href="profile.html"><img src="/assetsSidebar/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Nacho Cabral</h5>

                  <li class="mt">
                      <a class="active" href="index.html">
                          <span>Inicio</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>Autobuses</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>Choferes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>Rutas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-9 main-chart">
                    @yield('content');
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  <div class="col-lg-3 ds">

                    @section('rightsidebar')
                    <h3>NOTIFICACIONES</h3>
                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 2 minutos</muted><br/>
                             <a href="#">La unidad 5</a> excedió el límite de velocidad.<br/>
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
            <h3>CHOFERES EN TURNO</h3>
                      <!-- First Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
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
                          <img class="img-circle" src="assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
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
                          <img class="img-circle" src="assets/img/ui-danro.jpg" width="35px" height="35px" align="">
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
                          <img class="img-circle" src="assets/img/ui-zac.jpg" width="35px" height="35px" align="">
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
                          <img class="img-circle" src="assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Nacho Cabral</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                    @show
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

    </body>
    </html>