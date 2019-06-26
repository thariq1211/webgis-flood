<div class="row page-titles fixed-top">
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