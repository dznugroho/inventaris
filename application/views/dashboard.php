<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">  
  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
    
      <?php $this->load->view('include/header.php')?>

      <?php $this->load->view('include/sidebar.php')?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1>Dashboard</h1>
          </div>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    
        <?php $this->load->view('include/footer.php')?>

</div>
</div>
    </div>
  </div>

 
<script src="<?= base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url()?>assets/js/stisla.js"></script>

<!-- Template JS File -->
  <script src="<?= base_url()?>node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url()?>assets/js/page/modules-datatables.js"></script>
  <script type="text/javascript">
    var table;
    $(document).ready(function() {
 
        //datatables
        table = $('#table').DataTable({ 
 
            "processing": true, 
            "serverSide": true,  
            "order": [], 
            "ajax": {
                "url": "<?= base_url()?>Kecamatan/datakecamatan",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
 
</script>
</body>
</html>
</body>
</html>


