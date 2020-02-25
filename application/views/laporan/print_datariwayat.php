<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">
 
<div class="card-header text-center"><strong>
        Laporan Data Usulan<hr>
      </strong></div>
      </div>
        <div class="card-body">

            <table class="table table-hover table-bordered" cellspacing="0">
              <thead class="text-center">
                <tr class="text-center card-header">
                    <th rowspan="3">No.</th>
                    <th rowspan="3">Bidang</th>
                    <th rowspan="3">Subbidang</th>
                    <th rowspan="3">Tahun Usulan</th>
                    <th rowspan="3">Nama kegiatan</th>
                    <th rowspan="3">Waktu Mulai</th>
                    <th rowspan="3">Waktu Selesai</th>
                    <th rowspan="3">Anggaran</th>
                    <th rowspan="3">Alamat Kegiatan</th>
                    <th rowspan="3">Kecamatan Kegiatan</th>
                    <th rowspan="3">Desa Kegiatan</th>
                    <th rowspan="3">Institusi Pengusul</th>
                    <th rowspan="3">Nama Pengusul</th>
                    <th rowspan="3">No.Telp Pengusul</th>
                </tr>
              </thead>

              <tbody>
              <?php
                    $no = 0;
                foreach ($riwayat->result() as $row):
                    $no++;
                ?> 
                  <tr>
                    <td class="text-center"><?php echo $no;?></td>
                    <td width="150">
                        <?php echo $row->nama_bidang;?>
                    </td>
                    <td><?php echo $row->nama_sub;?></td>
                    <td class="text-center"><?php echo $row->tahun_pengusulan;?></td>
                    <td><?php echo $row->nama_kegiatan;?></td>
                    <td><?php echo $row->waktu_mulai;?></td>
                    <td><?php echo $row->waktu_selesai;?></td>
                    <td><?php echo 'Rp.'.number_format($row->anggaran);?></td>
                    <td><?php echo $row->alamat_kegiatan;?></td>
                    <td><?php echo $row->nama_kecamatan;?></td>
                    <td><?php echo $row->desa;?></td>
                    <td><?php echo $row->nama_institusi;?></td>
                    <td><?php echo $row->nama_pengusul;?></td>
                    <td><?php echo $row->no_telp;?></td>
                    </tr>

                    <?php endforeach; ?>
              </tbody>
              
            </table>
            <table class="table table-hover table-bordered" cellspacing="0">
              <thead class="text-center">
                <tr class="text-center card-header">
                    <th rowspan="3">No.</th>
                    <th rowspan="3">Perusahaan Pengambil</th>
                    <th rowspan="3">Alamat Perusahaan</th>
                    <th rowspan="3">Kecamatan</th>
                    <th rowspan="3">Desa</th>
                    <th rowspan="3">No.Telp Perusahaan</th>
                    <th rowspan="3">Email</th>
                    <th rowspan="3">Dana</th>
                    <th rowspan="3">Status Pengambilan</th>
                </tr>
              </thead>

              <tbody>
              <?php
                    $no = 0;
                foreach ($riwayat_perusahaan as $row):
                    $no++;
                ?> 
                  <tr>
                    <td class="text-center"><?php echo $no;?></td>
                    <td><?php echo $row->nama_perusahaan;?></td>
                    <td><?php echo $row->alamat;?></td>
                    <td><?php echo $row->nama_kecamatan;?></td>
                    <td><?php echo $row->desa;?></td>
                    <td><?php echo $row->no_telp_perusahaan;?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo 'Rp.'.number_format($row->dana);?></td>
                    <td><?php
                              if($row->status_perusahaan == '0'){
                                echo  'On Proccess';
                              }else if ($row->status_perusahaan == '1'){
                                echo 'Diterima';
                              }else{
                                echo 'Ditolak';
                              }
                                ;?>
                    </td>
                <?php endforeach; ?>

              </tbody>
              
            </table>
<script type="text/javascript">
var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);

window.print();</script>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>