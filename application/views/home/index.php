<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RENBUT BARU RS JIWA PROV JABAR</title>
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

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=<?php base_url('assets/login/images/icons/favicon.ico');?>/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/animate/animate.css');?>>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/select2/select2.min.css');?>>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/css/util.css');?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/css/main.css');?>>
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">
</head>
<?php 
$data = $this->session->flashdata('data'); 
// var_dump($data['status']);
// $data = [];
	
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url('C_Home/checklogin');?>" method="POST"> 
				
					<div class="w-full text-center">
					<?php
						
						if($data['status'] == true){
							// echo "<div class='alert alert-danger text-center'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$data['message']."</div>";
							echo "<span class='alert-danger text-center'>".$data['message']."<span>";
					
						}else if($data['status'] == NULL || $data['message'] == NULL ){
							$data['message']='&nbsp';
							echo $data['message'];
						}else{
							echo '&nbsp';
						}
					?>
						
						</div>
					<span class="login100-form-title p-b-34">
						LOGIN RENBUT BARU
					</span>
					<select name="tahun" id="tahun" class="form-control">
						<option>- Pilih Tahun Anggaran -</option>
						<option selected>2024</option>
						<option>2023</option>
						<option>2022</option>
					</select>
				
						<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
							<input id="first-name" class="input100" type="text" name="username" id="username" placeholder="Username">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
							<input class="input100" type="password" name="password" id="password" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Sign in
							</button>
						</div>
					

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Lupa Password
						</span>

						<a href="#" class="txt2">
							Kontak Instalasi TIRS
						</a>
					</div>

					<div class="w-full text-center">
						<!-- <a href="#" class="txt3">
							Sign Up
						</a> -->
						<p class="pull-right">Copyright &copy; 2021</p>
					</div>
					<div class="w-full text-center">
						<p class="pull-right">Made with <i class="fa fa-heart text-danger"></i> in RS Jiwa Provinsi Jawa Barat</p>
					</div>
				</form>

				<div class="login100-more" style="background-image: url(<?php echo base_url('assets/login/images/bg-01.jpg');?>"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
</body>
</html>
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_js/jslogin.php") ?>
   