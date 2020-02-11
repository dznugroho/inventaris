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
              <div class="breadcrumb-item">Data usulan</div>
            </div>
          </div>
          <div class="row">
          <div class="card-body" >
          <?php echo $this->session->flashdata('msg');?>
          <a href="<?php echo site_url('usulan/add_new'); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah</a>
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
                            <th>Kode usulan</th>
                            <th>Nama Bidang</th>
                            <th>Nama sub bidang</th>
                            <th>Tahun pengusulan</th>
                            <th>Nama kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Anggaran</th>
                            <th>Alamat kegiatan</th>
                            <th>Kecamatan</th>
                            <th>Desa kegiatan</th>
                            <th>Deskripsi Kegiatan</th>
                            <th>Nama Institusi</th>
                            <th>Alamat Instusi</th>
                            <th>Kecamatan Institusi</th>
                            <th>Desa Institusi</th>
                            <th>Nama Pengusul</th>
                            <th>CP Pengusul</th>
                            <th>File</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 0;
                              foreach ($usulan->result() as $row):
                                $no++;
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $row->kode_usulan;?></td>
                              <td><?php echo $row->nama_bidang;?></td>
                              <td><?php echo $row->nama_sub;?></td>
                              <td><?php echo $row->tahun_pengusulan;?></td>
                              <td><?php echo $row->nama_kegiatan;?></td>
                              <td><?php echo $row->waktu_mulai;?></td>
                              <td><?php echo $row->waktu_selesai;?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo $row->alamat_kegiatan;?></td>
                              <td><?php echo $row->nama_kecamatan;?></td>
                              <td><?php echo $row->desa;?></td>
                              <td><?php echo $row->deskripsi;?></td>
                              <td><?php echo $row->nama_institusi;?></td>
                              <td><?php echo $row->alamat_institusi;?></td>
                              <td><?php echo $row->nama_k;?></td>
                              <td><?php echo $row->nama_d;?></td>
                              <td><?php echo $row->nama_pengusul;?></td>
                              <td><?php echo $row->no_telp;?></td>
                              <td><?php if($row->file==""){
							$fill = $row->file;
							$aksi = site_url('usulan/add_file');
							$tampil = 
<<<HEREDOCS
			              	<form action="$aksi" method="post" enctype="multipart/form-data" >
                <input type="file" name="file">             
								<input type="hidden" name="kode_usulan" value="$row->kode_usulan">
								<br>
								<button type="submit" class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data"> Tambah File</button>
							</form>
HEREDOCS;
						echo $tampil;
			            }else{?>
			              <button onclick='open("<?php echo site_url('Usulan/embed/'.$row->file);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data">Lihat File</button>
			           	<?php } ?>

                              </td>
                              <td>
                                <a href="<?php echo site_url('usulan/get_edit/'.$row->kode_usulan);?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="<?php echo site_url('usulan/delete/'.$row->kode_usulan);?>" class="btn btn-sm btn-danger">Delete</a>
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