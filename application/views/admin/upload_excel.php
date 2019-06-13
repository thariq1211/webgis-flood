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

        <!-- isinya -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-list"></i>
            Upload Data via Excel</div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <!-- <h1>Lawyers <small>Overview</small></h1> -->
                </div>
              </div><!-- /.row -->
              <?php
              $output = '';
              $output .= form_open_multipart('admin/admin/save');
              $output .= '<div class="row">';
              $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
              $output .= form_label('Import Data Atribut', 'image');?>
              <a class="btn btn-outline-success" href="<?php echo base_url("excel/upload.xlsx"); ?>">Download Format</a>
              <?php
              $data = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'class' => 'form-control filestyle',
                'value' => '',
                'data-icon' => 'false'
                );
              $output .= form_upload($data);
              $output .= '</div> <span style="color:red;">*Silahkan pilih file Excel dengan format( .xls / .xlxs) sebagai inputan</span></div>';
              $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
              $data = array(
                'name' => 'importfile',
                'id' => 'importfile-id',
                'class' => 'btn btn-primary',
                'value' => 'Import',
                );
              $output .= form_submit($data, 'Import Data');
              $output .= '</div>
            </div></div>';
            $output .= form_close();
            echo $output;
            ?>
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