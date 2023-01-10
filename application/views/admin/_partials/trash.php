<!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edited" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
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
                              <button type="button" type="submit" id="btn_save_brg_pemeliharaan" class="btn btn-primary">Tambah Barang</button>
                            </div>
                            
                          </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  </div>

                  <div class="modal-body">
                    <table class="table table-striped" id="DetailpemeliharaanTable" style="min-width:100% !important;">
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
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->



        
        <!-- MODAL ADD -->
          <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Usulan Pemeliharaan</h5>
                    <div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" name="btn-batal-pemeliharaan" id="btn-batal-pemeliharaan">
                      <!-- <span aria-hidden="true">&times;</span> -->
                      Batal
                      </button>
                      <button  type="button" class="btn btn-success" name="btn-save-pemeliharaan" id="btn-save-pemeliharaan">Simpan Usulan</button> 
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
                              <button type="button" type="submit" id="btn_save_brg_pemeliharaan" class="btn btn-primary">Tambah Barang</button>
                            </div>
                            
                          </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  </div>

                  <div class="modal-body">
                    <table class="table table-striped" id="DetailpemeliharaantempTable" style="min-width:100% !important;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    </table>
                  <div class="modal-body">
                  
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->
 