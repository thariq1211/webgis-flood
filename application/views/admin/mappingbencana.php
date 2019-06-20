<?php 
if ($_SESSION['cek_login'] != '1') {
  redirect(base_url(),'refresh');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/_partials/head.php')?>
  <?php echo $map['js']; ?>
</head>
<body id="page-top">
	<?php $this->load->view('admin/_partials/navbar.php')?>

	<div id="wrapper">
		
		<?php $this->load->view('admin/_partials/sidebar.php')?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view('admin/_partials/breadcrumb.php') ?>
       
       <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-area"></i>
          Mapping Banjir</div>
          <div class="card-body">
          <!-- <div id="map"></div> -->
            <?php echo $map['html']; ?>
          </div>
          <div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds</div>
        </div>

      </div>
      <?php $this->load->view('admin/_partials/footer.php') ?>
    </div>

  </div>
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>
  <?php $this->load->view('admin/_partials/logoutmodal.php') ?>
  <?php $this->load->view('admin/_partials/js.php') ?>
  
  <script>
  function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 1,
    center: {lat: -8.184486, lng: 113.668076},
    gestureHandling: 'none',
          zoomControl: false
  });
  

  var ctaLayer = new google.maps.KmlLayer({
    url: 'https://raw.githubusercontent.com/thariq1211/kml/master/peta%20kecamatan.kml',
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
  drawingManager.setMap(map);
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap">
</script>
</body>
</html>