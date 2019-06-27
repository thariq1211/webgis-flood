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
                <?php
                	if ($this->session->userdata('cek_login') != '0') { 
                	$akun = $this->db->query('select * from akun')->result();
                	foreach ($akun as $key) {
                 ?>
                  <h5><?php echo $key->nama; ?></h5>
                	<?php }} else{ ?>
                	<h5>Guest</h5>
                	<?php } ?>
                </div>
              </div>
              <!-- End User profile text-->
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                <ul id="sidebarnav">
                  <li class="nav-devider"></li>
                  <?php if ($this->session->userdata('cek_login') != '0') { ?>
                  <li class="nav-small-cap">ADMINISTRATOR</li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('admin/overview'); ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Manajemen Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="<?php echo base_url('admin/atribut'); ?>">CRUD Data Atribut</a></li>
                      <li><a href="<?php echo base_url('admin/centroid'); ?>">CRUD Data Centroid</a></li>
                    </ul>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti ti-light-bulb"></i><span class="hide-menu">Analisis Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="<?php echo base_url('admin/clustering') ?>">Rata2 Data</a></li>
                      <li><a href="<?php echo base_url('admin/kmeans') ?>">Penghitungan K-Means</a></li>
                    </ul>
                  </li>
                  <li> <a class="waves-effect waves-dark" href="<?php echo base_url('admin/hasil_clustering')?>" aria-expanded="false"><i class="ti  ti-archive"></i><span class="hide-menu">Hasil Analisis</span></a>
                  </li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('welcome/pemetaan_banjir'); ?>" aria-expanded="false"><i class="mdi mdi-google-maps"></i><span class="hide-menu">Pemetaan Banjir</span></a>
                  </li>
                  <?php } else{ ?>
                  <li class="nav-small-cap">GUEST</li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('welcome/index'); ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Data Atribut Wilayah</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="<?php echo base_url('admin/atribut'); ?>">Data Jenis Tanah</a></li>
                      <li><a href="<?php echo base_url('admin/centroid'); ?>">Data Kemiringan Tanah</a></li>
                      <li><a href="<?php echo base_url('admin/centroid'); ?>">Data Penggunaan Lahan</a></li>
                      <li><a href="<?php echo base_url('admin/centroid'); ?>">Data Buffer Sungai</a></li>
                      <li><a href="<?php echo base_url('admin/centroid'); ?>">Data Curah Hujan</a></li>
                    </ul>
                  </li> -->
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('welcome/data_atribut'); ?>" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Data Transformasi Atribut</span></a>
                  </li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('welcome/hasilCluster'); ?>" aria-expanded="false"><i class="mdi mdi-format-list-bulleted-type"></i><span class="hide-menu">Hasil Cluster Wilayah</span></a>
                  </li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('welcome/pemetaan_banjir'); ?>" aria-expanded="false"><i class="mdi mdi-google-maps"></i><span class="hide-menu">Pemetaan Banjir</span></a>
                  </li>
                  <?php } ?>
                </ul>
              </nav>
              <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
          </aside>