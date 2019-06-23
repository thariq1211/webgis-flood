<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('_partials/head'); ?>
 <style type="text/css" media="screen">
   #map {
    height: 750px;

  }
</style>
<!-- <?php echo $map['js']; ?> -->
</head>

<body id="reportsPage">
 <div class="" id="home">
  <?php $this->load->view('_partials/navbar'); ?>
  <div class="container">
   <div class="row">
    <?php $this->load->view('_partials/breadcrumb'); ?>
  </div>
  <!-- row -->
  <h2 class="tm-block-title">Pemetaan Bencana</h2><div id="map"></div>
</div>
<?php $this->load->view('_partials/footer'); ?>
</div>

<?php $this->load->view('_partials/js'); ?>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10.8,
      center: {lat: -8.250000, lng: 113.668076},
      draggable:false,
      zoomControl: false
    });
    var json;

  // map.data.loadGeoJson('jsonData');
  var promise = $.getJSON("<?php echo base_url('assets/json/peta_kecamatan.geojson'); ?>"); //same as map.data.loadGeoJson();
  promise.then(function(data){
        cachedGeoJson = data; //save the geojson in case we want to update its values
        map.data.addGeoJson(cachedGeoJson,{idPropertyName:"id"});  
      });
  // map.data.loadGeoJson(
  //     '<?php echo base_url('assets/json/peta_kecamatan.json'); ?>');
  map.data.addListener('mouseover', function(event) {
    document.getElementById('info-box').textContent =
    event.feature.getProperty('Name');
  });

  map.data.setStyle(function(feature){
    var kecamatanJS = feature.getProperty('Name');
    // console.log(kecamatanJS);
    <?php foreach ($hasil_cluster as $key): ?>
    var kecamatanDB = "<?php echo $key->kecamatan; ?>";
    var hasil_cluster = "<?php echo $key->hasil_cluster; ?>";
    if (kecamatanJS == kecamatanDB) {
      var color = '';
      if (hasil_cluster == "C1") {
        color = '#3366CC';
        // console.log("1");
      }if(hasil_cluster == "C2"){
        color = '#DC3912';
        // console.log("2");
      }if(hasil_cluster == "C3"){
        color = '#FF9900';
        // console.log("3");
      }if (hasil_cluster == "C4") {
        color = '#109618';
        // console.log("4");
      }if(hasil_cluster == "C5"){
        color = '#990099';
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

  // NOTE: This uses cross-domain XHR, and may not work on older browsers.
  // map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');
  
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap"></script>
</body>

</html>