<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary" >
                  <i class="fas fa-graduation-cap" ></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Usulan Bidang Pendidikan</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where kode_bidang = "01"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
              </a>
            </div>          
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-book-medical" ></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Usulan Bidang Kesehatan</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where kode_bidang = "02"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-leaf"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Usulan Lingkungan</h4>
                  </div>
                  <div class="card-body">                  
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where kode_bidang = "03"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                  <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Usulan PEK</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where kode_bidang = "04"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-road"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Usulan Infrastruktur</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where kode_bidang = "05"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Usulan</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan ')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-paper-plane"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Usulan Diterima</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_usulan Where status_usulan = "01"')->num_rows(); ?></tr>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?php echo site_url('wilayah'); ?>">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-file-excel"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Usulan Ditolak</h4>
                  </div>
                  <div class="card-body">
                  <tr><?php echo $this->db->query( 'SELECT * FROM tb_pilihan Where status_perusahaan = "2"')->num_rows(); ?></tr>
                  </div>
                  </div>
              </div>
            </div>
          
            </div>
          <div class="row">
              <div class="col-md-9">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                            <th>Kode Kecamatan</th>
                            <th>Kecamatan</th>
                            </tr>
                        </thead>
                      </table>
          






                      <div class="alert alert-primary">
                      <div class="alert-title">Founder</div>
                      Si Doku Corporation.
                    </div>
                  <div class="card-body">
                    <ul class="card-card-warning">
                      <li class="media">
                        <img class="rounded-circle mr-1" src="assets/img/pp1.jpg" alt="Generic ">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">M.Faiz Fahmi</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media my-4">
                        <img class="rounded-circle mr-2" src="assets/img/dd.jpg" alt="Generic">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">Dimas Adi Nugroho</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media">
                      <img alt="image" src="assets/img/adit1.png" class="rounded-circle mr-1">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">List-based media object</h5>
                          <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>










                          <div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1>Dashboard</h1>
          </div>
          <h1 class="section-title">Wellcome to Si DOKU</h1>
                  <div class="alert alert-primary">
                      <div class="alert-title">Founder</div>
                      Si Doku Corporation.
                    </div>
                  <div class="card-body">
                    <ul class="card-card-warning">
                      <li class="media">
                        <img class="rounded-circle mr-1" src="assets/img/pp1.jpg" alt="Generic ">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">M.Faiz Fahmi</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media my-4">
                        <img class="rounded-circle mr-2" src="assets/img/dd.jpg" alt="Generic">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">Dimas Adi Nugroho</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media">
                      <img alt="image" src="assets/img/adit1.png" class="rounded-circle mr-1">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">List-based media object</h5>
                          <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>