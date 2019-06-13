<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('_partials/head'); ?>
</head>
<body id="reportsPage">
<div class="" id="home">
    <?php $this->load->view('_partials/navbar'); ?><br><br>
    <div class="container">
        <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Selamat Datang, Silahkan Login untuk Melanjutkan</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="<?php echo base_url('admin/login/login_proses') ?>" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username / Email</label>
                    <input
                      name="namapengguna"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required placeholder="Masukkan Username atau Email Anda"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="sandi"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required placeholder="Masukkan Password Anda"
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                </form>
              </div>
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