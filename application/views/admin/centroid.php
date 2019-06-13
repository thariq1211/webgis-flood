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
            <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-target="#TambahCentroid"><b>Tambah Data</b></a>
          </div>
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Sampel Centroid</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sampel Cluster</th>
                    <th>nJenis Tanah</th>
                    <th>nKemiringan</th>
                    <th>nLahan</th>
                    <th>nOrde Sungai</th>
                    <th>nCurah Hujan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sampel Cluster</th>
                    <th>nJenis Tanah</th>
                    <th>nKemiringan</th>
                    <th>nLahan</th>
                    <th>nOrde Sungai</th>
                    <th>nCurah Hujan</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <?php foreach ($centroid as $key): ?> 
                <tbody>
                  <tr>
                    <td><?php echo $key->sample_cluster; ?></td>
                    <td><?php echo $key->njenis_tanah; ?></td>
                    <td><?php echo $key->nkemiringan; ?></td>
                    <td><?php echo $key->nlahan; ?></td>
                    <td><?php echo $key->norde_sungai; ?></td>
                    <td><?php echo $key->nCH; ?></td>
                    <td><a class="btn btn-outline-success btn-sm" href="<?php echo base_url('admin/admin/ambilCentroid/'.$key->id_cluster); ?>">Edit</a>
                      <a class="btn btn-outline-danger btn-sm" href="<?php echo base_url('admin/admin/hapusCentroid/'.$key->id_cluster); ?>">Hapus</a></td>
                  </tr>
                </tbody>
                <?php endforeach ?>
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
  <?php $this->load->view('admin/_partials/addCentroidModal.php'); ?>
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>
  <?php $this->load->view('admin/_partials/logoutmodal.php') ?>
  <?php $this->load->view('admin/_partials/js.php') ?>
  
</body>
</html>