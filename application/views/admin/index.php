<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('admin/__partials/head'); ?>
</head>

<body class="fix-header fix-sidebar card-no-border">
  
    <?php $this->load->view('admin/__partials/topbar'); ?>
          <!-- ============================================================== -->
          <!-- End Topbar header -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Left Sidebar - style you can find in sidebar.scss  -->
          <!-- ============================================================== -->
          <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
              <!-- User profile -->
              <div class="user-profile">
                <!-- User profile image -->
                <div class="profile-img">
                  <img src="<?php echo base_url('assets/images/users/1.jpg'); ?>" alt="user" />
                </div>
                <!-- User profile text-->
                <div class="profile-text">
                  <h5>Markarn Doe</h5>
                </div>
              </div>
              <!-- End User profile text-->
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                <ul id="sidebarnav">
                  <li class="nav-devider"></li>
                  <li class="nav-small-cap">PERSONAL</li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('admin/overview'); ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manajemen Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="app-calendar.html">CRUD Data Atribut</a></li>
                      <li><a href="app-chat.html">CRUD Data Centroid</a></li>
                    </ul>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Analisis Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="app-email.html">Rata2 Data</a></li>
                      <li><a href="app-email-detail.html">Penghitungan K-Means</a></li>
                    </ul>
                  </li>
                  <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Hasil Analisis</span></a>
                  </li>
                </ul>
              </nav>
              <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
          </aside>
          <!-- ============================================================== -->
          <!-- End Left Sidebar - style you can find in sidebar.scss  -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Page wrapper  -->
          <!-- ============================================================== -->
          <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
              <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
              </div>
              <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                  <?php foreach ($this->uri->segments as $segment): ?>
                    <?php 
                    $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                    $is_active =  $url == $this->uri->uri_string;
                    ?>
                    <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                      <?php if($is_active): ?>
                        <?php echo ucfirst($segment) ?>
                      <?php else: ?>
                        <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ol>
              </div>
              <div>
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <!-- ============================================================== -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
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
                      <!-- Row -->

                      <!-- ============================================================== -->
                      <!-- End PAge Content -->
                      <!-- ============================================================== -->
                      <!-- ============================================================== -->
                      <!-- Right sidebar -->
                      <!-- ============================================================== -->
                      <!-- .right-sidebar -->
                      <div class="right-sidebar">
                        <div class="slimscrollright">
                          <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                          <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                              <li><b>With Light sidebar</b></li>
                              <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                              <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                              <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                              <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                              <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                              <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                              <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                              <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                              <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                              <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                              <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                              <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                              <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                              <li><b>Chat option</b></li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!-- ============================================================== -->
                      <!-- End Right sidebar -->
                      <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer"> © <?php echo date("Y"); ?> <?php echo SITE_NAME; ?> </footer>
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Page wrapper  -->
                  <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Wrapper -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- All Jquery -->
                <!-- ============================================================== -->
                <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
                <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
                <!--Wave Effects -->
                <script src="<?php echo base_url('assets/js/waves.js'); ?>"></script>
                <!--Menu sidebar -->
                <script src="<?php echo base_url('assets/js/sidebarmenu.js'); ?>"></script>
                <!--stickey kit -->
                <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
                <!--Custom JavaScript -->
                <script src="<?php echo base_url('assets/js/custom.min.js'); ?>"></script>
                <!-- ============================================================== -->
                <!-- This page plugins -->
                <!-- ============================================================== -->
                <!--sparkline JavaScript -->
                <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
                <!--morris JavaScript -->
                <script src="<?php echo base_url('assets/plugins/raphael/raphael-min.js'); ?>"></script>
                <script src="<?php echo base_url('assets/plugins/morrisjs/morris.min.js'); ?>"></script>
                <!-- Chart JS -->
                <script src="<?php echo base_url('assets/js/dashboard1.js'); ?>"></script>
                <!-- ============================================================== -->
                <!-- Style switcher -->
                <!-- ============================================================== -->
                <script src="<?php echo base_url('assets/plugins/styleswitcher/jQuery.style.switcher.js'); ?>"></script>
              </body>

              </html>