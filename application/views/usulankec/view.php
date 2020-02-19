            <div class="table-responsive">
                      <table class="table table-striped" id="mytable">
                        <thead>
                          <tr>
                          <th>No.</th>
                            <th>Kode Usulan</th>
                            <th>Nama Bidang</th>
                            <th>Nama sub bidang</th>
                            <th>Tahun pengusulan</th>
                            <th>Nama kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Anggaran</th>
                            <th>File</th>
                            <th>&nbsp;</th>
                            <th>Aksi</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                              $no = 0;
                              foreach ($usulankec->result() as $row):
                                $no++;
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $row->kode_usulan;?></td>
                              <td><?php echo $row->nama_bidang;?></td>
                              <td><?php echo $row->nama_sub;?></td>
                              <td><?php echo $row->tahun_pengusulan;?></td>
                              <td><?php echo $row->nama_kegiatan;?></td>
                              <td><?php echo $row->waktu_mulai;?></td>
                              <td><?php echo $row->waktu_selesai;?></td>
                              <td><?php echo number_format($row->anggaran);?></td>
                              <td><?php if($row->file==""){
							$fill = $row->file;
							$aksi = site_url('usulan/add_file');
							$tampil = 
<<<HEREDOCS
			              	<form action="$aksi" method="post" enctype="multipart/form-data" >
                <input type="file" name="file">             
								<input type="hidden" name="kode_usulan" value="$row->kode_usulan">
								<br>
								<button type="submit" class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data"> Tambah File</button>
							</form>
HEREDOCS;
						echo $tampil;
			            }else{?>
			              <button onclick='open("<?php echo site_url('Usulan/embed/'.$row->file);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data">Lihat File</button>
			           	<?php } ?>

                              </td>
                              <td>
                              <a href="<?php echo site_url('usulankec/detail_usulan/'.$row->kode_usulan);?>" class="btn btn-success"><i class="fas fa-search-plus"></a></i>
                              </td>
                              <td>
                              <a href="<?php echo site_url('usulankec/get_edit/'.$row->kode_usulan);?>" class="btn btn-primary"><i class="far fa-edit"></a></i> 
                              </td>
                              <td>
                              <a href="<?php echo site_url('usulankec/delete/'.$row->kode_usulan);?>" class="btn btn-danger"><i class="fas fa-trash"></a></i>
                              </td>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                      </table>
                    </div>