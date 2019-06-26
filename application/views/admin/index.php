<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/__partials/head'); ?>
</head>

<body class="fix-header fix-sidebar card-no-border">
  
  <?php $this->load->view('admin/__partials/topbar'); ?>
  
  <?php $this->load->view('admin/__partials/sidebar'); ?>
  
  <div class="page-wrapper">
    
    <?php $this->load->view('admin/__partials/breadcrumb'); ?>
    
    <div class="container-fluid">
      
      <!-- Row -->
      <div class="card-group">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                <h3 class=""><?php foreach ($kecamatan->result() as $key) {
                  echo $key->kec;
                } ?> Wilayah</h3>
                <h6 class="card-subtitle">Jumlah Data Kecamatan</h6></div>
                <div class="col-12">
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                  <h3 class=""><?php foreach ($centroid->result() as $k) {
                    echo $k->cen;
                  } ?> buah</h3>
                  <h6 class="card-subtitle">Jumlah Pusat Centroid</h6></div>
                  <div class="col-12">
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                    <h3 class=""><?php foreach ($iterasi->result() as $i) {
                      echo $i->it;
                    } ?> Iterasi</h3>
                    <h6 class="card-subtitle">Jumlah Pengulangan Iterasi</h6></div>
                    <div class="col-12">
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
              <!-- Column -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                      <h3 class=""><?php foreach ($hc->result() as $h) {
                        echo $h->hc;
                      } ?> Kecamatan</h3>
                      <h6 class="card-subtitle">Jumlah Cluster Terbanyak</h6></div>
                      <div class="col-12">
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            <?php $this->load->view('admin/__partials/footer'); ?>
            
          </div>
          
        </div>
        
        <?php $this->load->view('admin/__partials/js'); ?>
      </body>

      </html>