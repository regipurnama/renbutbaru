<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">
			<!-- 
				karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<div class="spinner-border text-info" role="status">
			<span class="sr-only">Loading...</span>
		</div>
		<!-- Icon Cards-->
		<h4><span class="badge badge-info"> <?php echo "Dashboard - Tahun Usulan ". $tahun; ?></span> </h4>
		 
		<?php if($tahun == '2024'){?>
			<div class="alert alert-info alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Info!</strong>
			<br/>
					<marquee>"PASTIKAN USULAN YANG DIINPUTKAN MASUK KE CETAK DAN TERAKUMULASI DI DASHBOARD :D"</marquee>
					- [Khusus Akun Bidang] Cetak Semua Usulan sudah ditambah fitur status usulan
			</div>
		<?php } ?>
			
		<br/>
		<div class="row">
			
			<div class="col-xl-3 col-md-6 col-sm-12">
			<i class="fa-solid fa-rupiah-sign" style="font-size:48px;color:#1E5631"></i>
				<h5><b>Rp. <?= number_format($totalanggaran[0]->total,0,',','.'); ?></b></h5>
				<div class="text-muted small"><p>Total Usulan Anggaran </p></div>	
			</div>
			<div class="col-xl-3 col-md-6 col-sm-12">
				<i class="fa-solid fa-user" style="font-size:48px;color:#12af81"></i>
				<h5><b>Rp. <?= number_format($belanjapegawai[0]->total,0,',','.'); ?></b></h5>
				<div class="text-muted small"><p>Total Usulan Belanja Pegawai </p></div>
			</div>
			<div class="col-xl-3 col-md-6 col-sm-12">
				<i class="fa-solid fa-building" style="font-size:48px;color:#44456d"></i>
				<h5><b>Rp. <?= number_format($belanjabarjas[0]->total,0,',','.'); ?></b></h5>
				<div class="text-muted small"><p>Total Usulan Belanja Barang Jasa </p></div>
			</div>
			<div class="col-xl-3 col-md-6 col-sm-12">
			<i class="fa-solid fa-box" style="font-size:48px;color:#c0884c"></i>
				<h5><b>Rp. <?= number_format($belanjamodal[0]->total,0,',','.'); ?></b></h5>
				<div class="text-muted small"><p>Total Usulan Belanja Modal </p></div>
			</div>
		</div>
		<?php if($tahun<'2024'){?>
			<?php if($role =='SuperAdmin'){ ?>
				<div class="col-xl-12 col-sm-12">
				<div class="card text-white bg-success o-hidden h-60">
					<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-percent"></i>
					</div>
				
					<div class="mr-5"><p>Persentase (Rp. 188.745.535.841) </p><p style="font-size:18px;"><b><?= number_format($totalanggaran[0]->persentase,2,',','.'); ?> %</b></p></div>
					</div>
					<!-- <a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a> -->
				</div>
				</div>
			<?php } else{ ?>
				<div class="col-xl-12 col-sm-12">
				<!-- <div class="card text-white bg-success o-hidden h-60">
					<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-percent"></i>
					</div>
				
					<div class="mr-5"><p>Persentase (Rp. 188.745.535.841) </p><p style="font-size:18px;"><b><?= number_format($totalanggaran[0]->persentase,2,',','.'); ?> %</b></p></div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="#">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
					</a> -->
				<!-- </div> --> 
				</div>
			<?php } ?>
			
			<?php } ?>
			
			

		<div >
			<hr>
				<h5>Total Usulan Anggaran Per Unit</h5>
			<hr>
			<table class="table table-striped" id="BelanjaperunitTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Unit Kerja</th>
					<th>Total Usulan Anggaran</th>
				</tr>
			</thead>
			<tbody>                      
			</tbody>
				<!-- <tfoot>
					<tr>
						<th colspan="2" style="text-align:right">Total:</th>
						<th></th>
					</tr>
			</tfoot> -->
			</table>
		</div>
		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_js/jsdashboard.php") ?>
    
</body>
</html>
