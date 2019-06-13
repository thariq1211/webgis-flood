<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('_partials/head'); ?>
</head>
<body id="reportsPage">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


 <div class="" id="home">
  <?php $this->load->view('_partials/navbar'); ?>
  <div class="container">
   <div class="row">
    <?php $this->load->view('_partials/breadcrumb'); ?>
  </div>
  <!-- row -->
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
     <div class="tm-bg-primary-dark tm-block">
      <h2 class="tm-block-title">Jumlah Kelompok Cluster</h2>
      <table class="table">
        <thead>
         <tr>
          <th scope="col"><b>Cluster</b></th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>C1</td>
          <?php foreach ($C1 as $key): ?>
            <td><?php $c1 = $key->c1;
            echo $c1; ?> Kecamatan</td>
          <?php endforeach ?>
        </tr>
        <tr>
          <td>C2</td>
          <?php foreach ($C2 as $key): ?>
            <td><?php $c2 = $key->c2;
            echo $c2; ?> Kecamatan</td>
          <?php endforeach ?>
        </tr>
        <tr>
          <td>C3</td>
          <?php foreach ($C3 as $key): ?>
            <td><?php $c3 = $key->c3;
            echo $c3; ?> Kecamatan</td>
          <?php endforeach ?>
        </tr>
        <tr>
          <td>C4</td>
          <?php foreach ($C4 as $key): ?>
            <td><?php $c4 = $key->c4;
            echo $c4; ?> Kecamatan</td>
          <?php endforeach ?>
        </tr>
        <tr>
          <td>C5</td>
          <?php foreach ($C5 as $key): ?>
            <td><?php $c5 = $key->c5;
            echo $c5; ?> Kecamatan</td>
          <?php endforeach ?>
        </tr>
      </tbody>
    </table>  
  </div>
</div>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var c1,c2,c3,c4,c5;
  c1 = <?php echo $c1; ?>; c2 = <?php echo $c2; ?>; c3 = <?php echo $c3; ?>; c4 = <?php echo $c4; ?>; c5 = <?php echo $c5; ?>;
  var data = google.visualization.arrayToDataTable([
  ['Cluster', 'Jumlah'],
  ['Cluster 1', c1],
  ['Cluster 2', c2],
  ['Cluster 3', c3],
  ['Cluster 4', c4],
  ['Cluster 5', c5]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':450, 'height':310, 'backgroundColor':'#50697f'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
 <div class="tm-bg-primary-dark tm-block tm-block-taller">
  <h2 class="tm-block-title">Persebaran Cluster</h2>
  <div id="pieChartContainer">
   <!-- <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas> -->
   <div id="piechart" style="color: #435c70"></div>
 </div>                        
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">

</div>
<div class="col-12 tm-block-col">
  <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
    <h2 class="tm-block-title">Tabel Hasil Clustering Rawan Banjir</h2>
    <table class="table">
      <thead>
       <tr>
        <th scope="col"><b>Kecamatan</b></th>
        <th scope="col">Jarak Ke C1</th>
        <th scope="col">Jarak Ke C2</th>
        <th scope="col">Jarak Ke C3</th>
        <th scope="col">Jarak Ke C4</th>
        <th scope="col">Jarak Ke C5</th>
        <th scope="col">Kelompok</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($hasil_cluster as $key): ?>
       <tr>
         <td><b><?php echo $key->kecamatan ; ?></b></td>
         <td><b><?php echo $key->d1; ?></b></td>
         <td><b><?php echo $key->d2; ?></b></td>
         <td><b><?php echo $key->d3; ?></b></td>
         <td><b><?php echo $key->d4; ?></b></td>
         <td><b><?php echo $key->d5; ?></b></td>
         <td style="color:<?php if ($key->hasil_cluster=="C1") {
           echo "#ff5722";
         } if ($key->hasil_cluster=="C2") {
           echo "#ff9800";
         } if ($key->hasil_cluster=="C3") {
           echo "#ffc107";
         } if ($key->hasil_cluster=="C4") {
           echo "#ffeb3b";
         } if ($key->hasil_cluster=="C5") {
           echo "#cddc39";
         } ?>"><b><div class="tm-status-circle <?php if ($key->hasil_cluster=="C1") {
           echo "c1";
         } if ($key->hasil_cluster=="C2") {
           echo "c2";
         } if ($key->hasil_cluster=="C3") {
           echo "c3";
         } if ($key->hasil_cluster=="C4") {
           echo "c4";
         } if ($key->hasil_cluster=="C5") {
           echo "c5";
         }?>">
       </div><?php echo $key->hasil_cluster; ?></b></td>
     </tr>
   <?php endforeach ?>
 </tbody>
</table>
</div>
</div>
</div>
</div>
<?php $this->load->view('_partials/footer'); ?>
</div>

<?php $this->load->view('_partials/js'); ?>
</body>

</html>