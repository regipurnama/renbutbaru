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

		 
    <!-- Page Heading -->
    <div class="row">
      <div class="col-8">
        </div>
            
        <div class="col-12">
            <div class="col-md-12">
                <h3>Status Usulan
                    <small></small>
                    <?php 
                      $id_user =  $this->session->userdata('id_user');
                      $role =  $this->session->userdata('role'); 
                      $tahun =  $this->session->userdata('tahun'); 
                      // || $id_user ==16
                      // if($role =='Admin' ){ ?>
                        <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary tambah-status" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Status</a></div>

                      <?php 
                      // }
                    ?>
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Usulan</a></div> -->
                </h3>
            </div>
            <hr/>
                           
            <table class="table table-striped" id="StatusTable" style="min-width:100% !important;">
                <thead>
                    <tr>
                        <th>No</th>
                        <!-- <th></th> -->
                        <th>Unit Kerja Pengusul</th>
                        <th>Nama Barang</th>
                        <th>Volume</th>
                        <th>Harga Satuan</th>
                        <th>Prioritas</th>
                        <th>Dokumen Pendukung</th>
                        <th>Status Usulan</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
    </div>
         

              
          <!--MODAL KONFIRMASI VALIDASI-->
         <form id="validasi"> 
            <div class="modal fade" id="Modal_Validasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Apakah Data Usulan sudah benar ? </strong>
                       <p>Jika Benar, Usulan Anda tidak dapat diedit lagi dan akan dikirim serta diproses oleh Admin.</p>  
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="form-control">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" type="submit" id="btn_valid" class="btn btn-primary">Ya</button>
                  </div>
                </div>
              </div>
            </div>
          </form> 
           <!--MODAL KONFIRMASI DELETE di AWAL-->
         <form id="validasi"> 
            <div class="modal fade" id="Modal_Validasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Apakah Data Usulan sudah benar ? </strong>
                       <p>Jika Benar, Usulan Anda tidak dapat diedit lagi dan akan dikirim serta diproses oleh Admin.</p>  
                  </div>
                  <div class="modal-footer">
                    <input type="text" name="id_pengadaan" id="id_pengadaan" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" type="submit" id="btn_valid" class="btn btn-primary">Ya</button>
                  </div>
                </div>
              </div>
            </div>
          </form> 
 
        <!--MODAL ADD-->
            <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Usulan Belanja Barang & Jasa</h5>
                    <div>
                      <button  type="button" class="btn btn-success" name="btn-save-pengadaan" id="btn-save-pengadaan">Simpan Usulan</button> 
                      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                       <i class="fa fa-times"></i>
                      </button>
                    
                   </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row" style="margin-bottom: 0px !important;">
                            
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
                        <form id="form-tambah-barang" method="POST" enctype="multipart/form-data">            
                          <div class="form-group row" style="margin-bottom: 0px !important;">
                                <input type="hidden" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" >
                                <input type="hidden" name="id_temp" id="id_temp" class="form-control" >
                                <input type="hidden" name="jenis_belanja" id="jenis_belanja" value="1" class="form-control" >
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama Program</label>
                                <select name="id_program" id="id_program" class="form-control js-data-example-basic-multiple" onChange="bukakegiatan(this);" ></select> 
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama Kegiatan</label>
                                <select type="text" name="id_kegiatan" id="id_kegiatan" class="form-control "  onChange="bukasubkegiatan(this);" ></select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Nama SubKegiatan</label>
                                <select type="text" name="id_subkegiatan" id="id_subkegiatan" class="form-control" ></select>
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
                                <label class="col-md-12 col-form-label mini-text">Nama Barang / Jasa</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang / Jasa" required>
                              </div>
                              
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Tipe Barang</label>
                                <select type="text" name="id_tipe_barang" id="id_tipe_barang" class="form-control" required></select>
                              </div>
                              <div class="col-md-4">
                                <label class="col-md-12 col-form-label mini-text">Jenis Barang</label>
                                <select type="text" name="id_jenis_barang" id="id_jenis_barang" class="form-control" required></select>
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
                                <label class="col-md-12 col-form-label mini-text">Upload Dokumen Pendukung (PDF)</label>
                                <input type="file" name="image" id="image">
                                <input type="hidden" name="e_image" id="e_image">
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
                              <!-- <div class="col-md-6">
                                <label class="col-md-12 col-form-label mini-text">Upload Bukti Harga</label>
                                <input type="file" name="upload_harga" id="upload_harga" class="form-control"  required>
                              </div> -->                         

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
                        <th>Total harga</th>
                        <th>Prioritas</th>
                        <th>Catatan</th>
                        <th>Dokumen Pendukung</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    <tfoot>
                          <tr>
                              <th colspan="5" style="text-align:right">Total:</th>
                              <th></th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>

            <!--MODAL ADD-->
            <div class="modal fade" id="Modal_Persetujuan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Persetujuan Usulan Belanja Barang & Jasa</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      TUTUP (X)
                      </button>
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row" style="margin-bottom: 0px !important;">
                            
                          <div class="col-md-12">
                            <table class="table table-striped">
                              <tr>
                                <td class="pad-2">Unit Kerja</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" style="width:80%;"><p id="p_unit_kerja">coba</p></th>
                              </tr>
                              <tr>
                                <td class="pad-2">Kode Pengadaan RKBU</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" style="width:80%;"><p id="p_unit_kerja">coba</p></th>
                              </tr>
                            </table>
                          </div>
                      </div>                        
                  </div>
                
                  <div class="modal-body">
                  <table class="table table-striped" id="PersetujuanTable" style="width:100%" >
                    <thead>
                      <tr>
                        <th>Nama Program</th>
                        <th>Nama Kegiatan</th>
                        <th>Nama Subkegiatan</th>
                        <th>Nama Uraian</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Deskripsi</th>
                        <th>Hasil Integrasi</th>
                        <!-- <th>Setujui</th> -->
                        <th>Jumlah Disetujui</th>
                        <th>Catatan RTP</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Status Usulan</h5>
                    <div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" name="btn-batal-pengadaan" id="btn-batal-pengadaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                       <i class="fa fa-times"></i>
                      </button>
                  
                      <!-- <button  type="button" class="btn btn-success" name="btn-e-save-pengadaan" id="btn-e-save-pengadaan">Simpan Usulan</button>  -->
                    </div>
                  </div>
                  <div class="modal-body">
                          <div class="form-group row" style="margin-bottom: 0 !important;">
                            
                          <div class="col-md-12">
                            <table class="table table-striped">
                              <tr>
                                <td class="pad-2">Nama Barang</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2"><p id="s_nama_barang"></p></th>
                                <td class="pad-2">Volume</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2"><p id="s_volume"></p></th>
                              
                              
                               
                              </tr>
                              <tr>
                                <td class="pad-2">Spesifikasi</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" style="width:80%;" colspan = '4'><p id="s_spesifikasi"></p></th>
                      
                              </tr>
                              <tr>
                                <td class="pad-2">Unit Kerja</td>
                                <td class="pad-2">:</td>
                                <th class="pad-2" style="width:80%;" colspan = '7'><p id="e_unit_kerja"></p></th>
                              </tr>
                            </table>
                          </div>
                  </div>
                  <form id="form-edit-barang" method="POST" enctype="multipart/form-data">           
                        <div class="modal-body" style="padding: 0.3rem !important;">
                          <div class="form-group row" style="margin-bottom: 0px !important;">
                                <div class="col-md-12">
                                  <input type="hidden" name="e_id_detail_pengadaan" id="e_id_detail_pengadaan" class="form-control" >
                                </div>
                                <!-- <input type="hidden" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" > -->
                                <div class="container">
                                  <div class="row">
                                      <label class="col-md-12 form-check-label mini-text"><b>Tindakan Usulan</b></label>
                                  </div>
                                  <div class="row">
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="tindakan" name="tindakan" value="Diakomodir"  class="form-check-input" required>Diakomodir
                                      
                                    </div>
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="tindakan" name="tindakan" value="Pending"  class="form-check-input" required>Pending
                                    </div>
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="tindakan" name="tindakan" value="Tolak"   class="form-check-input" required>Tolak
                                    </div>
                                  </div>
                              </div>
                              <div class="container">
                                  <div class="row">
                                      <label class="col-md-12 form-check-label mini-text"><b>Jika Di Akomodir</b></label>
                                  </div>
                                  <div class="row">
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="prioritas_status" name="prioritas_status" value="Prioritas 1"  class="form-check-input" required>Prioritas 1
                                      
                                    </div>
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="prioritas_status" name="prioritas_status" value="Prioritas 2"  class="form-check-input" required>Prioritas 2
                                    </div>
                                    <div class="col-4 form-check align-center">
                                      <input type="radio" id="prioritas_status" name="prioritas_status" value="Prioritas 3"   class="form-check-input" required>Prioritas 3
                                    </div>
                                  </div>
                              </div>
                              
                              <div class="col-md-12">
                                <label class="col-md-12 form-check-label mini-text"><b>Catatan / Deskripsi</b></label>
                                <textarea name="catatan" id="catatan" class="form-control " required></textarea>
                              </div>
                             
                                <div class="col-md-4">
                                  <label class="col-md-12 form-check-label mini-text"><b>Volume yang di ACC</b></label>
                                  <input type="text" name="volume_status" id="volume_status" class="form-control" >
                                </div>
                                <div class="col-md-4">
                                  <label class="col-md-12 form-check-label mini-text"><b>Satuan yang di ACC</b></label>
                                  <input type="text" name="satuan_status" id="satuan_status" class="form-control" >
                                </div>
                                <div class="col-md-4">
                                  <label class="col-md-12 form-check-label mini-text"><b>Bidang/Bagian yang Mengisi Usulan</b></label>
                                  <input type="text" name="bidang" id="bidang" class="form-control "  readonly="readonly">
                                </div>
                               <div class="col-md-2">
                                <label class="col-md-12 col-form-label mini-text mt-03"> </label>
                                <button type="submit" type="submit" id="e_btn_save_status" class="btn btn-primary">Tambah Status</button>
                              </div>
                          
                              
                            </div>
                          </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                  <div class="modal-body">
                  
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
            <div class="modal fade" id="Modal_Konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
<?php $this->load->view("admin/_js/jsstatus.php") ?>
    

</body>
</html>
