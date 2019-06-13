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
				 <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-chart-area"></i>
                </div>
                <?php foreach ($kecamatan->result() as $key): ?>
                <div class="mr-5"><?php echo $key->kec; ?> Wilayah Kecamatan</div>
                <?php endforeach ?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/atribut'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <?php foreach ($centroid->result() as $key): ?>
                <div class="mr-5"><?php echo $key->cen; ?> Sampel Centroid</div>
                <?php endforeach ?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cluster'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <?php foreach ($iterasi->result() as $key): ?>
                <div class="mr-5">Banyak Iterasi: <?php echo $key->it; ?> Kali</div>
                <?php endforeach ?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <?php foreach ($hc->result() as $key): ?>
                <div class="mr-5">Kelompok Cluster terbanyak: <?php echo $key->hasil_cluster; ?></div>
                <?php endforeach ?>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/admin/iterasi_kmeans_hasil'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>

	</div>
	<?php $this->load->view('admin/_partials/scrolltop.php') ?>
	<?php $this->load->view('admin/_partials/logoutmodal.php') ?>
	<?php $this->load->view('admin/_partials/js.php') ?>
	
</body>
</html>