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
                              foreach ($detail_riwayat->result() as $row):
                            ?>
                          <tr>
                            <th colspan="3">Kode Usulan</th>                             
                              <td><?php echo $row->kode_usulan;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Nama Bidang</th>
                              <td><?php echo $row->nama_bidang;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Nama Sub Bidang</th>
                              <td><?php echo $row->nama_sub;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Tahun Pengusulan</th>
                              <td><?php echo $row->tahun_pengusulan;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Nama Kegiatan</th>
                              <td><?php echo $row->nama_kegiatan;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Waktu Mulai</th>
                              <td><?php echo $row->waktu_mulai;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">Waktu Selesai</th>
                              <td><?php echo $row->waktu_selesai;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Anggaran</th>
                              <td><?php echo number_format($row->anggaran);?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Alamat Kegiatan</th>
                              <td><?php echo $row->alamat_kegiatan;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Kecamatan</th>
                              <td><?php echo $row->nama_kecamatan;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Desa kegiatan</th>
                              <td><?php echo $row->desa;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Deskripsi Kegiatan</th>
                              <td><?php echo $row->deskripsi;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Nama Institusi</th>
                              <td><?php echo $row->nama_institusi;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Alamat Instusi</th>
                              <td><?php echo $row->alamat_institusi;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Kecamatan Institusi</th>
                              <td><?php echo $row->nama_k;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Desa Institusi</th>
                              <td><?php echo $row->nama_d;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">Nama Pengusul</th>
                              <td><?php echo $row->nama_pengusul;?></td>
                              </tr>
                          <tr>
                            <th colspan="3">CP Pengusul</th>
                              <td><?php echo $row->no_telp;?></td>
                          </tr>
                          <tr>
                            <th colspan="3">File</th>
                              <td><?php ?>
			                    <button onclick='open("<?php echo site_url('Usulan/embed/'.$row->file);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data">Lihat File</button>
			           	        <?php   ;?>
                              </td>
                            </tr>
                    
                          <?php endforeach;?>
                      </table>
                    <div class="table-responsive">
                      <table class="table table-striped" id="mytable">
                      <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Dana Perusahaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>&nbsp;</th>

                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 0;
                              foreach ($riwayat_perusahaan->result_array() as $row):
                                $kode_pilih=$row['kode_pilih'];
                                $nama_perusahaan=$row['nama_perusahaan'];
                                $alamat=$row['alamat'];
                                $nama_kecamatan=$row['nama_kecamatan'];
                                $desa=$row['desa'];
                                $no_telp_perusahaan=$row['no_telp_perusahaan'];
                                $email=$row['email'];
                                $dana=$row['dana'];
                                $status_perusahaan=$row['status_perusahaan'];
                                $no++;
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $nama_perusahaan;?></td>
                              <td><?php echo $alamat;?></td>
                              <td><?php echo $nama_kecamatan;?></td>
                              <td><?php echo $desa;?></td>
                              <td><?php echo $no_telp_perusahaan;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo 'Rp '.number_format($dana);?></td>
                              <td><?php
                              if($status_perusahaan == '0'){
                                echo  '<div class="badge badge-warning">On Process</div>';
                              }else if ($status_perusahaan == '1'){
                                echo '<div class="badge badge-success">Accepted</div>';
                              }else{
                                echo '<div class="badge badge-danger">Declined</div>';
                              }
                                ;?>
                              </td>
                              <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?php echo $kode_pilih;?>"><i class="far fa-edit"></button></i>  
                              </td>
                              <td>
                              <a href="<?php echo site_url('riwayat_pilihan/delete/'.$kode_pilih);?>" class="btn btn-danger"><i class="fas fa-trash"></a></i> 
                              </td>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                      </table>
                    </div>
                    <div class="card-footer text-right">

                <?php
                              foreach ($detail_riwayat->result_array() as $row):
                                $kode_usulan =$row['kode_usulan'];
                            ?>

                            <?php endforeach;?>

              <a target="_blank" class="btn btn-success" href="<?php echo base_url('riwayat_pilihan/print/'.$kode_usulan);?>"><i class="fa fa-print"></i> Print</a>
            <a class="btn btn-icon icon-left btn-primary" href="<?php echo base_url('riwayat_pilihan/excel/'.$kode_usulan);?>"><i class="fa fa-download"></i> Excel</a>

                  

                      <a href="<?php echo site_url('riwayat_pilihan');?>" class="btn btn-danger">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>

      <?php 
        foreach($riwayat_perusahaan->result_array() as $i):
            $kode_pilih=$i['kode_pilih'];
            $nama_perusahaan=$i['nama_perusahaan'];

        ?>

        <div class="modal fade" id="modal_edit<?php echo $kode_pilih;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit">Edit Status Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'riwayat_pilihan/edit_status'?>">
                <div class="modal-body">

                    
                  <input name="kode_pilih" value="<?php echo $kode_pilih;?>" class="form-control" type="hidden" placeholder="Kode Barang..." readonly>
  
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Perusahaan</label>
                        <div class="col-xs-8">
                            <input name="nama_perusahaan" value="<?php echo $nama_perusahaan;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status Perusahaan</label>
                        <div class="col-xs-8">
                             <select name="status_perusahaan" class="form-control" required>
                                <option value="1">Accepted</option>
                                <option value="2">Declined</option>
                             </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
</body>
</html>