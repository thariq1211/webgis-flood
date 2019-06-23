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
     <h2 class="tm-block-title">Data Wilayah Jember</h2>
     <table class="table">
      <thead>
       <tr>
        <th scope="col">Kecamatan.</th>
        <th scope="col">Luas Wilayah (KM2)</th>
        <th scope="col">Jenis Tanah</th>
        <th scope="col">Kemiringan Tanah</th>
        <th scope="col">Penggunaan Lahan</th>
        <th scope="col">Orde Sungai</th>
        <th scope="col">Curah Hujan</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($atribut as $key): ?>
      
     <tr>
      <th><b><?php echo $key->kecamatan; ?></b></th>
      <td><?php echo $key->luas_wilayah; ?> KM2</td>
     <td><b><?php echo $key->jenis_tanah; ?></b></td>
     <td><b><?php echo $key->kemiringan; ?></b></td>
     <td><b><?php echo $key->penggunaan_lahan; ?></b></td>
     <td><b><?php echo $key->orde_sungai; ?></b></td>
     <td><b><?php echo $key->curah_hujan; ?> mm</b></td>
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