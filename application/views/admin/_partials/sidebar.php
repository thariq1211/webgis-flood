<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/overview') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown 
      <?php 
        $segment = $this->uri->segment(2);
        if ($segment == 'atribut' OR $segment == 'cluster') {
          echo "active";
        } else {
          echo "";
        }
        
      ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manajemen Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
          <a class="dropdown-item" href="<?php echo base_url('admin/atribut') ?>">Data Atribut</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/centroid') ?>">Data Clustering</a>
          </div>
      </li>
      <li class="nav-item dropdown 
      <?php 
        $segment = $this->uri->segment(2);
        $segment2 = $this->uri->segment(3);
        if ($segment == 'clustering' OR $segment == 'kmeans') {
          echo "active";
        } if($segment2 == 'iterasi_kmeans_hasil'){
          echo "active";
        } else {
          echo "";
        }
        
      ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Analisis Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('admin/clustering') ?>">
          <span>Generate Centroid</span></a>
          <a class="dropdown-item" href="<?php echo base_url('admin/kmeans') ?>">Generate K-Means</a>
          </div>
      </li>
      <li class="nav-item <?php echo $this->uri->segment(2) == 'hasil_clustering' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/hasil_clustering')?>">
          <i class="fas fa-fw fa-water"></i>
          <span>Hasil Analisis <i>Clustering</i></span></a>
      </li>
    </ul>