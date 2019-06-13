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
         <!-- isinya -->
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Generate Centroid</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Centroid 1</td>
                    <td>Sangat Baik</td>
                    <td><?php echo $c1; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 2</td>
                    <td>Baik</td>
                    <td><?php echo $c2; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 3</td>
                    <td>Cukup</td>
                    <td><?php echo $c3; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 4</td>
                    <td>Kurang</td>
                    <td><?php echo $c4; ?></td>
                  </tr>
                  <tr>
                    <td>Centroid 5</td>
                    <td>Kurang Sekali</td>
                    <td><?php echo $c5; ?></td>
                  </tr>
                </tbody>
              </table>
               <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jenis Tanah</th>
                    <th>Kemiringan</th>
                    <th>Penggunaan Lahan</th>
                    <th>Orde Sungai</th>
                    <th>Curah Hujan</th>
                    <th>Rata" Nilai</th>
                    <th colspan="5">Jarak</th>
                    <th>Cluster</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jenis Tanah</th>
                    <th>Kemiringan</th>
                    <th>Penggunaan Lahan</th>
                    <th>Orde Sungai</th>
                    <th>Curah Hujan</th>
                    <th>Rata" Nilai</th>
                    <th colspan="5">Jarak</th>
                    <th>Cluster</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($atribut->result() as $s): ?>
                  <tr>
                    <td><?php echo $s->kecamatan; ?></td>
                    <td><?php echo $s->jenis_tanah; ?></td>
                    <td><?php echo $s->kemiringan; ?></td>
                    <td><?php echo $s->penggunaan_lahan; ?></td>
                    <td><?php echo $s->orde_sungai; ?></td>
                    <td><?php echo $s->curah_hujan; ?></td>
                    <td><?php echo $s->rata2; ?></td>
                    <td><?php echo $s->d1; ?></td>
                    <td><?php echo $s->d2; ?></td>
                    <td><?php echo $s->d3; ?></td>
                    <td><?php echo $s->d4; ?></td>
                    <td><?php echo $s->d5; ?></td>
                    <td><?php echo $s->predikat; ?></td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds</div>
        </div>
				 <!-- isinya -->
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>

	</div>
	<?php $this->load->view('admin/_partials/scrolltop.php') ?>
	<?php $this->load->view('admin/_partials/logoutmodal.php') ?>
	<?php $this->load->view('admin/_partials/js.php') ?>
	
</body>
</html>