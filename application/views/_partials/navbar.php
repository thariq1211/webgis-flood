<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="<?php echo base_url();?>">
            <h1 class="tm-site-title mb-0"><?php echo SHORTSITE; ?></h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
                <a class="nav-link <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>" href="<?php echo base_url('welcome'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    Overview
                    <span class="sr-only">(current)</span>
                </a>
            </li><li class="nav-item">
            <a class="nav-link <?php echo $this->uri->segment(2) == 'datajember' ? 'active': '' ?>" href="<?php echo base_url('welcome/datajember') ?>">
                <i class="fas fa-info"></i>
                Data Wilayah Jember
                <span class="sr-only">(current)</span>
            </a>
        </li>
            <!-- <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="far fa-file-alt"></i>
                <span>
                    Reports <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Daily Report</a>
                <a class="dropdown-item" href="#">Weekly Report</a>
                <a class="dropdown-item" href="#">Yearly Report</a>
            </div>
        </li> -->
        <li class="nav-item">
            <a class="nav-link <?php echo $this->uri->segment(2) == 'hasilCluster' ? 'active': '' ?>" href="<?php echo base_url('welcome/hasilCluster') ?>">
                <i class="fas fa-chart-area"></i>
                Hasil Clustering
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo $this->uri->segment(2) == 'petabanjir' ? 'active': '' ?>" href="<?php echo base_url('welcome/petabanjir') ?>">
                <i class="fas fa-water"></i>
                Pemetaan Bencana
            </a>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            <span>
                Settings <i class="fas fa-angle-down"></i>
            </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Billing</a>
            <a class="dropdown-item" href="#">Customize</a>
        </div>
    </li> -->
</ul>
<ul class="navbar-nav">
    <li class="nav-item">
    <?php if ($this->session->userdata('cek_login') != '1') { ?>
        <a class="nav-link d-block" href="<?php echo base_url('admin/login'); ?>">Login</a>
    <?php } ?>
    </li>
</ul>
</div>
</div>

</nav>