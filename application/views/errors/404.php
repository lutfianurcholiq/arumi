<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$data['judul'] = ucwords('cant access this page');
	$this->load->view('template/header', $data);
?>
<body>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<img src="<?php echo base_url('./assets/img/404-Error-Page.png') ?>" alt="">
				<?php if ($this->session->userdata('username')) : ?>
					<p><?php echo "User ".$this->session->userdata('nama') ?> tidak bisa mengakses halaman ini.</p>
					<a href="<?= site_url('beranda'); ?>">Beranda</a>
				<?php else : ?>	
					<p>Anda harus login dulu.</p>
					<a href="<?= site_url('welcome'); ?>">Login</a>
				<?php endif; ?>
			</div>
			<div class="text-center login-footer">
				<p>Arumi © <?php echo date('Y'); ?>. Template by <a href="https://www.instagram.com/haibilll/">Colorlib</a></p>
			</div>
		</div>   
    </div>
</body>

<?php $this->load->view('template/footer'); ?>
