<?php  $notificaciones = DB::table('Incidencias')->orderBy('idIncidencia', 'desc')->limit(5)->join('Eventos','Eventos.idEvento', 'Incidencias.idEvento')->join('Conductores','Conductores.idConductor','Eventos.conductor')->get(); ?>
<?php $activeUsers = DB::table('Rondas')->where('salida',null)->join('conductores', 'Conductores.idConductor','Rondas.idConductor')->join('Camiones','Camiones.idCamion','Rondas.idCamion')->join('Rutas', 'Rutas.idRuta','Camiones.idRuta')->select('Conductores.nombre', 'fotoPath', 'Rutas.nombre as ruta','Conductores.idConductor')->get(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

  <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/js/gritter/css/jquery.gritter.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/lineicons/style.css') }}">    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/style-responsive.css') }}">
    <script src="assetsSidebar/js/chart-master/Chart.js"></script>
  </head>

  <body>

  <section id="container" >
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href={{ route('/') }} class="logo"><b>GEEKBUS</b></a>
        
        <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{route('logout')}}">Logout</a></li>
        </ul>
      </div>
      </header>
    
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#"><img src="{{asset('assetsSidebar/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{Auth::user()->name}}</h5>
                    
                  <li class="mt">
                      <a href="{{route('/')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Inicio</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{route('autobuses.index')}}">
                          <i class="fa fa-dashboard" ></i>
                          <span>Camiones</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{route('choferes.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Choferes</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{route('rutas.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Rutas</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{route('paradas.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Paradas</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="#">
                          <i class="fa fa-dashboard"></i>
                          <span>Administradores</span>
                      </a>
                  </li>
                   <li class="mt">
                      <a href="#">
                          <i class="fa fa-dashboard"></i>
                          <span>Estad&iacute;sticas</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="{{route('incidencias.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Incidencias</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
  
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 col-xs-12 main-chart">
                  @yield('content')
                  </div>  
                  
                  <div class="col-lg-3 hidden-sm hidden-xs hidden-md ds">
                    <h3>NOTIFICACIONES</h3>
                      @foreach ($notificaciones as $notificacion)
                        <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>{{$notificacion->fechahora}}</muted><br/>
                             <a href="{{route('incidencias.show', [$notificacion->idIncidencia])}}">{{$notificacion->nombre}} {{App\TipoEvento::incidentDescription($notificacion->idTipoEvento)}}</a><br/>
                          </p>
                        </div>
                      </div>
                      @endforeach            
  
                      <h3>CHOFERES ACTIVOS</h3>
                      @foreach ($activeUsers as $user)
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="{{Storage::url($user->fotoPath)}}" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="{{route('choferes.show',[$user->idConductor])}}">{{$user->nombre}}</a><br/>
                             <muted>Ruta {{ $user->ruta }}</muted>
                          </p>
                        </div>
                      </div>
                      @endforeach                                  
                      
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
