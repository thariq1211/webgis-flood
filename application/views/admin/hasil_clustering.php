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
          </div>
       <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tabel Data Hasil Clustering
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jarak C1</th>
                    <th>Jarak C2</th>
                    <th>Jarak C3</th>
                    <th>Jarak C4</th>
                    <th>Jarak C5</th>
                    <th>Kelompok</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jarak C1</th>
                    <th>Jarak C2</th>
                    <th>Jarak C3</th>
                    <th>Jarak C4</th>
                    <th>Jarak C5</th>
                    <th>Kelompok</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($hasil_cluster->result() as $key): ?>
                    <tr>
                      <td><?php echo $key->kecamatan; ?></td>
                      <td><?php echo $key->d1; ?></td>
                      <td><?php echo $key->d2; ?></td>
                      <td><?php echo $key->d3; ?></td>
                      <td><?php echo $key->d4; ?></td>
                      <td><?php echo $key->d5; ?></td>
                      <td><?php 
                        $cluster = $key->hasil_cluster;
                        if ($cluster=="C1") {
                          // echo "Banjir Tinggi";
                          echo "C1";
                        } else if($cluster=="C2"){
                          // echo "Banjir Sedang";
                          echo "C2";
                        }else if($cluster=="C3"){
                          // echo "Banjir Rendah";
                          echo "C3";
                        }else if($cluster=="C4"){
                          // echo "Banjir Aman";
                          echo "C4";
                        }else if($cluster=="C5"){
                          // echo "Non Banjir";
                          echo "C5";
                        }
                        ?></td>
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