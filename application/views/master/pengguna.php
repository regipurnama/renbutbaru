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
                <h3>Pengguna
                    <small></small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Pengguna</a></div>
                </h3>
            </div>
            <hr/>
                           
            <table class="table table-striped" id="PenggunaTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit Kerja</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Blokir</th>
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
            <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="form-tambah-pengguna" method="POST">            
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pengguna" id="btn-batal-pengguna">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button type="submit" class="btn btn-success" name="submit" id="submit">Tambah Pengguna</button> 
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row">
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Unit Kerja</label>
                                <input type="text" name="unit_kerja" id="unit_kerja" class="form-control js-data-example-basic-multiple"  placeholder="Nama Unit Kerja Singkat" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Unit Kerja Lengkap</label>
                                <input type="text" name="ukl" id="ukl" class="form-control "   placeholder="Nama Unit Kerja Lengkap" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username"  required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Role</label>
                                <input type="text" name="role" id="role" class="form-control" value="User" readonly="readonly">
                              </div>
                             
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Blokir Akun</label>
                                <!-- <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" placeholder="Sumber Dana" required> -->
                                <select name="blokir" id="blokir" class="form-control" required>
                                  <option value="0">Tidak</option>
                                  <option value="1">Blokir</option>
                                  
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Bidang</label>
                                <input type="text" name="bidang" id="bidang" class="form-control" placeholder="Bidang" required>
                              </div>
                              
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Direksi</label>
                                <input type="text" name="direksi" id="direksi" class="form-control" placeholder="Direksi" required>
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
                  <form id="form-edit-pengguna">           
          <div class="modal fade" id="Modal_Edit_Pengguna"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pengguna" id="btn-batal-pengguna">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button  type="submit" class="btn btn-success" name="submit" id="submit">Edit Pengguna</button> 
                     <!-- <button  type="button" class="btn btn-success" name="btn-e-save-pengadaan" id="btn-e-save-pengadaan">Simpan Usulan</button>  -->
                    </div>
                  </div>
                  <div class="modal-body">
                          
                        <div class="modal-body">
                        <div class="form-group row">
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Unit Kerja</label>
                                <input type="hidden" name="e_id_user" id="e_id_user" class="form-control js-data-example-basic-multiple"  placeholder="Nama Unit Kerja Singkat" required>
                                <input type="text" name="e_unit_kerja" id="e_unit_kerja" class="form-control js-data-example-basic-multiple"  placeholder="Nama Unit Kerja Singkat" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Unit Kerja Lengkap</label>
                                <input type="text" name="e_ukl" id="e_ukl" class="form-control "   placeholder="Nama Unit Kerja Lengkap" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Username</label>
                                <input type="text" name="e_username" id="e_username" class="form-control" placeholder="Username"  required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Password</label>
                                <input type="password" name="e_pass" id="e_pass" class="form-control" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Role</label>
                                <input type="text" name="e_role" id="e_role" class="form-control" value="User" readonly="readonly">
                              </div>
                             
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Blokir Akun</label>
                                <!-- <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" placeholder="Sumber Dana" required> -->
                                <select name="e_blokir" id="e_blokir" class="form-control" required>
                                  <option value="0">Tidak</option>
                                  <option value="1">Blokir</option>
                                  
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Bidang</label>
                                <input type="text" name="e_bidang" id="e_bidang" class="form-control" placeholder="Bidang" required>
                              </div>
                              
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Direksi</label>
                                <input type="text" name="e_direksi" id="e_direksi" class="form-control" placeholder="Direksi" required>
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
                      <span id="nama_program"></span>
                      <strong>Anda yakin menghapus rekam data ini ?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_seksi" id="id_seksi" class="form-control">
                    <input type="hidden" name="id_hapus" id="id_hapus" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" type="submit" id="btn_hapus" class="btn btn-primary">Ya</button>
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
  
  </div>

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
