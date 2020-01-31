<div class="main-sidebar">
    <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard'?'active': '' ?>">
                <a href="<?php echo site_url('dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Bidang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Bidang Pendidikan</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Bidang Kesehatan</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Bidang Lingkungan</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Bidang PEK</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Bidang Infrastruktur</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?php echo site_url('wilayah'); ?>"><i class="far fa-square"></i> <span>Data Wilayah</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                  <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                  <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                  <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                  <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                </ul>
              </li>
              <li class="menu-header">Berkas</li>
              <li class="nav-item <?php echo $this->uri->segment(1) == 'berkas'?'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('berkas'); ?>"><i class="far fa-square"></i> <span>Kelola Berkas</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                  <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                  <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
              </li>
        </aside>
    </div>