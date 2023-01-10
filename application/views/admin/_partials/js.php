<!-- Ubah Passwrod -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/select2/dist/js/select2.min.js') ?>"/></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<!-- <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<!-- Tata -->
<script src="<?php echo base_url('assets/tata-master/dist/tata.js') ?>"></script>
<!-- <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script> -->

<script type="text/javascript">
	$(document).ready(function(){
	   	$('#btn_ubahpassword').click(function() {
			var data =$('#ubah_password').serialize()
			var pass = $('#pass').val();
			var pass2 = $('#k_pass').val();						
			if (pass != pass2) {				
				alert("password tidak sama!");
			}else{
                
				$.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_Home/ubahpassword')?>",
                dataType : "JSON",
                data : data,
                success: function(data){
                    $('#pass').val("");
                    $('#k_pass').val("");
                    $('#flashmessage').html('<span class=alert-success text-center>Password Anda Sudah Berubah, Harap diingat yaa :D<span>');
                },
				error: function(response){
					$('#flashmessage').html('<span class=alert-danger text-center>Ubah Password Gagal <span>');
                    
                }
				//$('#Modal_Password').modal('hide');
         
            });
                // echo "eksekusi";
            }

		});

		

	});
	function Gantitahun(){
			$('#tahun').on('change', function() {
				alert( this.value );
			});

		}
</script>

      