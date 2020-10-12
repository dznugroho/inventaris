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
            <h1>Data usulan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Data usulan</div>
            </div>
          </div>
          <div class="row">
          <div class="card-body" >
          <?php echo $this->session->flashdata('msg');?>
          </div>
          </div>
          <div class="row"> 
          <div class="form-group col-3">
            <select class="form-control" name="kode_bidang" id="kode_bidang">
              <option value="">Pilih Nama Bidang</option>
              <?php foreach($kode_bidang as $row):?>
              <option value="<?php echo $row->kode_bidang;?>"><?php echo $row->nama_bidang;?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group col-3">
            <form action="<?php echo site_url('pilih_usulan/cari'); ?>" method=POST>
              <select class="form-control" type="text" name="keyword" id="keyword">
                <option value="">Pilih Nama Sub Bidang</option>
              </select>
              </div>
            <div class="form-group col-3">
              <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Usulan" required> 
            </div> 
              <div class="form-group col-3">
                  <button class="btn btn-icon icon-left btn-primary" type="submit"><i class="fa fa-search"></i></button>
                  <a href="<?php echo site_url('pilih_usulan'); ?>" class="btn btn-icon icon-left btn-danger" ><i class="fas fa-sync"></i> Reset</a>
            </form>
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
                            <th>Nama Bidang</th>
                            <th>Nama sub bidang</th>
                            <th>Tahun pengusulan</th>
                            <th>Nama kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Anggaran</th>
                            <th>File</th>
                            <th>Aksi</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 0;
                              foreach ($usulan->result_array() as $row):
                                $kode_usulan=$row['kode_usulan'];
                                $nama_bidang=$row['nama_bidang'];
                                $nama_sub=$row['nama_sub'];
                                $tahun_pengusulan=$row['tahun_pengusulan'];
                                $nama_kegiatan=$row['nama_kegiatan'];
                                $waktu_mulai=$row['waktu_mulai'];
                                $waktu_selesai=$row['waktu_selesai'];
                                $anggaran=$row['anggaran'];
                                $file=$row['file'];
                                $status=$row['status'];
                                $no++;
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $nama_bidang;?></td>
                              <td><?php echo $nama_sub;?></td>
                              <td><?php echo $tahun_pengusulan;?></td>
                              <td><?php echo $nama_kegiatan;?></td>
                              <td><?php echo $waktu_mulai;?></td>
                              <td><?php echo $waktu_selesai;?></td>
                              <td><?php echo 'Rp.'.number_format($anggaran);?></td>
                              <td><?php if($file==""){
																	echo "File Tidak Tersedia";
																					
																	}else{?>
																			<button onclick='open("<?php echo site_url('Usulan/embed/'.$file);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data">LihatFile</button>
																	<?php } ?>

															</td>
																	<?php if($status == 0){ ?>
															<td>
																	<a href="<?php echo site_url('pilih_usulan/detail_ps/'.$kode_usulan);?>" class="btn btn-success">Detail</a>
															</td>
															<td>
															<button data-toggle="modal" data-target="#modal_tambah<?php echo $kode_usulan;?>" class="btn btn-primary">Pilih</button>
															</td>

															<?php }else{ ;?>
																	echo '<td><div class="badge badge-danger">Sudah Dipilih</div></td>';
																	echo '<td>&nbsp;</td>';
															<?php };?>
                            	
                            </tr>
                            <?php endforeach ;?>
                          </tbody>
                      </table>
                    </div>

                 

                  </div>
                </div>
              </div>
            </div>
            
        </section>
      </div>
      <?php
          $no = 0;
          
          foreach ($usulan->result_array() as $row):
          $kode_usulan=$row['kode_usulan'];
          $nama_bidang=$row['nama_bidang'];
          $nama_sub=$row['nama_sub'];
          
          ?>
      <div class="modal fade" id="modal_tambah<?php echo $kode_usulan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit">Masukkan Dana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'pilih_usulan/save_pilihan'?>">
                <div class="modal-body">

                    
                    <input name="kode_usulan" value="<?php echo $kode_usulan;?>" class="form-control" type="hidden" readonly>
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3">Bidang</label>
                        <div class="col-xs-8">
                            <input name="nama_bidang" value="<?php echo $nama_bidang;?>" class="form-control" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Subbidang</label>
                        <div class="col-xs-8">
                            <input name="nama_sub" value="<?php echo $nama_sub;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
                    <input name="kode_perusahaan" class="form-control" type="hidden" value="<?php echo $kode_perusahaan;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Dana Perusahaan</label>
                        <div class="col-xs-8">
                            <input name="dana" class="form-control" type="text" placeholder="Jumlah Dana">
                        </div>
                    </div>
                </div>
                <input name="status" class="form-control" type="hidden" value="1">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>

    
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
<!-- <script type="text/javascript">
$(document).ready(function() {
	        // Untuk sunting
	        $('#tambah-data').on('show.bs.modal', function (event) {
	            var button  = $(event.relatedTarget); // Tombol dimana modal di tampilkan
	            var kode_usulan    = button.data("kode_usulan");
              var modal   = $(this);

	            // Isi nilai pada field
	            modal.find('#kode_usulan').val(kode_usulan);
	            modal.find('#nama').attr("value",button.data('nama'));
	        });
	    });
</script> -->
<script type="text/javascript">
		$(document).ready(function(){

			$('#kode_bidang').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('pilih_usulan/get_sub_bidang');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kode_subbidang+'>'+data[i].nama_sub+'</option>';
                        }
                        $('#keyword').html(html);

                    }
                });
                return false;
            }); 
            
		});
	</script>
</body>
</html>
