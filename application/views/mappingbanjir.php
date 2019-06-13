<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('_partials/head'); ?>
 <style type="text/css" media="screen">
   #map {
  height: 500px;

}
 </style>
 <?php echo $map['js']; ?>
</head>

<body id="reportsPage">
 <div class="" id="home">
  <?php $this->load->view('_partials/navbar'); ?>
  <div class="container">
   <div class="row">
    <?php $this->load->view('_partials/breadcrumb'); ?>
  </div>
  <!-- row -->
  <h2 class="tm-block-title">Pemetaan Bencana</h2><!-- <div id="map"></div> -->
     <?php echo $map['html']; ?>
     </div>
<?php $this->load->view('_partials/footer'); ?>
</div>

<?php $this->load->view('_partials/js'); ?>
<script>
  function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 1,
    center: {lat: -8.184486, lng: 113.668076},
    gestureHandling: 'none',
          zoomControl: false
  });
  

  var ctaLayer = new google.maps.KmlLayer({
    url: 'https://raw.githubusercontent.com/thariq1211/kml/master/Kabupaten%20Jember.kml',
    map: map
  });
  // var drawingManager = new google.maps.drawing.DrawingManager({
  //   drawingMode: google.maps.drawing.OverlayType.MARKER,
  //   drawingControl: true,
  //   drawingControlOptions: {
  //     position: google.maps.ControlPosition.TOP_CENTER,
  //     drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
  //   },
  //   markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
  //   circleOptions: {
  //     fillColor: '#ffff00',
  //     fillOpacity: 1,
  //     strokeWeight: 5,
  //     clickable: false,
  //     editable: true,
  //     zIndex: 1
  //   }
  // });
  // drawingManager.setMap(map);
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap">
</script>
</body>

</html>