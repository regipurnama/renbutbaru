<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RKBU RS JIWA PROV JABAR</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/style-kike.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/font-awesome.css');?>">
	<style type="text/css">
		.alert {
			position: absolute;
			margin-top: -20em;
		}
		.user_card {
			position: absolute;
			margin-top: 10em;
		}
	</style>
</head>

<body class="bg-blue">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card" style="height:450px; !important">
				<?php
					$data = $this->session->flashdata('data'); 

					if($data['status'] == true){
						echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$data['message']."</div>";
					}else{
						echo "&nbsp";
					}
				?>
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container" >
						<img src="<?php echo base_url('assets/img/logo.png');?>" width="20%" height="auto"></img>
						<h2>RKBU RSJ</h2>
						<small>Rencana Kebutuhan Barang Unit - Rumah Sakit Jiwa</small>	
					</div>
				</div>
				<div class="d-flex justify-content-center mb-3 form_container"></div>
				<div class="d-flex justify-content-center">
					<form action="<?php echo base_url('C_Home/checklogin');?>" method="POST">
						<div class="col-l12">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-book"></i></span>
								</div>
								<!-- <input type="text" name="tahun" placeholder="Tahun Usulan" class="form-control input_user"> -->
								<select name="tahun" class="form-control">
									<option>- Pilih Tahun Usulan -</option>
									<option selected>2021</option>
								</select>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" name="username" placeholder="Username" class="form-control input_user">
							</div>
							<div class="input-group mb-2">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-key"></i></span>
								</div>
								<input type="password" name="password" placeholder="Password" class="form-control input_pass">
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<button type="submit" name="button" class="btn login_btn">Login</button>
						</div>
					</form>
				</div>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<!-- Belum Memiliki akun? Daftar <a href="<?php echo base_url('C_Home/registration');?>" class="ml-2 white">Disini</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php $this->load->view("admin/_partials/js.php") ?>
   