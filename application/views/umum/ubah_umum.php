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
         <h1>Edit User Umum</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Edit User Umum</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form role="form" method="POST" action="<?php echo site_url('upload/update');?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_umum" value="<?= $id_umum;?>">
                    <div class="card-body">
                     <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="NIK" placeholder="Masukan NIK">
                      </div>
                      <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" placeholder="Masukan Nama Depan">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Nama Jalan">  
                      </div>
                      <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="no_telpp" placeholder="No Telp">  
                      </div>
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control kode_kecamatan" name="kode_kecamatan">
                          <option  disabled selected>No Selected</option>
                            <?php foreach($kode_kecamatan as $row):?>
                            <option value="<?php echo $row->kode_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control kode_wilayah" name="kode_wilayah">
                        <option  disabled selected>No Selected</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label>Akses Sebagai</label>
                        <select class="form-control" name="level">
                        <option value=2>Umum</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="file">
                      </div>
                      <div class="row ">
                      <div class="card-footer text-left">
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <form role="form" method="POST" action="<?php echo site_url('upload/change');?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_umum" value="<?= $id_umum;?>">
                    <div class="card-body">
                      
                      <div class="form-group">
                      <label >Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div class="row ">
                      <div class="card-footer text-left">
                        <button type="submit" class="btn btn-primary">Change Password</button>

                  </div>
                  </form>
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
           
           $('.kode_kecamatan').change(function(){ 
                var id=$(this).val();
                var kode_wilayah = "<?php echo $kode_wilayah;?>";
                $.ajax({
                    url : "<?php echo site_url('upload/get_desa');?>",
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
			//load data for edit
            function get_data_edit(){
            	var id_umum = $('[name="id_umum"]').val();
            	$.ajax({
            		url : "<?php echo site_url('upload/get_data_edit');?>",
                    method : "POST",
                    data :{id_umum :id_umum},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="NIK"]').val(data[i].NIK);
                            $('[name="nama_depan"]').val(data[i].nama_depan);
                            $('[name="username"]').val(data[i].username);
                            $('[name="alamat"]').val(data[i].alamat);
                            $('[name="no_telpp"]').val(data[i].no_telpp);
                            $('[name="kode_kecamatan"]').val(data[i].kode_kecamatan).trigger('change');
                            $('[name="kode_wilayah"]').val(data[i].kode_wilayah).trigger('change');
                            $('[name="email"]').val(data[i].email);
                            $('[name="level"]').val(data[i].level);
  
                        });
                    }

            	});
            }
            
		});
	</script>

</body>
</html>