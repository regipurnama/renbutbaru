<!DOCTYPE html>
<html>
<head>
	<title>Export Data Belanja RKBU RSJ</title>
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
	header("Content-Disposition: attachment; filename=Usulan Belanja Semua $profile.xls");
	?>

	<center>
		<h3>Rencana Kebutuhan Barang Unit <br/> 
		Rumah Sakit Jiwa Provinsi Jawa Barat <br/>
        Nama Unit : <?= $profile; ?> </h3>
	</center>

	<table border="1">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Unit Kerja</th>
			<th rowspan="2">Jenis Belanja</th>
			<th colspan="2">Program</th>
			<th colspan="2">Kegiatan</th>
			<th colspan="2">Subkegiatan</th>
			<th colspan="2">Uraian</th>
			<th rowspan="2">Nama Barang</th>
			<th rowspan="2">Spesifikasi</th>
			<th rowspan="2">Kuantitas</th>
			<th rowspan="2">Satuan</th>
			<th rowspan="2">Sumber Dana</th>
			<th rowspan="2">Harga Satuan</th>
			<th rowspan="2">Total Harga Usulan</th>
			<th rowspan="2">Prioritas</th>
			<th rowspan="2">Catatan</th>
		</tr>
		<tr>
			<th>Kodering</th>	
			<th>Nomenklatur</th>	
			<th>Kodering</th>	
			<th>Nomenklatur</th>	
			<th>Kodering </th>	
			<th>Nomenklatur</th>	
			<th>Kodering</th>	
			<th>Nomenklatur</th>	
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
		 <td><?php echo $row->unit_kerja; ?></td>
		 <td><?php echo $row->jenis_belanja; ?></td>
		 <td><?php echo $row->kodering_program; ?></td>
		 <td><?php echo $row->nama_program; ?></td>
		 <td><?php echo $row->kodering_kegiatan; ?></td>
		 <td><?php echo $row->nama_kegiatan; ?></td>
		 <td><?php echo $row->kodering_subkegiatan; ?></td>
		 <td><?php echo $row->nama_subkegiatan; ?></td>
		 <td><?php echo $row->kodering_uraian; ?></td>
		 <td><?php echo $row->nama_uraian; ?></td>
		 <td><?php echo $row->nama_barang; ?></td>
		 <td><?php echo $row->spesifikasi; ?></td>
		 <td><?php echo $row->kuantitas; ?></td>
		 <td><?php echo $row->satuan; ?></td>
		 <td><?php echo $row->sumber_dana; ?></td>
		 <td><?php echo $row->harga_satuan; ?></td>
		 <td><?php echo $row->total_harga; ?></td>
		 <td><?php echo $row->prioritas; ?></td>
		 <td><?php echo $row->catatan; ?></td>
		
		
		</tr>
		<?php 
		$grandtotal = $grandtotal + $row->total_harga;
		}
		?>
		<tr>
		<th colspan="17"><b>GRAND TOTAL</b></th>
		<th> 
			<?php echo $grandtotal; ?>
		</th>
        <th colspan="2"></th>
		</tr>
		<tr>
			<?php ini_set('date.timezone', 'Asia/Jakarta');?>
			<td colspan="20">Printed By RKBU RSJ : <?php echo date('Y-m-d H:i');?></td>
		</tr>
	</table>
</body>
</html>