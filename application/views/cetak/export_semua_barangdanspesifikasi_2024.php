<!DOCTYPE html>
<html>
<head>
	<title>Export Data Belanja Renbut Baru RSJ</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Usulan Berdasarkan Barang - Admin.xls");
	?>

	<center>
		<h3>Rencana Kebutuhan Barang Unit <br/> 
		Rumah Sakit Jiwa Provinsi Jawa Barat<br/>
        Berdasarkan Barang Dan Spesifikasi
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Spesifikasi</th>
			<th>Kuantitas</th>
			<th>Satuan</th>
			<th>Sumber Dana</th>
			<th>Harga Satuan</th>
			<th>Total Harga Usulan</th>
			<th>Prioritas</th>
			<th>Catatan</th>
			<th>Unit Kerja</th>
		</tr>
		
		<?php 
		$no = 1;
		//var_dump($belanja[0]);
		// var_dump($belanja);
		$grandtotal = 0;
		foreach($belanja as $row){
			// echo var_dump($d->kodering_program);
		?>
		<tr>
		 <td><?php echo $no++; ?></td>
		 <td><?php echo $row->nama_barang; ?></td>
		 <td><?php echo $row->spesifikasi; ?></td>
		 <td><?php echo $row->kuantitas; ?></td>
		 <td><?php echo $row->satuan; ?></td>
		 <td><?php echo $row->sumber_dana; ?></td>
		 <td><?php echo $row->harga_satuan; ?></td>
		 <td><?php echo $row->total_harga; ?></td>
		 <td><?php echo $row->prioritas; ?></td>
		 <td><?php echo $row->catatan; ?></td>
		 <td><?php echo $row->unit_kerja; ?></td>
		
		
		</tr>
		<?php 
		$grandtotal = $grandtotal + $row->total_harga;
		}
		?>
		<tr>
		<th colspan="7"><b>GRAND TOTAL</b></th>
		<th> 
			<?php echo $grandtotal; ?>
		</th>
		<th colspan="3"></th>
		</tr>
		<tr>
			<?php ini_set('date.timezone', 'Asia/Jakarta');?>
			<td colspan="11">Printed By RKBU RSJ : <?php echo date('Y-m-d H:i');?></td>
		</tr>
		
	</table>
</body>
</html>