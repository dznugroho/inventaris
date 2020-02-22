<!DOCTYPE html>
<html><head>
  <title></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">  

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
</head><body>
<div class="row">
<div class="card-body">
<h3 style="text-align: center">Data Usulan Diterima</h3>
</div>               
</div>
                    <div class="table-responsive">           
                      <table border="1" cellpadding="8">
                          <thead><tr>
                            <th>No.</th>
                            <th>Nama Bidang</th>
                            <th>Nama sub bidang</th>
                            <th>Tahun pengusulan</th>
                            <th>Nama kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Anggaran</th>
                            <th>Alamat Kegiatan</th>
                            <th>Kecamatan Kegiatan</th>
                            <th>Desa Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Institusi Pengusul</th>
                            <th>Alamat Institusi</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Nama Pengusul</th>
                            <th>No.Telp Pengusul</th>
                            <th>Perusahaan Pengambil</th>
                            <th>Alamat Perusahaan</th>
                            <th>No. Telp Perusahaan</th>
                            <th>Email</th>
                            <th>Dana</th>
                          </tr></thead>
                        
                            <?php
                              $no = 0;
                              foreach ($accepted as $row):
                                $no++;
                            ?>
                            <tbody><tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $row->nama_bidang;?></td>
                              <td><?php echo $row->nama_sub;?></td>
                              <td><?php echo $row->tahun_pengusulan;?></td>
                              <td><?php echo $row->nama_kegiatan;?></td>
                              <td><?php echo $row->waktu_mulai;?></td>
                              <td><?php echo $row->waktu_selesai;?></td>
                              <td><?php echo 'Rp. '.number_format($row->anggaran);?></td>
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
                              <td><?php echo $row->nama_perusahaan;?></td>
                              <td><?php echo $row->alamat;?></td>
                              <td><?php echo $row->no_telp_perusahaan;?></td>
                              <td><?php echo $row->email;?></td>
                              <td><?php echo 'Rp. '.number_format($row->dana);?></td>
                            </tr></tbody>
                            <?php endforeach;?>
                          
                      </table>
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

</body></html> 