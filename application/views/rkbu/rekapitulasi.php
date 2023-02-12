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
			<!-- <div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5">26 New Messages!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">11 New Tasks!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
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
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-life-ring"></i>
				</div>
				<div class="mr-5">13 New Tickets!</div>
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
				<h5>Cetak Laporan Rekapitulasi Usulan Renbut - <span class="badge badge-info"><?php echo $profile->unit_kerja;?></span></h5>
			<hr>
			<table class="table table-striped" id="BelanjaperunitTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Laporan</th>
					<th>Aksi</th>
				</tr>				
			</thead>
			<tbody>   
				<tr>
					<td>1</td>
					<td>Cetak Semua Usulan Belanja </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaUser');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaUser');?> " class="btn btn-success" title="Unduh Data (.xls)" ><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>2</td>
					<td>Cetak Usulan Belanja Barang Jasa</td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaBarjasUser');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaBarjasUser');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>3</td>
					<td>Cetak Usulan Belanja Pegawai</td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaPegawaiUser');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaPegawaiUser');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>4</td>
					<td>Cetak Usulan Belanja Modal </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaModalUser');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaModalUser');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>5</td>
					<td>Cetak Usulan Berdasarkan Barang dan Spesifikasi</td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewsemuabarangdanspesifikasiUser');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetaksemuabarangdanspesifikasiUser');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>        
				<?php if($role == 'Admin'){ ?>
				<tr>
					<td>6</td>
					<td><b><span class="badge badge-warning">Role Khusus Admin</span></b> Cetak Semua Belanja</td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemua');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemua');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>7</td>
					<td><b><span class="badge badge-warning">Role Khusus Admin</span></b> Cetak Belanja Barang Jasa </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaBarjas');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaBarjas');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>8</td>
					<td><b><span class="badge badge-warning">Role Khusus Admin</span></b> Cetak Belanja Pegawai </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaPegawai');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaPegawai');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>9</td>
					<td><b><span class="badge badge-warning">Role Khusus Admin</span></b> Cetak Belanja Modal </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaModal');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaModal');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>10</td>
					<td><b><span class="badge badge-warning">Role Khusus Admin</span></b> Cetak Berdasarkan Barang dan Spesifikasi </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/Previewsemuabarangdanspesifikasi');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/Cetaksemuabarangdanspesifikasi');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>        
				<?php } ?>  
				<?php if($role == 'bidang'){ ?>
				<tr>
					<td>6</td>
					<td><b><span class="badge badge-warning">Sebagai Bidang/Bagian</span></b> Cetak Semua Belanja</td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemua');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemua');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>7</td>
					<td><b><span class="badge badge-warning">Sebagai Bidang/Bagian</span></b> Cetak Belanja Barang Jasa </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaBarjas');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaBarjas');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>8</td>
					<td><b><span class="badge badge-warning">Sebagai Bidang/Bagian</span></b> Cetak Belanja Pegawai </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaPegawai');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaPegawai');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>9</td>
					<td><b><span class="badge badge-warning">Sebagai Bidang/Bagian</span></b> Cetak Belanja Modal </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/PreviewSemuaModal');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/CetakSemuaModal');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>                   
				<tr>
					<td>10</td>
					<td><b><span class="badge badge-warning">Sebagai Bidang/Bagian</span></b> Cetak Berdasarkan Barang dan Spesifikasi </td>
					<td>
						<!-- <a href="<?php echo base_url('RKBU/Previewsemuabarangdanspesifikasi');?> " class="btn btn-primary" title="Lihat Data" target="_blank"><i class="fas fa-eye"></i></a> -->
						<a href="<?php echo base_url('RKBU/Cetaksemuabarangdanspesifikasi');?> " class="btn btn-success" title="Unduh Data (.xls)"><i class="fas fa-download"></i></a>
					</td>
				</tr>        
				<?php } ?>                
				                   
				                   
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
    
</body>
</html>
