<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data Usulan diterima Berdasarkan Bidang.xls"');
header('Cache-Control: max-age=0');
header("Expires: 0");
?>

<center><strong>Data Semua Usulan dan Perusahaan yang Diterima</strong></center>
<br>
            <table border="1px black" align="left">
              <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Bidang</th>
                    <th>Nama sub bidang</th>
                    <th>Tahun pengusulan</th>
                    <th>Nama kegiatan</th>
                    <th>Waktu Mulai Kegiatan</th>
                    <th>Waktu Selesai Kegiatan</th>
                    <th>Anggaran</th>
                    <th>Alamat Kegiatan</th>
                    <th>Kecamatan Kegiatan</th>
                    <th>Desa Kegiatan</th>
                    <th>Nama Pengusul</th>
                    <th>No.Telp Pengusul</th>
                    <th>Perusahaan Pengambil</th>
                    <th>Alamat Perusahaan</th>
                    <th>No. Telp Perusahaan</th>
                    <th>Dana</th>
                </tr>
              </thead>

              <tbody>
              <?php
                $no = 0;
                foreach ($laporan->result() as $row):
                  $no++;
              ?>
                  <tr>
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
                    <td><?php echo $row->nama_pengusul;?></td>
                    <td><?php echo $row->no_telp;?></td>
                    <td><?php echo $row->nama_perusahaan;?></td>
                    <td><?php echo $row->alamat;?></td>
                    <td><?php echo $row->no_telp_perusahaan;?></td>
                    <td><?php echo 'Rp. '.number_format($row->dana);?></td>
  
                  </tr>
                <?php endforeach; ?>
              </tbody>
              
            </table>