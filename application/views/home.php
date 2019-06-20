<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('_partials/head'); ?>
</head>

<body id="reportsPage">
 <div class="" id="home">
  <?php $this->load->view('_partials/navbar'); ?>
  <div class="container">
   <div class="row">
    <?php $this->load->view('_partials/breadcrumb'); ?>
  </div>
  <!-- row -->
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
      <h2 class="tm-block-title">Ringkasan Data Rawan Bencana Banjir Jember</h2>
       <table class="table">
        <thead>
         <tr>
          <th scope="col">No</th>
          <th scope="col">Ringkasan</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
       <tr>
        <th><b>1</b></th>
        <td>Jumlah Kecamatan Terdaftar</td><?php foreach ($kecamatan->result() as $key): ?>
        <td><b><?php echo $key->kec; ?></b> Kecamatan</td>
        <?php endforeach ?>
      </tr>
      <tr>
        <th><b>2</b></th>
        <td>Jumlah Sampel Centroid</td><?php foreach ($centroid->result() as $key): ?>
        <td><b><?php echo $key->cen; ?></b> centroid</td>
        <?php endforeach ?>
      </tr>
      <tr>
        <th><b>3</b></th>
        <td>Banyak Iterasi <i>K-Means Clustering</i></td><?php foreach ($iterasi->result() as $key): ?>
        <td><b><?php echo $key->it; ?> iterasi</b></td>
        <?php endforeach ?>
      </tr>
      <tr>
        <th><b>4</b></th>
        <td>Jumlah <i>Cluster</i> terbanyak</td><?php foreach ($hc->result() as $key): ?>
        <td><b><?php echo $key->hc; ?> Kecamatan</b></td>
        <?php endforeach ?>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('_partials/footer'); ?>
</div>

<?php $this->load->view('_partials/js'); ?>

</body>

</html>