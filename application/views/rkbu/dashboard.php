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

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-6 col-sm-6">
			<div class="card text-white bg-danger o-hidden h-60">
				<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-wallet"></i>
				</div>
			
				<div class="mr-5"><p>Total Usulan Anggaran </p><p style="font-size:18px;"><b>Rp. <?= number_format($totalanggaran[0]->total,0,',','.'); ?></b></span></p></div>
				</div>
				<!-- <a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a> -->
			</div>
			</div> 
			<?php if($role =='SuperAdmin'){ ?>
				<div class="col-xl-6 col-sm-6">
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
				<div class="col-xl-6 col-sm-6">
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
			
			<div class="col-xl-4 col-sm-6">
			<div class="card text-white bg-info o-hidden h-60">
				<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-wallet"></i>
				</div>
			
				<div class="mr-5"><p>Belanja Pegawai </p><p style="font-size:12px;"><b>Rp. <?= number_format($belanjapegawai[0]->total,0,',','.'); ?></b></p></div>
				</div>
				<!-- <a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a> -->
			</div>
			</div> 
			<div class="col-xl-4 col-sm-6">
			<div class="card text-white bg-info o-hidden h-60">
				<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-wallet"></i>
				</div>
			
				<div class="mr-5"><p>Belanja Barang Jasa </p><p style="font-size:12px;"><b>Rp. <?= number_format($belanjabarjas[0]->total,0,',','.'); ?></b></p></div>
				</div>
				<!-- <a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a> -->
			</div>
			</div> 
			<div class="col-xl-4 col-sm-6">
			<div class="card text-white bg-info o-hidden h-60">
				<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-wallet"></i>
				</div>
			
				<div class="mr-5"><p>Belanja Modal </p><p style="font-size:12px;"><b>Rp. <?= number_format($belanjamodal[0]->total,0,',','.'); ?></b></p></div>
				</div>
				<!-- <a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a> -->
			</div>
			</div> 
			
			 
		</div>

		<!-- Area Chart Example
		<div class="col-xl-4">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Visitor Stats</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
		
		<div class="col-xl-4">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Visitor Stats</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
		<div class="col-xl-3">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Visitor Stats</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5">123 New Orders!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
		</div> -->
		</div>
		<br/>
		<div class="container">
		<span class="badge-info">SELAMAT DATANG DI RENBUT BARU</span>
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
