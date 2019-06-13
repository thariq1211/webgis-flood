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
            <i class="fas fa-pencil-ruler"></i>
             Silahkan Ubah Data</div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/admin/editAtribut') ?>" method="post">
              <input type="hidden" name="id" value="<?php echo $atribut->id; ?>">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="inputKecamatan" name="kecamatan" value="<?php echo $atribut->kecamatan; ?>" class="form-control" placeholder="Kecamatan" required="required">
                    <label for="inputKecamatan">Masukkan Nama Kecamatan</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputLuasWilayah" name="luas_wilayah" value="<?php echo $atribut->luas_wilayah; ?>" class="form-control" placeholder="Luas Wilayah" required="required" autofocus="autofocus">
                        <label for="inputLuasWilayah">Luas Wilayah</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputJenisTanah" name="jenis_tanah" value="<?php echo $atribut->jenis_tanah; ?>" class="form-control" placeholder="Jenis Tanah" required="required">
                        <label for="inputJenisTanah">Jenis Tanah</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputKemiringan" name="kemiringan" value="<?php echo $atribut->kemiringan; ?>" class="form-control" placeholder="Kemiringan" required="required">
                        <label for="inputKemiringan">Kemiringan</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="penggunaan_lahan" name="penggunaan_lahan" value="<?php echo $atribut->penggunaan_lahan; ?>" class="form-control" placeholder="Penggunaan Lahan" required="required">
                        <label for="penggunaan_lahan">Penggunaan Lahan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputOrdeSungai" name="orde_sungai" value="<?php echo $atribut->orde_sungai; ?>" class="form-control" placeholder="Orde Sungai" required="required">
                        <label for="inputOrdeSungai">Orde Sungai</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="number" id="inputCH" name="curah_hujan" value="<?php echo $atribut->curah_hujan; ?>" class="form-control" placeholder="Curah Hujan" required="required">
                        <label for="inputCH">Curah Hujan</label>
                      </div>
                    </div>
                  </div>
                  </div><a class="btn btn-outline-secondary" href="javascript:history.back()">Cancel</a>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </div>
            </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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