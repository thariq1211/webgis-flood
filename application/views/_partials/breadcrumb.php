<div class="row">
	<div class="col">
		<p class="text-white mt-5 mb-5">Welcome back, <b>
			<?php 
			if ($this->session->userdata('cek_login') == '1') { ?>
			<a href="<?php echo base_url('admin/overview') ?>">Admin</a>
			<?php } else { ?>
			Guest
			<?php }  ?>
		</b></p>
	</div>
</div>