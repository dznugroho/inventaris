<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand ">
				<a href="<?php echo site_url('dashboard'); ?>">
				<img src="http://localhost/inventaris/assets/img/avatar/sidokufix.png" height="60" width="120" alt="">
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
              
              <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'kesehatan'
              || $this->uri->segment(1) == 'lingkungan' || $this->uri->segment(1) == 'pek' || $this->uri->segment(1) == 'infrastruktur' ?'active': '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'admin'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('admin'); ?>">Admin Utama</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'kesehatan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('kesehatan'); ?>">Admin Kecamatan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'lingkungan'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('lingkungan'); ?>">Perusahaan</a></li>
                  <li class="nav-item <?php echo $this->uri->segment(1) == 'pek'?'active': '' ?>">
                  <a class="nav-link" href="<?php echo site_url('pek'); ?>">Perorangan</a></li>
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
              <li class="nav-item <?php echo $this->uri->segment(1) == 'wilayah'?'active': '' ?>"><a class="nav-link" href="<?php echo site_url('wilayah'); ?>"><i class="far fa-list-alt"></i> <span>Data Wilayah</span></a></li>
              <li class="menu-header">Berkas</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'data_berkas'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('data_berkas'); ?>"><i class="far fa-file-alt"></i> <span>Kelola Berkas</span></a></li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'data_berkas'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('data_berkas'); ?>"><i class="far fa-file-alt"></i> <span>Kelola Profile</span></a></li>
        </aside>
    </div>