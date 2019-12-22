<style>
    th {
        width: 30%;
    }
    td {
        width: 70%;
    }

    .inline-form {
        float: left;
        margin-top: 10px;
    }

    @media (min-width: 768px) {
        .inline-form {
            float: right;
            margin-top: 0px;
        }
    }
</style>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Penerima Beasiswa</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/penerimabeasiswa'>Kembali</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active school-tabs" data-id="status"><a href="#">Status Beasiswa</a></li>
                    <li role="presentation" class="school-tabs" data-id="school-profile"><a href="#">Identitas Mahasiswa</a></li>
                    <li role="presentation" class="school-tabs" data-id="school-teacher"><a href="#">Wali Mahasiswa</a></li>
                    <li role="presentation" class="school-tabs" data-id="school-student"><a href="#">Dokumen Beasiswa</a></li>
                </ul>
                <div class="row tab-content" style="margin:10px" id="status">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Beasiswa</th>
                                <td><?= $status_beasiswa->nama ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Anggaran</th>
                                <td><?= $status_beasiswa->anggaran ?></td>
                            </tr>
                            <tr>
                                <th>Tahap</th>
                                <td><?= $status_beasiswa->tahap ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                <?php if ($status_beasiswa->status == 0) echo 'Belum Diterima'; ?>
                                <?php if ($status_beasiswa->status == 1) echo 'Diterima'; ?>
                                <form action="<?= base_url('administrator/ubahstatuspenerimabeasiswa') ?>" class="inline-form" method="POST">
                                    <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                    <input type="hidden" name="status" value="<?= $status_beasiswa->status == 0 ? '1' : '0' ?>">
                                    <button type="submit" class="btn btn-sm btn-<?= $status_beasiswa->status == 0 ? 'primary' : 'danger' ?>"><span class="glyphicon glyphicon-<?= $status_beasiswa->status == 0 ? 'ok' : 'remove' ?>"></span> <?= $status_beasiswa->status == 0 ? 'Terima' : 'Belum diterima' ?></button>
                                </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row tab-content" style="margin:10px; display:none" id="school-profile">
                    <div class="col-sm-12 text-center">
                        <img src="<?= base_url("asset/beasiswa/".md5($status_beasiswa->id)."_".str_replace(' ', '_', $status_beasiswa->nama)."/".$status_beasiswa->nim."-".str_replace(' ', '_', $identitas_mahasiswa->nama)."/$identitas_mahasiswa->foto") ?>" width="180">
                    </div>
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td><?= $identitas_mahasiswa->nama ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?= $identitas_mahasiswa->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?= $identitas_mahasiswa->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $identitas_mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            </tr>
                            <tr>
                                <th>Nomor KTP</th>
                                <td><?= $identitas_mahasiswa->no_ktp ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $identitas_mahasiswa->alamat ?></td>
                            </tr>
                            <tr>
                                <th>Kota / Kabupaten</th>
                                <td><?= $identitas_mahasiswa->kota ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telpon</th>
                                <td><?= $identitas_mahasiswa->no_telpon ?></td>
                            </tr>
                            <tr>
                                <th>Asal Kampus</th>
                                <td><?= $identitas_mahasiswa->asal_kampus ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Kampus</th>
                                <td><?= $identitas_mahasiswa->alamat_kampus ?></td>
                            </tr>
                            <tr>
                                <th>Jurusan / Program Studi</th>
                                <td><?= $identitas_mahasiswa->program_studi ?></td>
                            </tr>
                            <tr>
                                <th>Semester Sekarang</th>
                                <td><?= $identitas_mahasiswa->semester ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row tab-content" style="margin:10px; display: none;" id="school-teacher">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Ayah</th>
                                <td><?= $identitas_wali->nama_ayah != '' ? $identitas_wali->nama_ayah : '-' ?></td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td><?= $identitas_wali->nama_ibu != '' ? $identitas_wali->nama_ibu : '-' ?></td>
                            </tr>
                            <tr>
                                <th>Nama Wali</th>
                                <td><?= $identitas_wali->nama_wali != '' ? $identitas_wali->nama_wali : '-' ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Orang Tua / Wali</th>
                                <td><?= $identitas_wali->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $identitas_wali->alamat_wali ?></td>
                            </tr>
                            <tr>
                                <th>Kota / Kabupaten</th>
                                <td><?= $identitas_wali->kota_wali ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan Orang Tua / Wali / Bulan</th>
                                <td><?= $identitas_wali->penghasilan ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $identitas_wali->no_telpon_wali ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row tab-content" style="margin:10px; display: none;" id="school-student">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>KHS Semester Ganjil</th>
                                <td>
                                    <?php if ($dokumen_beasiswa->khs_semester_ganjil != '') : ?>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->khs_semester_ganjil ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                    <?php else : ?>
                                    -
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>KHS Semester Genap</th>
                                <td>
                                    <?php if ($dokumen_beasiswa->khs_semester_genap != '') : ?>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->khs_semester_genap ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                    <?php else : ?>
                                    -
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat Permohonan ditujukan Kepada Bupati Bombana Cq. Kepala Dinas Dikbud Kabupaten Bombana (Ditulis Tangan)</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->surat_permohonan ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Fotocopy KTP</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->ktp ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Fotocopy KK</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->kartu_keluarga ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat Keterangan Tidak Mampu</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->surat_keterangan_tidak_mampu ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Fotocopy Kartu Mahasiswa</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->kartu_mahasiswa ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat Keterangan Aktif Kuliah</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->surat_keterangan_aktif_kuliah ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Fotocopy Akreditasi Prodi</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->akreditasi_prodi ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan Pangkalan Data Perguruan Tinggi (PDPT) </th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->pdpt ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat keterangan dari bagian kemahasiswaan yang menerangkan tidak sedang menerima beasiswa lain</th>
                                <td>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->surat_keterangan_mahasiswa ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening Perguruan Tinggi</th>
                                <td>
                                    <?php if ($dokumen_beasiswa->rekening_perguruan_tinggi != '') : ?>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->rekening_perguruan_tinggi ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                <?php else : ?>
                                    -
                                <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Prestasi</th>
                                <td>
                                <?php if ($dokumen_beasiswa->prestasi != '') : ?>
                                    <form action="<?= base_url('administrator/unduhDokumenBeasiswa') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $status_beasiswa->id ?>">
                                        <input type="hidden" name="nama" value="<?= $status_beasiswa->nama ?>">
                                        <input type="hidden" name="nim" value="<?= $status_beasiswa->nim ?>">
                                        <input type="hidden" name="nama_mahasiswa" value="<?= $identitas_mahasiswa->nama ?>">
                                        <input type="hidden" name="dokumen" value="<?= $dokumen_beasiswa->prestasi ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Unduh</button>
                                    </form>
                                <?php else : ?>
                                    -
                                <?php endif ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
              <script>

                $('.school-tabs a').click((e) =>     {
                    e.preventDefault();
                });

                $('.school-tabs').click(function (i, e) {
                    $('.school-tabs').removeClass('active');
                    $(this).addClass('active');
                    let id = $(this).attr('data-id');
                    $('.tab-content').hide();
                    $('#'+ id +'').show();
                });
            </script>