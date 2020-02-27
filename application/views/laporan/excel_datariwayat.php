<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data Perusahaan Pengambil.xls"');
header('Cache-Control: max-age=0');
header("Expires: 0");
?>

<center><strong>Laporan Data Usulan</strong></center>
<br>

			<table border="1px black" align="left">
              <thead>
                <tr>
                    <th >No.</th>
                    <th >Bidang</th>
                    <th >Subbidang</th>
                    <th >Tahun Usulan</th>
                    <th >Nama kegiatan</th>
                    <th >Waktu Mulai</th>
                    <th >Waktu Selesai</th>
                    <th >Anggaran</th>
                    <th >Alamat Kegiatan</th>
                    <th >Kecamatan Kegiatan</th>
                    <th >Desa Kegiatan</th>
                    <th >Institusi Pengusul</th>
                    <th >Nama Pengusul</th>
                    <th >No.Telp Pengusul</th>
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
            <br>
            <br>
            <table border="1px black" align="left">
              <thead>
                <tr>
                    <th >No.</th>
                    <th >Perusahaan Pengambil</th>
                    <th >Alamat Perusahaan</th>
                    <th >Kecamatan</th>
                    <th >Desa</th>
                    <th >No.Telp Perusahaan</th>
                    <th >Email</th>
                    <th >Dana</th>
                    <th >Status Pengambilan</th>
                </tr>
              </thead>

              <tbody>
              <?php
                    $no = 0;
                foreach ($riwayat_perusahaan as $row):
                    $no++;
                ?> 
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row->nama_perusahaan;?></td>
                    <td><?php echo $row->alamat;?></td>
                    <td><?php echo $row->nama_kecamatan;?></td>
                    <td><?php echo $row->desa;?></td>
                    <td><?php echo $row->no_telp_perusahaan;?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo 'Rp.'.number_format($row->dana);?></td>
                    <th><?php
                              if($row->status_perusahaan == '0'){
                                echo 'On Proccess';
                              }else if ($row->status_perusahaan == '1'){
                                echo 'Diterima';
                              }else{
                                echo 'Ditolak';
                              }
                                ;?>
                    </th>
                <?php endforeach; ?>

              </tbody>
              
            </table>