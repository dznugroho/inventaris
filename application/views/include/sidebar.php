<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand ">
				<a href="<?php echo site_url('dashboard'); ?>">
				<img src="http://localhost/inventaris/assets/img/avatar/sidoku.svg" height="60" width="120" alt="">
				</a>
			</div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SD</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard'?'active': '' ?>">
                <a href="<?php echo site_url('dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <?php if($this->session->userdata('akses')=='1'):?>
              <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'pengguna'
              || $this->uri->segment(1) == 'perusahaan' || $this->uri->segment(1) == 'upload' || 
              $this->uri->segment(1) == 'register' ?'active': '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'admin'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('admin'); ?>">Admin Utama</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'pengguna'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('pengguna'); ?>">Admin Kecamatan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'perusahaan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('perusahaan'); ?>">Perusahaan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'upload'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('upload'); ?>">Umum</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'register'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('register'); ?>">Konfirmasi Pendaftar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'pendidikan' || $this->uri->segment(1) == 'kesehatan'
              || $this->uri->segment(1) == 'lingkungan' || $this->uri->segment(1) == 'pek' || $this->uri->segment(1) == 'infrastruktur' ?'active': '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Bidang</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'pendidikan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('pendidikan'); ?>">Bidang Pendidikan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'kesehatan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('kesehatan'); ?>">Bidang Kesehatan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'lingkungan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('lingkungan'); ?>">Bidang Lingkungan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'pek'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('pek'); ?>">Bidang PEK</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'infrastruktur'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('infrastruktur'); ?>">Bidang Infrastruktur</a></li>
                </ul>
              </li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'wilayah'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('wilayah'); ?>"><i class="far fa-list-alt"></i> <span>Data Wilayah</span></a></li>
              <li class="menu-header">Usulan Kegiatan</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'usulan'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('usulan'); ?>"><i class="far fa-file-alt"></i> <span>Data Usulan</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'confirm'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('confirm'); ?>"><i class="far fa-list-alt"></i> <span>Konfirmasi Usulan</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'status_accepted'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('status_accepted'); ?>"><i class="far fa-file-alt"></i> <span>Usulan Diterima</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'status_declined'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('status_declined'); ?>"><i class="far fa-file-alt"></i> <span>Usulan Ditolak</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'riwayat_pilihan'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('riwayat_pilihan'); ?>"><i class="far fa-file-alt"></i> <span>Riwayat Pilihan</span></a></li>
              <li class="menu-header">&nbsp;</li>
              
              <?php elseif($this->session->userdata('akses')=='2'):?>
              <li class="menu-header">Usulan Kegiatan</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'usulanumum'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('usulanumum'); ?>"><i class="far fa-list-alt"></i> <span>Data Usulan</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'status_accepted'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('status_accepted'); ?>"><i class="far fa-file-alt"></i> <span>Status Usulan</span></a></li>
              
              <?php elseif($this->session->userdata('akses')=='3'):?>
              <li class="menu-header">Usulan Kegiatan</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'usulankec'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('usulankec'); ?>"><i class="far fa-list-alt"></i> <span>Data Usulan</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'status_usulankec'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('status_usulankec'); ?>"><i class="far fa-file-alt"></i> <span>Status Usulan</span></a></li>

              <?php else:?>
              <li class="menu-header">Usulan Kegiatan</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'pilihan_ps'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('pilihan_ps'); ?>"><i class="far fa-list-alt"></i> <span>Pilih Usulan Kegiatan</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'kegiatan'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('kegiatan'); ?>"><i class="far fa-file-alt"></i> <span>Status Pilihan</span></a></li>
              <?php endif;?>
        </aside>
    </div>