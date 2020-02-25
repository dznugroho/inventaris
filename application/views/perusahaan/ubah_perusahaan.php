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
                  <form role="form" method="POST" action="<?php echo site_url('perusahaan/update_perusahaan');?>">
                  <input type="hidden" class="form-control" name="id" id="id" value="<?=$id?>">
                  <div class="card-body">
                    
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                      </div>
                      <div class="form-group">
                      <strong> <label>Password (Silahkan Mengisi Ulang )</label></strong>
                        <input type="text" class="form-control" name="password" placeholder="password">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kode_kecamatan" id="kode_kecamatan">
                          <option value="">No Selected</option>
                            <?php foreach($kode_kecamatan as $row):?>
                            <option value="<?php echo $row->kode_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="kode_wilayah" id="kode_wilayah">
                        <option value="">No Selected</option>
                        </select>
                      </div>
                    
                      <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="No Telp">  
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Alamat Email">
                      </div>
                      <div class="form-group">
                        <label>Akses sebagai</label>
                        <select class="form-control" name="level" id="level">
                          <option value="4">Perusahaan</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary" href="<?php echo site_url('perusahaan'); ?>">Submit</button>
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

            $('#kode_kecamatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('perusahaan/get_desa');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kode_wilayah+'>'+data[i].desa+'</option>';
                        }
                        $('#kode_wilayah').html(html);

                    }
                });
                return false;
            }); 

			//load data for edit
            function get_data_edit(){
            	var id = $('[name="id"]').val();
            	$.ajax({
            		url : "<?php echo site_url('perusahaan/get_data_edit');?>",
                    method : "POST",
                    data :{id :id},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="nama_perusahaan"]').val(data[i].nama_perusahaan);
                            $('[name="username"]').val(data[i].username);
                            $('[name="level"]').val(data[i].level);
                            $('[name="alamat"]').val(data[i].alamat);
                            $('[name="kode_kecamatan"]').val(data[i].kode_kecamatan).trigger('change');
                            $('[name="kode_wilayah"]').val(data[i].kode_wilayah).trigger('change');
                            $('[name="no_telp"]').val(data[i].no_telp_perusahaan);
                            $('[name="email"]').val(data[i].email);

                            
                        });
                    }

            	});
            }
            
		});
	</script>

</body>
</html>