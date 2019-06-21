<?php 
if ($_SESSION['cek_login'] != '1') {
  redirect(base_url(),'refresh');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/_partials/head.php')?>
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
            <div id="peta"></div>
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
      var map = new google.maps.Map(document.getElementById('peta'), {
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
    fillOpacity: 0.5,
    strokeWeight: 1
  };
});
  
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap"></script>
</body>
</html>