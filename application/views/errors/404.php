<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

	::selection { background-color: skyblue; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
</head>
<body style="text-align: center; background-color: oldlace;"><br><br><br><br>
	<img src="<?= base_url('/assets/img/404.png') ; ?>" alt="User Image" width="40%"><br>
	<?php if ($this->session->userdata('username')) : ?>
		<p style="font: 35px normal Arial, sans-serif; color: #4F5155;">Kamu gabisa mengakses halaman ini.</p>
		<a href="<?= site_url('beranda'); ?>" class="btn btn-outline-danger"><i class='fa fa-fw fa-windows'></i>Beranda</a>
	<?php else : ?>	
		<p style="font: 35px normal Arial, sans-serif; color: #4F5155;">Kamu harus login dulu.</p>
		<a href="<?= site_url('welcome'); ?>" class="btn btn-outline-danger"><i class='fa fa-fw fa-home'></i>Login</a>
	<?php endif; ?>
</body>
</html>