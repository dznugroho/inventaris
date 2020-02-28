<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; <?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

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
         <h1>Kelola Berkas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Berkas</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body" >
                  <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                  </div>
                  <form role="form" method="POST" action="<?php echo site_url('usulan/update_usulan/'.$cekid['kode_usulan']);?>" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="kode_usulan" value="<?=$kode_usulan?>">
                  <div class="card-body">
                      <div class="form-group">
                        <label>Bidang Kegiatan</label>
                        <select class="form-control kode_bidang" name="kode_bidang">
                        <option value="">No Selected</option>
                          <?php foreach($kode_bidang as $row):?>
                          <option value="<?php echo $row->kode_bidang;?>"><?php echo $row->nama_bidang;?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Sub Bidang Kegiatan</label>
                        <select class="form-control kode_subbidang" name="kode_subbidang">
                          <option value="">No Selected</option>
                        </select>
                      </div>
  
                      <div class="form-group">
                      <label>Tahun Pengusulan</label>
                      <input type="number" class="form-control" name="tahun_pengusulan" placeholder="Tahun Pengusulan">
                      </div>
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                      <div class="form-group">
                        <label>Waktu Mulai Pelaksanaan</label>
                        <input type="text" class="form-control datepicker" name="waktu_mulai" placeholder="Waktu Mulai">
                      </div>
                      <div class="form-group">
                        <label>Waktu Selesai Pelaksanaan</label>
                        <input type="text" class="form-control datepicker" name="waktu_selesai" placeholder="Waktu Selesai">
                      </div>
                      <div class="form-group">
                        <label>Anggaran</label>
                        <input type="number" class="form-control" name="anggaran" placeholder="Anggaran">
                      </div>
                      <div class="form-group">
                        <label>Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="alamat_kegiatan" id="alamat_kegiatan" placeholder="Nama Jalan">  
                      </div>
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control kode_kecamatan" name="kode_kecamatan">
                          <option value="">No Selected</option>
                            <?php foreach($kode_kecamatan as $row):?>
                            <option value="<?php echo $row->kode_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control kode_wilayah" name="kode_wilayah" >
                        <option value="">No Selected</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label>Deskripsi Kegiatan</label>
                      <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Kegiatan"></textarea>
                      </div>
                      <div class="section-title mt-0">Data Institusi </div>
                      <div class="form-group">
                        <label>Institusi Pengusul</label>
                        <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi">  
                      </div>
                      <div class="form-group">
                        <label>Alamat Institusi</label>
                        <input type="text" class="form-control" name="alamat_institusi" placeholder="Nama Jalan">
                      </div>
                      <div class="form-group">
                        <label>Kecamatan Institusi</label>
                        <select class="form-control kode_k" name="kode_k">
                        <option value="">No Selected</option>
                          <?php foreach($kode_k as $row):?>
                          <option value="<?php echo $row->kode_k;?>"><?php echo $row->nama_k;?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Desa Institusi</label>
                        <select class="form-control kode_w" name="kode_w">
                        <option value="">No Selected</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama Pengusul</label>
                        <input type="text" class="form-control" name="nama_pengusul" placeholder="Nama Pengusul">
                      </div>
                      <div class="form-group">
                        <label>CP Pengusul</label>
                        <input type="number" class="form-control" name="no_telp" placeholder="No. Telp">
                      </div>
                      <div class="form-group">
                        <label>File</label> <span class="text-danger mb-1">*file harus PDF </span>
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
			//call function get data edit
			      get_data_edit();

            $('.kode_bidang').change(function(){ 
                var id=$(this).val();
                var kode_subbidang = "<?php echo $kode_subbidang;?>";
                $.ajax({
                    url : "<?php echo site_url('usulan/get_sub_bidang');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="kode_subbidang"]').empty();
 
                        $.each(data, function(key, value) {
                            if(kode_subbidang==value.kode_subbidang){
                                $('select[name="kode_subbidang"]').append('<option value="'+ value.kode_subbidang +'" selected>'+ value.nama_sub +'</option>').trigger('change');
                            }else{
                                $('select[name="kode_subbidang"]').append('<option value="'+ value.kode_subbidang +'">'+ value.nama_sub +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 

            $('.kode_kecamatan').change(function(){ 
                var id=$(this).val();
                var kode_wilayah = "<?php echo $kode_wilayah;?>";
                $.ajax({
                    url : "<?php echo site_url('usulan/get_desa');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="kode_wilayah"]').empty();
 
                        $.each(data, function(key, value) {
                            if(kode_wilayah==value.kode_wilayah){
                                $('select[name="kode_wilayah"]').append('<option value="'+ value.kode_wilayah +'" selected>'+ value.desa +'</option>').trigger('change');
                            }else{
                                $('select[name="kode_wilayah"]').append('<option value="'+ value.kode_wilayah +'">'+ value.desa +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 


            	$('.kode_k').change(function(){ 
                var id=$(this).val();
                var kode_w = "<?php echo $kode_w;?>";
                $.ajax({
                    url : "<?php echo site_url('usulan/get_dk');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="kode_w"]').empty();
 
                        $.each(data, function(key, value) {
                            if(kode_w==value.kode_w){
                                $('select[name="kode_w"]').append('<option value="'+ value.kode_w +'" selected>'+ value.nama_d +'</option>').trigger('change');
                            }else{
                                $('select[name="kode_w"]').append('<option value="'+ value.kode_w +'">'+ value.nama_d +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 


			//load data for edit
            function get_data_edit(){
            	var kode_usulan = $('[name="kode_usulan"]').val();
            	$.ajax({
            		url : "<?php echo site_url('usulan/get_data_edit');?>",
                    method : "POST",
                    data :{kode_usulan :kode_usulan},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="kode_bidang"]').val(data[i].kode_bidang).trigger('change');
                            $('[name="kode_subbidang"]').val(data[i].kode_subbidang).trigger('change');
                            $('[name="tahun_pengusulan"]').val(data[i].tahun_pengusulan);
                            $('[name="nama_kegiatan"]').val(data[i].nama_kegiatan);
                            $('[name="waktu_mulai"]').val(data[i].waktu_mulai);
                            $('[name="waktu_selesai"]').val(data[i].waktu_selesai);
                            $('[name="anggaran"]').val(data[i].anggaran);
                            $('[name="alamat_kegiatan"]').val(data[i].alamat_kegiatan);
                            $('[name="kode_kecamatan"]').val(data[i].kode_kecamatan).trigger('change');
                            $('[name="kode_wilayah"]').val(data[i].kode_wilayah).trigger('change');
                            $('[name="deskripsi"]').val(data[i].deskripsi);
                            $('[name="nama_institusi"]').val(data[i].nama_institusi);
                            $('[name="alamat_institusi"]').val(data[i].alamat_institusi);
                            $('[name="kode_k"]').val(data[i].kode_k).trigger('change');
                            $('[name="kode_w"]').val(data[i].kode_w).trigger('change');
                            $('[name="nama_pengusul"]').val(data[i].nama_pengusul);
                            $('[name="no_telp"]').val(data[i].no_telp);
                            $('[name="file"]').val(data[i].file);
                            
                        });
                    }

            	});
            }
            
		});
	</script>

</body>
</html>