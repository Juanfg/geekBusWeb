@extends('layouts.sidebar')
@section('title', 'Dashboard')
      
@section('content')
<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; width: 100%;}
</style>
<div class="col-xs-12">
    <h1>Ultimas ubicaciones de camiones</h1><br>
    <div id="map" style="height:500px;"></div>
</div>
<script type="text/javascript">

var map;
function initMap() {
  var myLatLng =  {lat: {{$autobuses[0]->lat}}, lng: {{$autobuses[0]->long}} };

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

    @foreach ($autobuses as $autobus)
        var marker = new google.maps.Marker({
            position: {lat: {{$autobus->lat}}, lng: {{$autobus->long}} },
            map: map,
            title: "{{$autobus->nombre}}{{$autobus->unidad}}"
          });
    @endforeach

}

</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_9PZAZmSz49MCe2lMaWKhd7zq9vy8o7E&callback=initMap">
</script>
@endsection



    

