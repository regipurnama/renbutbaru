<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sharing Yuk!</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/plugin/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/plugin/css/style-kike.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/plugin/css/font-awesome.css');?>">
	<style type="text/css">
		.alert {
			position: absolute;
			margin-top: -19em;
		}
	</style>
</head>
<body class="bg-blue">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<?php
				$data = $this->session->flashdata('data'); 
				if($data['status'] == true){
					echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$data['message']."</div>";
				}else{
					if($data['message'] != ''){
						echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$data['message']."</div>";
					}
				}
			?>
			<div class="user_card w-reg">
				<div class="d-flex justify-content-center">
					<div class="head-registration">
						DAFTAR
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form  method="POST"  enctype="multipart/form-data" action="<?php echo base_url('C_home/savedaftar'); ?>">
						<div class="col-l12">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-smile-o"></i></span>
								</div>
								<input type="text" name="name" placeholder="nama lengkap" class="form-control input_user" required>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa  fa-male"></i></span>
								</div>
								<label class="radio">
									<input type="radio" name="gender" value="L"/>
									<span class="label"></span>Laki-laki
								</label>
								
								<label class="radio">
									<input type="radio" name="gender" value="P"/>
									<span class="label"></span>Perempuan
								</label>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-envelope"></i></span>
								</div>
								<input type="email" name="email" placeholder="email" class="form-control input_user" required>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-gittip"></i></span>
								</div>
								<input type="text" name="bio" placeholder="bio" class="form-control input_user">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-renren"></i></span>
								</div>
								<input type="text" name="hobby" placeholder="hobby" class="form-control input_user">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-user"></i></span>

								</div>
								<input type="text" name="username" placeholder="username" class="form-control input_user" required>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-key"></i></span>
								</div>
								<input type="password" name="password" placeholder="password" class="form-control input_pass" required>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-camera"></i></span>
								</div>
								<input type="file" name="picture" id="picture" class="form-control input_user">
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<button type="submit" id="btn-daftar" name="btn-daftar" class="btn daftar_btn">Sign Up</button>
						</div>
					</form>
				</div>
				<div class="mt-2">
					<div class="d-flex justify-content-center links">
						<a href="<?php echo base_url('C_home/index'); ?>" class="ml-2 white">Kembali ke Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>