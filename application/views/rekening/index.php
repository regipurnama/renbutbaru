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
      <div class="col-8">
      </div>
      <div class="col-4">
     
          <div class="alert alert-info" role="alert" style="text-align: right;">
              Total Belanja Rekening : <b><span id='totalmodal'></span></b>
          </div>
      </div>
           
        <div class="col-12">
            <div class="col-md-12">
                <h3>Kode Rekening
                    <small></small>
                    <?php 
                      $id_user =  $this->session->userdata('id_user');
                      $role =  $this->session->userdata('role'); 
                      //|| $id_user ==16
                      // if($role =='Admin' ){ ?>
                        <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Usulan</a></div> -->

                      <!-- <?php 
                      // }
                    ?> -->
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Usulan</a></div> -->
                </h3>
            </div>
            <hr/>
                           
            <table class="table table-striped" id="RekeningTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <!-- <th>Kode Pengadaan</th> -->
                        <th>Kode Rekening</th>
                        <!-- <th>Tanggal Usulan</th> -->
                        <th>Nama Rekening</th>
                        <th>Total Anggaran</th>
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
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Berdasarkan Kode Rekening</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <!-- <button  type="button" class="btn btn-success" name="btn-save-pengadaan" id="btn-save-pengadaan">Simpan Usulan</button>  -->
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row">
                            
                          <div class="col-md-12">
                            <table class="table table-striped">
                              <tr>
                                <td class="pad-2">Unit Kerja</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" style="width:80%;"><p id="p_unit_kerja">coba</p></th>
                              </tr>
                            </table>
                          </div>
                  </div>
                        <form id="form-tambah-barang" method="POST">            
                          <div class="form-group row">
                                <input type="hidden" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" >
                                <input type="hidden" name="id_temp" id="id_temp" class="form-control" >
                                <input type="hidden" name="jenis_belanja" id="jenis_belanja" value="2" class="form-control" >
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama Program</label>
                                <select name="id_program" id="id_program" class="form-control js-data-example-basic-multiple" onChange="bukakegiatan(this);" required></select> 
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama Kegiatan</label>
                                <select type="text" name="id_kegiatan" id="id_kegiatan" class="form-control "  onChange="bukasubkegiatan(this);" required></select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama SubKegiatan</label>
                                <select type="text" name="id_subkegiatan" id="id_subkegiatan" class="form-control" required></select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Uraian</label>
                                <select type="text" name="id_uraian" id="id_uraian" class="form-control" required></select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Jenis Sumber Dana</label>
                                <!-- <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" placeholder="Sumber Dana" required> -->
                                <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                                  <option value="">Pilih Sumber Dana</option>
                                  <option value="apbd">APBD</option>
                                  <option value="apbn">APBN</option>
                                  <option value="blud">BLUD</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama Barang Modal</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang Modal" required>
                              </div>
                             
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Kuantitas</label>
                                <input type="number" name="kuantitas" id="kuantitas" class="form-control" placeholder="Kuantitas" required>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Satuan</label>
                                <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" required>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Skala Prioritas</label>
                                <!-- <input type="text" name="prioritas" id="prioritas" class="form-control" placeholder="Prioritas" required> -->
                                <select name="prioritas" id="prioritas" class="form-control" required>
                                  <option value="">Pilih Prioritas</option>
                                  <option value="tinggi">Tinggi</option>
                                  <option value="sedang">Sedang</option>
                                  <option value="rendah">Rendah</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Harga Satuan</label>
                                <input type="text" name="hs" id="hs" class="form-control" placeholder="Harga Satuan" required>
                              </div>
                              <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Spesifikasi</label>
                                <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" placeholder="Merk, Ukuran, Rincian, dll" required>
                              </div>
                            
                              <div class="col-md-10">
                                <label class="col-md-12 col-form-label mini-text">Catatan</label>
                                <textarea name="catatan" id="catatan" cols="40" rows="3" class="form-control"></textarea>
                                
                              </div>
                              <div class="col-md-2">
                                <label class="col-md-12 col-form-label mini-text mt-03"> </label>
                                <button type="submit" type="submit" id="btn_save_brg_temp_pengadaan" class="btn btn-primary">Tambah Barang</button>
                              </div>
                              
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                  <div class="modal-body">
                  <table class="table table-striped" id="DetailPengadaantempTable" style="width:100%" >
                    <thead>
                      <tr>
                       <th>Nama Program</th>
                        <th>Nama Kegiatan</th>
                        <th>Nama Subkegiatan</th>
                        <th>Nama Uraian</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Prioritas</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="10" style="text-align:right">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>
         
        <!--MODAL EDIT-->
          <div class="modal fade" id="Modal_Edit"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Kode Rekening<h5>
                    <div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      <i class="fa fa-window-close" aria-hidden="true"></i>
                      </button>
                      <!-- <button  type="button" class="btn btn-success" name="btn-e-save-pengadaan" id="btn-e-save-pengadaan">Simpan Usulan</button>  -->
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row">
                            
                          <div class="col-md-12">
                            <table class="table table-striped">
                              <tr>
                                <td class="pad-2">Kodering Rekening</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" ><p id="p_kode_pengadaan">coba</p></th>
                                <td class="pad-2">Nama Rekening</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" ><p id="e_unit_kerja">coba</p></th>
                              </tr>
                            </table>
                          </div>
                  </div>
                  <div class="modal-body">
                  <table class="table table-striped" id="DetailRekeningTable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Nama Program</th>
                        <th>Nama Kegiatan</th>
                        <th>Nama Subkegiatan</th>
                        <th>Nama Uraian</th>
                        <th >Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Prioritas</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    <tfoot>
                          <tr>
                              <th colspan="10" style="text-align:right">Total:</th>
                              <th></th>
                          </tr>
                      </tfoot>
                    </table>
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
<?php $this->load->view("admin/_js/jsrekening.php") ?>
    
</body>
</html>
