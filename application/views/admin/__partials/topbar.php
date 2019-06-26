<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon --><b>
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="<?php echo base_url('assets/images/logo-icon.png'); ?>" alt="homepage" class="dark-logo" />
            <!-- Light Logo icon -->
            <img src="<?php echo base_url('assets/images/logo-light-icon.png'); ?>" alt="homepage" class="light-logo" />
          </b>
          <!--End Logo icon -->
          <!-- Logo text --><span>
          <!-- dark Logo text -->
          <img src="<?php echo base_url('assets/images/logo-text.png'); ?>" alt="homepage" class="dark-logo" />
          <!-- Light Logo text -->    
          <img src="<?php echo base_url('assets/images/logo-light-text.png'); ?>" class="light-logo" alt="homepage" /></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto mt-md-0"></ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
              <form class="app-search">
                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
              </li>
              <!-- ============================================================== -->
              <!-- Profile -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/images/users/1.jpg'); ?>" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                  <ul class="dropdown-user">
                    <li>
                      <div class="dw-user-box">
                        <div class="u-img"><img src="<?php echo base_url('assets/images/users/1.jpg'); ?>" alt="user"></div>
                        <div class="u-text">
                        <?php 
                        $akun = $this->db->query('select * from akun')->result();
                        foreach ($akun as $key) {
                        
                         ?>
                          <h4><?php echo $key->nama; ?></h4>
                          <p class="text-muted"><?php echo $key->email; ?></p><?php } ?>
                          </div>
                        </div>
                      </li>
                      <li role="separator" class="divider"></li>
                      <?php if ($this->session->userdata('cek_login') != '0') { ?>
                      <li><a href="<?php echo base_url('admin/login/logout'); ?>"><i class="ti ti-power-off"></i> Logout</a></li><?php }else{ ?>
                      <li><a href="<?php echo base_url('admin/login'); ?>"><i class="ti ti-control-play"></i> Login</a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>