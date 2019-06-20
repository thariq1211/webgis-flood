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
            <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-target="#TambahAtribut"><b>Tambah Data</b></a>
            <a class="btn btn-outline-success" href="<?php echo base_url('admin/admin/load_upload'); ?>"><b>Upload Data</b></a>
          </div>
       <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tabel Data Atribut Banjir
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Luas Wilayah</th>
                    <th>Jenis Tanah</th>
                    <th>Kemiringan Tanah</th>
                    <th>Penggunaan Lahan</th>
                    <th>Orde Sungai</th>
                    <th>Curah Hujan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Luas Wilayah</th>
                    <th>Jenis Tanah</th>
                    <th>Kemiringan Tanah</th>
                    <th>Penggunaan Lahan</th>
                    <th>Orde Sungai</th>
                    <th>Curah Hujan</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($atribut as $key): ?>
                    <tr>
                      <!-- <td><?php echo $key->id; ?></td> -->
                      <td><?php echo $key->kecamatan; ?></td>
                      <td><?php echo $key->luas_wilayah; ?> KM2</td>
                      <td><?php echo $key->jenis_tanah; ?></td>
                      <td><?php echo $key->kemiringan; ?></td>
                      <td><?php echo $key->penggunaan_lahan; ?></td>
                      <td><?php echo $key->orde_sungai; ?></td>
                      <td><?php echo $key->curah_hujan; ?></td>
                      <td><a class="btn btn-outline-success btn-sm" href="<?php echo base_url('admin/admin/ambilAtribut/'.$key->id); ?>">Edit</a>
                      <a class="btn btn-outline-danger btn-sm" href="<?php echo base_url('admin/admin/hapusAtribut/'.$key->id); ?>">Hapus</a></td>
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
<?php $this->load->view('admin/_partials/addAtributModal.php'); ?>
  <?php $this->load->view('admin/_partials/js.php') ?>
  
</body>
</html>