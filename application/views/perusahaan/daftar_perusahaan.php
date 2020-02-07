<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>STISLA</title>

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
            <h1>Data usulan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data Perusahaan</div>
            </div>
          </div>
          <div class="row">
          <div class="card-body" >
          <?php echo $this->session->flashdata('msg');?>
          <a href="<?php echo site_url('perusahaan/add_new'); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="mytable">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Nama Perusahaan</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>

                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 0;
                              foreach ($perusahaan->result() as $row):
                                $no++;
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $row->id;?></td>
                              <td><?php echo $row->nama_perusahaan;?></td>
                              <td><?php echo $row->username;?></td>
                              <td><?php echo $row->password;?></td>
                              <td><?php echo $row->level;?></td>
                              <td><?php echo $row->alamat;?></td>
                              <td><?php echo $row->nama_kecamatan;?></td>
                              <td><?php echo $row->desa;?></td>
                              <td><?php echo $row->no_telp;?></td>
                              <td><?php echo $row->email;?></td>
                              <td>
                                <a href="<?php echo site_url('perusahaan/get_edit/'.$row->id);?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="<?php echo site_url('perusahaan/delete/'.$row->id);?>" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
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