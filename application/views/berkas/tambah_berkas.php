<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>node_modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/selectric/public/selectric.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg">
      </div>

        <?php $this->load->view('include/header.php')?>

        <?php $this->load->view('include/sidebar.php')?>              

        <div class="main-content">
         <section class="section">
         <div class="section-header">
         <h1>Berkas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Berkas</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form role="form" method="POST" action="<?php echo site_url('berkas/save');?>">
                    <div class="card-header">
                      <h4>Tambah Berkas</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Bidang Kegiatan</label>
                        <select class="form-control" name="bidang" id="bidang">
                        <option value="">No Selected</option>
                              <?php
                              foreach ($dropdown->result() as $baris) {
                                echo "<option value='".$baris->kode_bidang."'>".$baris->nama_bidang."</option>";
                              
                              }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>SubBidang Kegiatan</label>
                        <select class="form-control" name="subbidang" id="subbidang">
                          <option value="">No Selected</option>
                        </select>
                      </div>
  
                      <div class="form-group">
                      <label>Tahun Pengusulan</label>
                      <input type="text" class="form-control datepicker" name="tahun_pengusulan">
                    </div>
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                      <div class="form-group">
                        <label>Anggaran</label>
                        <input type="text" class="form-control" name="anggaran" placeholder="Anggaran">
                      </div>
                      <div class="form-group">
                        <label>Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="alamat_kegiatan" id="alamat_kegiatan" placeholder="Nama Jalan">  
                      </div>
                      <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="desa_kegiatan" id="desa_kegiatan">
                        <option value="">No Selected</option>
                              <?php
                              foreach ($alamat->result() as $baris) {
                                echo "<option value='".$baris->kode_wilayah."'>".$baris->desa."</option>";
                              
                              }
                            ?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                          <option value="">No Selected</option>
                        </select>
                      </div>
                      
                      <div class="section-title mt-0">INSTITUSI </div>
                      <div class="form-group">
                        <label>Institusi Pengusul</label>
                        <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi">  
                      </div>
                      <div class="form-group">
                        <label>Alamat Institusi</label>
                        <input type="text" class="form-control" name="alamat_institusi" placeholder="Nama Jalan">
                      </div>
                      <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="desa_institusi" id="desa_institusi">
                        <option value="">No Selected</option>
                              <?php
                              foreach ($alamat->result() as $baris) {
                                echo "<option value='".$baris->kode_wilayah."'>".$baris->desa."</option>";
                              
                              }
                            ?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan_institusi" id="kecamatan_institusi">
                          <option value="">No Selected</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="No. Telp">
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="file">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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

  <!-- JS Libraies -->
  
  <script src="<?= base_url()?>node_modules/cleave.js/dist/cleave.min.js"></script>
  <script src="<?= base_url()?>node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?= base_url()?>node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url()?>node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url()?>node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?= base_url()?>node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?= base_url()?>node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?= base_url()?>node_modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url()?>node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url()?>assets/js/page/forms-advanced-forms.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
		$('#bidang').on('change', function(){
			var kode_bidang = $('#bidang').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url('index.php/berkas/tampil_chained') ?>',
			    data: { 'id' : kode_bidang },
				success: function(data){
				    $("#subbidang").html(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#desa_kegiatan').on('change', function(){
			var kode_wilayah = $('#desa_kegiatan').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url('index.php/berkas/tampil_lokasi') ?>',
			    data: { 'id' : kode_wilayah },
				success: function(data){
				    $("#kecamatan").html(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#desa_institusi').on('change', function(){
			var kode_wilayah = $('#desa_institusi').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url('index.php/berkas/tampil_lokasi') ?>',
			    data: { 'id' : kode_wilayah },
				success: function(data){
				    $("#kecamatan_institusi").html(data);
				}
			})
		})
	})
</script>

</body>
</html>