<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/__partials/head'); ?>
  <style type="text/css" media="screen">
    #map {
      height: 750px;

    }
  </style>
</head>

<body class="fix-header fix-sidebar card-no-border">

  <?php $this->load->view('admin/__partials/topbar'); ?>
  
  <?php $this->load->view('admin/__partials/sidebar'); ?>
  
  <div class="page-wrapper">

    <?php $this->load->view('admin/__partials/breadcrumb'); ?>
    
    <div class="container-fluid">

      <!-- Row -->
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div id="map"></div>
              <div id="info-box"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End PAge Content -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <?php $this->load->view('admin/__partials/footer'); ?>
    </div>
  </div>
  <script>
    function initMap() {
      var infowindow = new google.maps.InfoWindow();
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10.8,
        center: {lat: -8.250000, lng: 113.668076},
        draggable:false,
        zoomControl: false
      });
      var json;


      var data = new google.maps.Data({map: map});
      data.loadGeoJson(
        '<?php echo base_url('assets/json/peta_kecamatan.json'); ?>');
      data.setStyle(function(feature){
        var kecamatanJS = feature.getProperty('Name');
        console.log(kecamatanJS);
        <?php foreach ($hasil_cluster as $key): ?>
        var kecamatanDB = "<?php echo $key->kecamatan; ?>";
        var hasil_cluster = "<?php echo $key->hasil_cluster; ?>";
        if (kecamatanJS == kecamatanDB) {
          var color = '';
          var cluster = '';
          if (hasil_cluster == "C1") {
           color = '#3366CC';
           cluster = 'Banjir Tinggi';
        // console.log("1");
      }if(hasil_cluster == "C2"){
       color = '#DC3912';
       cluster = 'Banjir Sedang';
        // console.log("2");
      }if(hasil_cluster == "C3"){
       color = '#FF9900';
       cluster = 'Banjir Rendah';
        // console.log("3");
      }if (hasil_cluster == "C4") {
       color = '#109618';
       cluster = 'Banjir Aman';
        // console.log("4");
      }if(hasil_cluster == "C5"){
       color = '#990099';
       cluster = 'Non Banjir';
        // console.log("5");
      }
    } 
  <?php endforeach ?> 
  return{
    fillColor: color,
    fillOpacity: 0.7,
    strokeWeight: 0.5
  };
});
      var contentString = '<h2>Kecamatan</h2>';

  // var marker = new google.maps.Marker({
  //         position: feature.getType('MultiPolygon'),
  //         map: map,
  //         title: feature.getProperty('Kecamatan')
  //       });
  
  data.addListener('click', function(event) {
    data.setZoom(8);
    // infowindow.setContent(contentString);
    infowindow.setPosition(event.feature.getGeometry().get());
    // infowindow.open(map);
    console.log(event);
  });
  
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap" async defer></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js"></script>
  <script src="https://raw.githubusercontent.com/marioestrada/jQuery-gMap/master/jquery.gmap.js"></script> -->
  <?php $this->load->view('admin/__partials/js'); ?>
</body>

</html>