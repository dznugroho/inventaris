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
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>
                            <th>Anggaran</th>

                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no = 0;
                              foreach ($accepted() as $row):
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
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              
                              
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                      </table>