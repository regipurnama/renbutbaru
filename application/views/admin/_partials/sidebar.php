<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <!-- <li class="nav-item ">
        <a class="nav-link" href="#">
            <form action="#">
                <select name="tahun" id="tahun" class="form-control" onChange ='Gantitahun()'>
                    <?php if(!$_SESSION['tahun']) {?>
                        <option value='<?php echo $_SESSION['tahun']; ?>' selected><?php echo $_SESSION['tahun']; ?></option>
                    <?php } ?>
                        <option value='2023'>2023</option>
                        <option value='2022'>2022</option>
                </select>
            </form>
        </a>
    </li> -->
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Dashboard' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Rkbu/Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Halaman Depan</span>
        </a>
    </li>
    <!-- <li class="nav-item <?php echo $this->uri->segment(1) == 'Pegawai' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Pegawai/index'); ?>">
            <i class="fas fa-copy"></i>
            <span>Belanja Pegawai</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Pengadaan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Pengadaan/index'); ?>">
            <i class="fas fa-copy"></i>
            <span>Belanja Barang & Jasa</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Modal' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Modal/Index'); ?>">
            <i class="fas fa-copy"></i>
            <span>Belanja Modal </span>
        </a>
    </li> -->

  
   
    <!-- <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'Pemeliharaan') { echo 'show';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'show';} else {echo '';}; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="<?php if($this->uri->segment(1) == 'Pemeliharaan') { echo 'true';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'true';} else {echo 'false';}; ?>">
           <i class="fas fa-fw fa-bars"></i>
            <span>Rekapitulasi</span>
        </a>
        <div class="dropdown-menu <?php if($this->uri->segment(1) == 'Pemeliharaan') { echo 'show';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'show';} else {echo '';}; ?>" aria-labelledby="pagesDropdown" style="background-color:#ebebeb !important;border: 0px;">
            <a class="dropdown-item  dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Pemeliharaan' ? 'active': '' ?> "" href="<?php echo base_url('Pemeliharaan/index'); ?>" >
            <i class="fas fa-fw fa-genderless"></i>
            <span>Pemeliharaan</span></a>
            
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Pengadaan' ? 'active': '' ?>" href="<?php echo base_url('Pengadaan/index'); ?>" >
            <i class="fas fa-fw fa-genderless"></i>
            <span>Pengadaan</span></a>
            
        </div>
    </li>
    -->
    <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'Pegawai') { echo 'show';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'show';} elseif($this->uri->segment(1) == 'Modal'){ echo 'show';} else {echo '';}; ?> ">
        <a class="nav-link <?php if($this->uri->segment(1) == 'Pegawai') { echo 'active';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'active';} elseif($this->uri->segment(1) == 'Modal'){ echo 'active';} else {echo '';}; ?>  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="far fa-copy"></i>
            <span>Usulan Kebutuhan</span>
        </a>
        <!--  -->
        <div class="dropdown-menu <?php if($this->uri->segment(1) == 'Pegawai') { echo 'show';} elseif($this->uri->segment(1) == 'Pengadaan'){ echo 'show';} elseif($this->uri->segment(1) == 'Modal'){ echo 'show';}  elseif($this->uri->segment(1) == 'Rekening'){ echo 'show';} else {echo '';}; ?> " aria-labelledby="pagesDropdown" style="background-color:#ebebeb !important;border: 0px;">
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Pegawai' ? 'active': '' ?>" href="<?php echo base_url('Pegawai/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Pegawai</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Pengadaan' ? 'active': '' ?>" href="<?php echo base_url('Pengadaan/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Barang & Jasa</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Modal' ? 'active': '' ?>" href="<?php echo base_url('Modal/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Modal</span></a>
            <?php if($_SESSION['tahun']==2023){ ?>
                <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Rekening' ? 'active': '' ?>" href="<?php echo base_url('Rekening/Index') ?>"><i class="far fa-file-alt"></i> <span>Kode Rekening</span></a>

            <?php } ?>
            
        </div>
    </li> 
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Status' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Status/Index'); ?>">
        <i class="far fa-file-alt"></i>
            <span>Status Usulan</span>
        </a>
    </li>   
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Rekapitulasi' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('Rkbu/Rekapitulasi'); ?>">
        <i class="far fa-file-alt"></i>
            <span>Rekapitulasi</span>
        </a>
    </li>   
     <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'Master') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?> ">
        <a class="nav-link <?php if($this->uri->segment(1) == 'Master') { echo 'active';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'active';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'active';} else {echo '';}; ?>  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Pendukung</span>
        </a>
        <div class="dropdown-menu <?php if($this->uri->segment(1) == 'Master') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?>" aria-labelledby="pagesDropdown" style="background-color:#ebebeb !important;border: 0px;">
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Program' ? 'active': '' ?>" href="<?php echo base_url('Master/Program') ?>"><i class="far fa-file-alt"></i> <span>Program</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Kegiatan' ? 'active': '' ?>" href="<?php echo base_url('Master/Kegiatan') ?>"><i class="far fa-file-alt"></i> <span>Kegiatan</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Subkegiatan' ? 'active': '' ?>" href="<?php echo base_url('Master/Subkegiatan') ?>"><i class="far fa-file-alt"></i> <span>SubKegiatan</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Uraian' ? 'active': '' ?>" href="<?php echo base_url('Master/Uraian') ?>"><i class="far fa-file-alt"></i> <span>Uraian</span></a>
            
        </div>
    </li> 
    <?php if($this->session->userdata('role') == 'Admin'){ ?>       
    <!-- <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'Pegawairtp') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?> ">
        <a class="nav-link <?php if($this->uri->segment(1) == 'Pegawairtp') { echo 'active';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'active';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'active';} else {echo '';}; ?>  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <span>Persetujuan RTP</span>
        </a>
