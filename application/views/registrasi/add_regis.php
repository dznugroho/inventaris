<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; <?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5" style="background" >
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url()?>assets/img/stisla-fill.svg" alt="logo" width="100" >
            </div>
            <div class="row">
          <div class="card-body" >
          <?php echo $this->session->flashdata('msg');?>
          </div>
          </div>
            <div class="card card-primary">
              <div class="card-header"> <form role="form" method="POST" action="<?php echo base_url();?>registrasi/regist" enctype="multipart/form-data">
              <h4>Register</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama_depan">First Name</label>
                      <input id="nama_depan" type="text" class="form-control" name="nama_depan" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="nama_belakang">Last Name</label>
                      <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input id="NIK" type="number" class="form-control" name="NIK" placeholder="Masukkan NIK" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Masukkan Email" required >
                    <div class="invalid-feedback">
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="password">Pasword</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                    <div class="invalid-feedback">
                      </div>
                  </div>
                  <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Nama Jalan" required>  
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kode_kecamatan" id="kode_kecamatan" required>
                          <option value="">No Selected</option>
                            <?php foreach($kode_kecamatan as $row):?>
                            <option value="<?php echo $row->kode_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label>Desa</label>
                        <select class="form-control" name="kode_wilayah" id="kode_wilayah" required>
                        <option value="">No Selected</option>
                        </select>
                      </div> 
                      <div class="form-group col-6">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                  </div>
                  
                </form>
                <a href="<?php echo site_url('login');?>" class="btn btn-primary">Kembali</a>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
            
          </div>
        </div>
      </div>
      
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>
  <script type="text/javascript">
		$(document).ready(function(){

			$('#kode_kecamatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('registrasi/get_desa');?>",
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
            
		});
	</script>
</body>
</html>
