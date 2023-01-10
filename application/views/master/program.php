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
		<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

		 
<div class="container">
    <!-- Page Heading -->
    <div class="row">
    
        <div class="col-12">
            <div class="col-md-12">
                <h3>Program
                    <small></small>
                    <?php if($this->session->userdata('role') == 'Admin'){ ?>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Program</a></div>
                    <?php } ?>
                </h3>
            </div>
            <hr/>
                           
            <table class="table table-striped" id="ProgramTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kodering Program</th>
                        <th>Nomenklatur Program</th>                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
    </div>
         
</div>
 
        <!--MODAL ADD-->
        <form id="form-tambah-program" method="POST">            
            <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-program" id="btn-batal-program">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button  type="submit" class="btn btn-success" name="submit" id="submit">Tambah Program</button> 
                    </div>
                  </div>
                  <div class="modal-body">
                        
                          <div class="form-group row">
                            
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Kodering Program</label>
                                <input type="text" name="kodering_program" id="kodering_program" class="form-control" placeholder="Kodering Program" required>
                              </div>
                             
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Nama Program</label>
                                <input type="text" name="nama_program" id="nama_program" class="form-control" placeholder="Nama Program" required>
                              </div>
                              
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                 
                  
                </div>
              </div>
            </div>
         
        <!--MODAL EDIT-->
        <form id="form-edit-program">           
          <div class="modal fade" id="Modal_Edit"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Program</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-program" id="btn-batal-program">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button  type="submit" class="btn btn-success" name="submit" id="submit">Tambah Program</button> 
                    </div>
                  </div>
                  <div class="modal-body">
                       
                        <div class="modal-body">
                          <div class="form-group row">
                            
                            <div class="col-md-6">
                              <label class="col-md-12 col-form-label mini-text">Kodering Program</label>
                              <input type="hidden" name="e_id_program" id="e_id_program" class="form-control" placeholder="Kodering Program" required>                               
                              <input type="text" name="e_kodering_program" id="e_kodering_program" class="form-control" placeholder="Kodering Program" required>
                            </div>
                           
                            <div class="col-md-6">
                              <label class="col-md-12 col-form-label mini-text">Nama Program</label>
                              <input type="text" name="e_nama_program" id="e_nama_program" class="form-control" placeholder="Nama Program" required>
                            </div>
                            
                          </div>
                              
                            </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                
                </div>
              </div>
            </div>
            </form>
        
        <!--MODAL REALISASI ADMIN-->
         <form id="form-real">
            <div class="modal fade" id="Modal_Realisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Usulan Pengadaan</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button  type="button" class="btn btn-success" name="btn-save-pengadaan" id="btn-save-pengadaan">Simpan Usulan</button> 
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-md-3">
                            <label class="col-md-12 col-form-label mini-text" style="margin-left:0px !important;">Kode Permohonan</label>
                              <input type="text" name="kode_permohonan" id="kode_permohonan" class="form-control" placeholder="Kode Permohonan" readonly="readonly">
                            </div>
                            <div class="col-md-3">
                              <label class="col-md-12 col-form-label mini-text">Tgl Usulan</label>
                              <input type="date" name="tgl_usulan" id="tgl_usulan" class="form-control" placeholder="Tgl Usulan">
                            </div>
                            <div class="col-md-3">
                              <label class="col-md-12 col-form-label mini-text">Unit Kerja</label>
                              <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" value="<?php echo $profile->unit_kerja; ?>" readonly>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <hr>
                              <p class="modal-title" id="exampleModalLabel"><i>Isikan Data Barang</i></p>
                            <hr>
                        </div>
                        </div>
                          
                        <div class="form-group row">
                              <input type="hidden" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" >
                              <input type="hidden" name="id_temp" id="id_temp" class="form-control" >
                            <div class="col-md-2">
                              <label class="col-md-12 col-form-label mini-text">Nama Barang</label>
                              <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" required>
                            </div>
                            <div class="col-md-2">
                              <label class="col-md-12 col-form-label mini-text">Kuantitas</label>
                              <input type="text" name="kuantitas" id="kuantitas" class="form-control" placeholder="Kuantitas" required>
                            </div>
                            <div class="col-md-2">
                              <label class="col-md-12 col-form-label mini-text">Satuan</label>
                              <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" required>
                            </div>
                            <div class="col-md-2">
                              <label class="col-md-12 col-form-label mini-text">Keterangan</label>
                              <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required>
                            </div>
                            <div class="col-md-2">
                              <label class="col-md-12 col-form-label mini-text"> </label>
                              <button type="button" type="submit" id="btn_save_brg_pengadaan" class="btn btn-primary">Tambah Barang</button>
                            </div>
                            
                          </div>
                  </div>
                  <div class="modal-footer">
                  </div>
                  <div class="modal-body">
                  <table class="table table-striped" id="DetailpengadaanTable" style="min-width:100% !important;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Satuan</th>
                        <th>Realisasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </form>

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       Nama Program : <p id="text_program"></p>
                       <strong>Anda yakin menghapus rekam data ini ?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_hapus" id="id_hapus" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" type="submit" id="btn_hapus_program" class="btn btn-primary">Ya</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
       
        <!--Modal Konfirmasi-->
         <form>
            <div class="modal fade" id="Modal_Konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data yang ditambah/diubah akan hilang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Apakah Anda yakin meninggalkan Halaman?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="konfirmasi" id="konfirmasi">
                    <button type="button" class="btn btn-secondary">No</button>
                    <button type="button" type="submit" id="btn_konfirmasi" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
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

<!-- SCRIPT UPDATE ADD DELETE DATATABLES ADA DI DALAM JS  -->
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_js/jsmaster.php") ?>
    
</body>
</html>