<div class="dropdown-menu <?php if($this->uri->segment(1) == 'Pegawairtp') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?>" aria-labelledby="pagesDropdown" style="background-color:#ebebeb !important;border: 0px;">
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Pegawairtp' ? 'active': '' ?>" href="<?php echo base_url('Pegawairtp/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Pegawai</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Barjasrtp' ? 'active': '' ?>" href="<?php echo base_url('Barjasrtp/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Barang & Jasa</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(1) == 'Modalrtp' ? 'active': '' ?>" href="<?php echo base_url('Modalrtp/Index') ?>"><i class="far fa-file-alt"></i> <span>Belanja Modal</span></a>
            
        </div>  
    </li> -->
    <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'Master') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?> ">
        <a class="nav-link <?php if($this->uri->segment(1) == 'Master') { echo 'active';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'active';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'active';} else {echo '';}; ?>  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div class="dropdown-menu <?php if($this->uri->segment(1) == 'Master') { echo 'show';} elseif($this->uri->segment(1) == 'Barjasrtp'){ echo 'show';} elseif($this->uri->segment(1) == 'Modalrtp'){ echo 'show';} else {echo '';}; ?>" aria-labelledby="pagesDropdown" style="background-color:#ebebeb !important;border: 0px;">
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Pengguna' ? 'active': '' ?>" href="<?php echo base_url('Master/Pengguna') ?>"><i class="far fa-user"></i> <span>Pengguna</span></a>
            <!-- <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Import' ? 'active': '' ?>" href="<?php echo base_url('Master/Import') ?>"><i class="far fa-file-alt"></i> <span>Import Permen 50</span></a> -->
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Program' ? 'active': '' ?>" href="<?php echo base_url('Master/Program') ?>"><i class="far fa-file-alt"></i> <span>Program</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Kegiatan' ? 'active': '' ?>" href="<?php echo base_url('Master/Kegiatan') ?>"><i class="far fa-file-alt"></i> <span>Kegiatan</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Subkegiatan' ? 'active': '' ?>" href="<?php echo base_url('Master/Subkegiatan') ?>"><i class="far fa-file-alt"></i> <span>SubKegiatan</span></a>
            <a class="dropdown-item dropdown-bl-mode <?php echo $this->uri->segment(2) == 'Uraian' ? 'active': '' ?>" href="<?php echo base_url('Master/Uraian') ?>"><i class="far fa-file-alt"></i> <span>Uraian</span></a>
            
        </div>
    </li>
    
    <?php } ?>
    <li class="nav-item <?php echo $this->uri->segment(1) == 'Buku Petunjuk' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('assets/file/buku_petunjuk_rkbu.pptx'); ?>">
        <i class="fas fa-book"></i>
            <span>Buku Petunjuk</span>
        </a>
    </li>
</ul>

