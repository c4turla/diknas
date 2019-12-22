            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nomor Induk Mahasiswa</th>
                        <th>Nama</th>
                        <th>Asal Kampus</th>
                        <th>Tahun Anggaran</th>
                        <th>Tahap</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php $no = 0; if (!empty($record)) : foreach ($record as $row) : $no++; ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->asal_kampus ?></td>
                        <td><?= $row->anggaran ?></td>
                        <td><?= $row->tahap ?></td>
                        <td>
                            <?= ($row->status == 0) ? 'Belum Diterima' : '' ?>
                            <?= ($row->status == 1) ? 'Diterima' : '' ?>
                        </td>
                        <td class="text-center">
                          <center class="inline">
                            <a class='btn btn-primary btn-xs' title='Lihat Data' href="<?= base_url().$this->uri->segment(1)."/detailpenerimabeasiswa/".$row->nim."/".$row->id_mahasiswa."/".$row->id_wali."/".$row->id_dokumen."/".$row->id_beasiswa ?>"><span class='glyphicon glyphicon-ok'></span></a>
                          </center>
                          <center class="inline">
                            <a class='btn btn-danger btn-xs' title='Hapus Data' href="<?= base_url().$this->uri->segment(1)."/hapuspenerimabeasiswa/$row->nim/$row->id_mahasiswa/$row->id_wali/$row->id_dokumen" ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                          </center>
                        </td>
                      </tr>
                  <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>