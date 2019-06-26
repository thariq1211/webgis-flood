<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/__partials/head'); ?>
  <style type="text/css" media="screen">
    #map {
      height: 750px;
    }
    #legend {
      font-family: Arial, sans-serif;
      size: 50pt;
      background: white;
      padding: 10px;
      border: 1px solid black;
      margin-left: 10px;
      border-radius: 5px;
    }
    #legend h3 {
      margin-top: 2px;
    }
    #legend img {
      vertical-align: middle;
    }
    #legenda{
      z-index: 1;
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
              <div class="card" id="map"></div>
              <div class="card col-2 waves-effect" id="legenda">
              <h4>Legenda</h4>
              <table class="table">
                <tbody>
                  <tr>
                    <td align="right"><img src="<?php echo base_url('assets/images/c1.png'); ?>" alt=""></td>
                    <td>: Banjir Tinggi</td>
                  </tr>
                  <tr>
                    <td align="right"><img src="<?php echo base_url('assets/images/c2.png'); ?>" alt=""></td>
                    <td>: Banjir Sedang</td>
                  </tr>
                  <tr>
                    <td align="right"><img src="<?php echo base_url('assets/images/c3.png'); ?>" alt=""></td>
                    <td>: Banjir Rendah</td>
                  </tr>
                  <tr>
                    <td align="right"><img src="<?php echo base_url('assets/images/c4.png'); ?>" alt=""></td>
                    <td>: Banjir Aman</td>
                  </tr>
                  <tr>
                    <td align="right"><img src="<?php echo base_url('assets/images/c5.png'); ?>" alt=""></td>
                    <td>: Non Banjir</td>
                  </tr>
                </tbody>
              </table>
              </div>
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
    var kecamatanJS = '';
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    function initMap() {
      var infowindow = new google.maps.InfoWindow();
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10.8,
        center: {lat: -8.250000, lng: 113.668076},
        draggable:false,
        zoomControl: false
      });
      var json;
// data kecamatan
// =======================
var features = [{
  position:new google.maps.LatLng(-8.284932, 113.362583),
  label:'Kencong'
},{
  position:new google.maps.LatLng(-8.325144, 113.404629),
  label:'Gumukmas'
},{
  position:new google.maps.LatLng(-8.330783, 113.468624),
  label:'Puger'
},{
  position:new google.maps.LatLng(-8.353931, 113.535548),
  label:'Wuluhan'
},{
  position:new google.maps.LatLng(-8.369719, 113.610606),
  label:'Ambulu'
},{
  position:new google.maps.LatLng(-8.361125, 113.722456),
  label:'Tempurejo'
},{
  position:new google.maps.LatLng(-8.218442, 113.887123),
  label:'Silo'
},{
  position:new google.maps.LatLng(-8.194704, 113.792424),
  label:'Mayang'
},{
  position:new google.maps.LatLng(-8.248752, 113.739172),
  label:'Mumbulsari'
},{
  position:new google.maps.LatLng(-8.285572, 113.647460),
  label:'Jenggawah'
},{
  position:new google.maps.LatLng(-8.223042, 113.654886),
  label:'Ajung'
},{
  position:new google.maps.LatLng(-8.212076, 113.603840),
  label:'Rambipuji'
},{
  position:new google.maps.LatLng(-8.264503, 113.534112),
  label:'Balung'
},{
  position:new google.maps.LatLng(-8.226140, 113.412986),
  label:'Umbulsari'
},{
  position:new google.maps.LatLng(-8.170287, 113.426364),
  label:'Semboro'
},{
  position:new google.maps.LatLng(-8.204848, 113.371881),
  label:'Jombang'
},{
  position:new google.maps.LatLng(-8.091808, 113.401077),
  label:'Sumberbaru'
},{
  position:new google.maps.LatLng(-8.153855, 113.478886),
  label:'Tanggul'
},{
  position:new google.maps.LatLng(-8.195193, 113.544735),
  label:'Bangsalsari'
},{
  position:new google.maps.LatLng(-8.161381, 113.618246),
  label:'Panti'
},{
  position:new google.maps.LatLng(-8.161381, 113.618246),
  label:'Sukorambi'
},{
  position:new google.maps.LatLng(-8.104309, 113.749163),
  label:'Arjasa'
},{
  position:new google.maps.LatLng(-8.161633, 113.770166),
  label:'Pakusari'
},{
  position:new google.maps.LatLng(-8.126568, 113.811954),
  label:'Kalisat'
},{
  position:new google.maps.LatLng(-8.136141, 113.883614),
  label:'Ledokombo'
},{
  position:new google.maps.LatLng(-8.069533, 113.899395),
  label:'Sumberjambe'
},{
  position:new google.maps.LatLng(-8.064722, 113.833615),
  label:'Sukowono'
},{
  position:new google.maps.LatLng(-8.064858, 113.731917),
  label:'Jelbuk'
},{
  position:new google.maps.LatLng(-8.182464, 113.670964),
  label:'Kaliwates'
},{
  position:new google.maps.LatLng(-8.184432, 113.723779),
  label:'Sumbersari'
},{
  position:new google.maps.LatLng(-8.140902, 113.703930),
  label:'Patrang'
}];

