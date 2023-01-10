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
               
            <table class="table table-striped" id="show_data_csv">
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
                <?php foreach($contoh as $value){
                    echo $value;
                }?>
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
