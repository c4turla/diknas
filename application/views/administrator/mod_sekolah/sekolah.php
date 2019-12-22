            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Sekolah</h3>
                  <form action="<?= base_url().$this->uri->segment(1).'/hapussemuasekolah' ?>" method="POST">
                  <input type="hidden" name="delete" value="delete">
                    <button type="submit" class='pull-right btn btn-danger btn-sm' onclick="return confirm('Apa anda yakin untuk hapus semua data ini?')" href='<?php echo base_url().$this->uri->segment(1); ?>/hapussemuasekolah' style="margin-left: 10px">Kosongkan Data</button>
                  </form>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambahsekolah'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Foto</th>
                        <th>NPSN</th>
                        <th>Nama Sekolah</th>
                        <th>Tingkat</th>
                        <th>Status</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php $no = 0; if (!empty($record)) : foreach ($record as $row) : $no++; ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td>
                          <img src="<?= $row->foto != '' ? base_url('asset/foto_sekolah/').$row->foto : base_url('asset/foto_default/school.svg') ?>" alt="foto sekolah" width="80">
                        </td>
                        <td><?= $row->npsn ?></td>
                        <td><?= $row->nama ?></td>
                        <td>
                          <?php
                            if ($row->tingkat == 'sd') {
                              echo 'SD';
                            }

                            if ($row->tingkat == 'smp') {
                              echo 'SMP';
                            }

                            if ($row->tingkat == 'paud') {
                              echo 'TK/PAUD';
                            }
							
						  	            if ($row->tingkat == 'pkbm') {
                              echo 'PKBM';
                            }

                            if ($row->tingkat == 'lembaga_kursus') {
                              echo 'Lembaga Kursus';
                            }
                          ?>
                        </td>
                        <td style="text-transform: capitalize"><?= $row->status ?></td>
                        <td><?= $row->desa ?></td>
                        <td><?= $row->kecamatan ?></td>
                        <td class="text-center">
                          <center class="inline">
                            <a href="<?= base_url('administrator/editsekolah/').$row->npsn ?>" class='btn btn-warning btn-xs' title='Edit Sekolah'><span class='glyphicon glyphicon-edit'></span></a>
                          </center>
                          <center class="inline">
                            <a class='btn btn-danger btn-xs' title='Hapus Data' href="<?= base_url().$this->uri->segment(1)."/hapussekolah/".$row->npsn ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                          </center>
                        </td>
                      </tr>
                  <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Unggah Foto</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('administrator/unggahFotoSekolah') ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                            <input type="hidden" name="npsn" id="npsn" required>
                            <label for="file">Unggah Foto</label>
                            <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png, .svg, .PNG, .JPG, .JPEG" required>
                            <p class="help-block">Gunakan format .jpg, .jpeg, .png</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                $(document).on("click", "#trigger-modal", function () {
                    var npsn = $(this).data('id');
                    $('#npsn').val(npsn);
                });
              </script>