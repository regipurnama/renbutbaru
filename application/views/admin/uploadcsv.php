<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

 	<!-- /.content-wrapper -->
  <div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
        <?php 
        //print_r($csvData);
        $js = json_encode($csvData);

        ?>
            <h2>Preview Data - Upload CSV</h2>
            <form action="<?php echo base_url('Admin/simpandatacsv');?>" method="POST" >
                <textarea name="arr_js">
                    <?php echo $js;?>
                </textarea> 
                <input type="submit" value="Simpan Data" class="btn btn-primary">
            </form>
            <hr>

            <table class="table table-striped" id="show_data_csv" width="100%">
                <thead>
                    <tr>
                        <th>kode_urusan</th>
                        <th>Urusan</th>
                        <th>kode_uptd</th>
                        <th>uptd</th>
                        <th>kode_program</th>
                        <th>program</th>
                        <th>kode_kegiatan</th>
                        <th>kegiatan</th>
                        <th>kode_subkegiatan</th>
                        <th>subkegiatan</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach($csvData as $tampil){
                   ?>
               
                    <tr>
                        <th><?= $tampil['kode_urusan['.$i.']']; ?></th>
                        <th><?= $tampil['nama_urusan['.$i.']']; ?></th>
                        <th><?= $tampil['kode_uptd['.$i.']']; ?></th>
                        <th><?= $tampil['nama_uptd['.$i.']']; ?></th>
                        <th><?= $tampil['kode_program['.$i.']']; ?></th>
                        <th><?= $tampil['nama_program['.$i.']']; ?></th>
                        <th><?= $tampil['kode_kegiatan['.$i.']']; ?></th>
                        <th><?= $tampil['nama_kegiatan['.$i.']']; ?></th>
                        <th><?= $tampil['kode_subkegiatan['.$i.']']; ?></th>
                        <th><?= $tampil['nama_subkegiatan['.$i.']']; ?></th>
                        
                    </tr>
                    
                <?php $i++;
                    } ?>
                     
                </tbody>
            </table>
        </div>
    </div>
         
</div>

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_js/jsadmin.php") ?>
    
</body>
</html>
