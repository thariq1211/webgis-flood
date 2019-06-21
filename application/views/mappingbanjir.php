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
  <!-- <?php echo $map['html']; ?> -->
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

  var i = 0;
  <?php foreach ($hasil_cluster as $key): ?>

  kecamatanDB = "<?php echo $key->kecamatan; ?>";
  var hasil_cluster = "<?php echo $key->hasil_cluster; ?>";
  var color = '';
  i++;
  console.log(kecamatanDB);
  map.data.setStyle(function(feature){
    var kecamatan = feature.getProperty('Name');
    if (kecamatanDB == kecamatan) {
      if (hasil_cluster == "C1") {
        color = 'red';
        console.log("1");
      }else if(hasil_cluster == "C2"){
        color = 'green';
        console.log("2");
      }else if(hasil_cluster == "C3"){
        color = 'yellow';
        console.log("3");
      }else if (hasil_cluster == "C4") {
        color = 'orange';
        console.log("4");
      }else{
        color = 'blue';
        console.log("5");
      }
    } else {
      color = 'white';
      // console.log("6");
    }
    return{
      fillColor: color,
      fillOpacity: 0.5,
      strokeWeight: 1
    };
    i = 0;
  });
<?php endforeach ?> 

  // NOTE: This uses cross-domain XHR, and may not work on older browsers.
  // map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');
  
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap"></script>
</body>

</html>