//========================
//end data
//========================
//
//Create Markers
//
features.forEach(function(feature) {
  var marker = new google.maps.Marker({
    position: feature.position,
    label:feature.label,
    map: map
  });
});

var data = new google.maps.Data({map: map});
data.loadGeoJson(
  '<?php echo base_url('assets/json/peta_kecamatan.json'); ?>');
data.setStyle(function(feature){
  kecamatanJS = feature.getProperty('Name');
  // console.log(kecamatanJS);
  <?php foreach ($hasil_cluster as $key): ?>
  var kecamatanDB = "<?php echo $key->kecamatan; ?>";
  var hasil_cluster = "<?php echo $key->hasil_cluster; ?>";
  if (kecamatanJS == kecamatanDB) {
    var color = '';
    var cluster = '';
    if (hasil_cluster == "C1") {
     color = '#af010b';
     cluster = 'Banjir Tinggi';
        // console.log("1");
      }if(hasil_cluster == "C2"){
       color = '#ff8901';
       cluster = 'Banjir Sedang';
        // console.log("2");
      }if(hasil_cluster == "C3"){
       color = '#e8d403';
       cluster = 'Banjir Rendah';
        // console.log("3");
      }if (hasil_cluster == "C4") {
       color = '#0265da';
       cluster = 'Banjir Aman';
        // console.log("4");
      }if(hasil_cluster == "C5"){
       color = '#3a9a03';
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

var iconC1 = '<?php echo base_url('assets/images/c1.png'); ?>';
var iconC2 = '<?php echo base_url('assets/images/c2.png'); ?>';
var iconC3 = '<?php echo base_url('assets/images/c3.png'); ?>';
var iconC4 = '<?php echo base_url('assets/images/c4.png'); ?>';
var iconC5 = '<?php echo base_url('assets/images/c5.png'); ?>';

var legenda = document.getElementById('legenda');
var div = document.createElement('div');
div.innerHTML = '<img src="' + iconC1 + '"> ' + ': Banjir Tinggi';
div.innerHTML = '<img src="' + iconC1 + '"> ' + ': Banjir Sedang';
div.innerHTML = '<img src="' + iconC1 + '"> ' + ': Banjir Rendah';
div.innerHTML = '<img src="' + iconC1 + '"> ' + ': Banjir Aman';
div.innerHTML = '<img src="' + iconC1 + '"> ' + ': Non Banjir';
// legenda.appendChild(div);

map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legenda);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzlah4LE55Jv-CPzpcjsXY-zz3ABdyelk&callback=initMap" async defer></script>
<?php $this->load->view('admin/__partials/js'); ?>
</body>

</html>