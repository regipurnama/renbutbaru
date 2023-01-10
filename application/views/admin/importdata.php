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
            <div class="col-md-12">
                <h2>Memasukan Data Import CSV</h2>
                <form action="<?php echo base_url('Admin/Uploadcsv'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload"/>
                    <input type="submit" class="btn btn-primary" value="IMPORT">
                </form>
                
            </div>

            <br/>             
            <table class="table table-striped" id="format">
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
                <tbody id="show_data">
                     
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
    
</body>
</html>
