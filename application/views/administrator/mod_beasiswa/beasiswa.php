            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Beasiswa</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambahbeasiswa'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Beasiswa</th>
                        <th>Deskripsi</th>
                        <th>Tahun Anggaran</th>
                        <th>Batas Anggaran</th>
                        <th>Status Pendaftaran</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php $no = 0; if (!empty($record)) : foreach ($record as $row) : $no++; ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->deskripsi ?></td>
                        <td><?= $row->anggaran ?></td>
                        <td><?= $row->batas_anggaran ?></td>
                        <td>
                            <?php
                                if ($row->status_pendaftaran == 0) echo 'Tutup';
                                if ($row->status_pendaftaran == 1) echo 'Tahap 1';
                                if ($row->status_pendaftaran == 2) echo 'Tahap 2';
                            ?>
                        </td>
                        <td class="text-center">
                          <center class="inline">
                            <a href="<?= base_url('administrator/editbeasiswa/').$row->id ?>" class='btn btn-warning btn-xs' title='Edit Beasiswa'><span class='glyphicon glyphicon-edit'></span></a>
                          </center>
                          <center class="inline">
                            <a class='btn btn-danger btn-xs' title='Hapus Data' href="<?= base_url().$this->uri->segment(1)."/hapusbeasiswa/".$row->id ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                          </center>
                        </td>
                      </tr>
                  <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>