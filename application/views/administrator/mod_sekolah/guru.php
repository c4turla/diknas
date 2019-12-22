            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Guru</h3>
                  <div class="col-xs-12 text-right"> 
                  <form action="<?= base_url().$this->uri->segment(1).'/hapussemuaguru' ?>" method="POST">
                    <input type="hidden" name="delete" value="delete">
                    <button type="submit" class='btn btn-danger btn-sm pull-right' onclick="return confirm('Apa anda yakin untuk hapus semua data ini?')" style="margin-left: 4px">Kosongkan Data</button>
                  </form>                  
                  <a class='btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambahguru'>Tambahkan Data</a>
                  <a class='btn btn-success btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/downloadguru'>Download Data</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>Nama</th>
                        <th>Jenis PTK</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Gol</th>
                        <th>Pend Terakhir</th>
                        <th>Sekolah</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php $no = 0; if (!empty($record)) : foreach ($record as $row) : $no++; ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nip ?></td>
                        <td><?= $row->nuptk ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->jenis_ptk ?></td>
                        <td><?= $row->agama ?></td>
                        <td><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $row->golongan ?></td>
                        <td><?= $row->pend_terakhir ?></td>
                        <td><?= $row->nama_sekolah ?></td>
                        <td class="text-center">
                          <center class="inline">
                            <a href="<?= base_url('administrator/editguru/').$row->nip ?>" class='btn btn-success btn-xs' title='Edit Data Guru'><span class='glyphicon glyphicon-edit'></span></a>
                          </center>
                          <center class="inline">
                            <a class='btn btn-danger btn-xs' title='Hapus Data' href="<?= base_url().$this->uri->segment(1)."/hapusguru/".$row->nip ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                          </center>
                        </td>
                      </tr>
                  <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>