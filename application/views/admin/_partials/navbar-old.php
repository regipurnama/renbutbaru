<nav class="navbar navbar-expand navbar-dark bg-success static-top">
    <img src="<?php echo base_url('assets/img/logo.png') ?>" height="30px" width="auto"></img> &nbsp;
    <a class="navbar-brand mr-1" href="<?php echo site_url('admin') ?>"><?php echo SITE_NAME ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> 
                <small>Hai..</small>
                <span><?php echo "<b>".strtoupper($profile->unit_kerja)."</b>"; ?></span>
				
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Password"><i class="fas fa-key"></i> Ubah Password</a>
                <!-- <a class="dropdown-item" href="#">Activity Log</a>  -->
                <div class="dropdown-divider"></div> 
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>

       <!--MODAL KONFIRMASI DELETE di AWAL-->
         <form id="ubah_password"> 
            <div class="modal fade" id="Modal_Password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <div id="flashmessage"></div>
                    <!-- <strong>Apakah Data Usulan sudah benar ? </strong> -->
                    <!-- <p>Jika Benar, Usulan Anda tidak dapat diedit lagi dan akan dikirim serta diproses oleh Admin.</p>   -->
                     <span><?php echo "Unit Kerja : <b>".strtoupper($profile->unit_kerja)."</b>"; ?></span>
                    <hr/>
                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $profile->id_user; ?>" class="form-control">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label mini-text">Password Baru</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Password Baru" required>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label mini-text">Konfirmasi Password</label>
                            <input type="password" name="k_pass" id="k_pass" class="form-control" placeholder="Konfirmasi Password" required>
                        </div>
                     </div>
                </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                    <button type="button" type="submit" id="btn_ubahpassword" class="btn btn-primary">Ubah Password</button>
                  </div>
                </div>
              </div>
            </div>
          </form> 



</nav>

