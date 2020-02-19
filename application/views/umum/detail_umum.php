<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">  

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
            <h1>Detail Usulan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Detail usulan</div>
            </div>
          </div>
          
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                      <table class="table table-striped" id="mytable">
                            <?php
                              foreach ($detail_umum->result() as $row):
                            ?>
                          <tr>
                            <th colspan="3">NIK</th>                             
                              <td><?php echo $row->NIK;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Nama Depan</th>
                              <td><?php echo $row->nama_depan;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Nama Belakang</th>
                              <td><?php echo $row->nama_belakang;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Password</th>
                              <td><?php echo $row->password;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Alamat</th>
                              <td><?php echo $row->alamat;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Kecamatan</th>
                              <td><?php echo $row->nama_kecamatan;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Desa</th>
                              <td><?php echo $row->desa;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Email</th>
                              <td><?php echo $row->email;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Akses Sebagai</th>
                              <td><?php echo $row->nama_akses;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Foto</th>
                            <?php echo "<td> 
                              <img src='".base_url("images/".$row->foto)."' width='600' height='400'>
                             </td>" ;?>
                              </tr>
                         
                          <?php endforeach;?>
                      </table>
                    <div class="card-footer text-right">
                      <a href="<?php echo site_url('upload');?>" class="btn btn-primary">Kembali</a>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
		$(document).ready(function(){
			$('#mytable').DataTable();
		});
	</script>
</body>
</html>