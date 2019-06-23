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
  <h2 class="tm-block-title">Pemetaan Bencana</h2>
  <div id="map"></div>
  <div id="info-box"></div>
</div>
<?php $this->load->view('_partials/footer'); ?>
</div>

<?php $this->load->view('_partials/js'); ?>
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

  // // map.data.loadGeoJson('jsonData');
  // var promise = $.getJSON("<?php echo base_url('assets/json/peta_kecamatan.geojson'); ?>"); //same as map.data.loadGeoJson();
  // promise.then(function(data){
  //       cachedGeoJson = data; //save the geojson in case we want to update its values
  //       map.data.addGeoJson(cachedGeoJson,{idPropertyName:"id"});  
  //     });
  var data = new google.maps.Data({map: map});
  data.loadGeoJson(
    '<?php echo base_url('assets/json/peta_kecamatan.json'); ?>');
  data.setStyle(function(feature){
    var kecamatanJS = feature.getProperty('Name');
    // console.log(kecamatanJS);
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
    infowindow.setContent(contentString);
    infowindow.setPosition(event.feature.getGeometry().get());
    infowindow.open(map);
    console.log(event);
  });
  
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap"></script>
</body>

</html>