<style>
    .form-flex {
        display: -ms-flexbox;
        display: flex;
        box-sizing: border-box;
        max-width: 100%;
        overflow: hidden;
    }

    .form-column {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        transition: .5s;
        display: none;
    }


    .continue-btn {
        margin-top: 10px;
    }

    .form-control {
        width: 100%;
    }

    #back-btn {
        display:none;
        cursor: pointer;
    }

    #message-error {
        background: rgba(255, 0, 0, .3);
        color: rgb(178,34,34);
        padding: 10px;
        text-align: center;
        margin-bottom: 10px;
        overflow: hidden;
        transition: .3s;
    }

    #message-success {
        background: rgba(107, 185, 240, .3);
        color: rgba(58, 83, 155, 1);
        padding: 10px;
        text-align: center;
        margin-bottom: 10px;
        overflow: hidden;
        transition: .3s;
    }

    #close-btn {
        float:right;
        background: none;
        border: none;
        cursor: pointer;
    }

    .search-input:focus {
        opacity: 1;
        color: black;
    }

</style>	
<div class="main-page left">
	<div class="single-block">
		<div class="content-block main">
			<div class="block">
				<div class="block-title" style="background: #337AB7;">
					<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>
					<h2>PENDAFTARAN BEASISWA GEMBIRA CERDAS</h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
							<div class="column12">
								<div id="writecomment">

                                <?= $this->session->flashdata('berkas-error') ?>
                                <?= $this->session->flashdata('success') ?>

                                <?php if ($tahap === 0) : ?>
                                    <h4>Mohon Maaf Pendaftaran Beasiswa Gembira Cerdas belum dibuka untuk saat ini.</h4>
                                <?php endif ?>

                                <?php if ($tahap === 1) : ?>
                                    <form action="<?= base_url('beasiswa') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-flex">
                                            <div class="form-column">
                                                <h2 style="font-weight: 600; margin-bottom: 20px">Form Identitas Mahasiswa</h2>
                                                <div class="form-group">
                                                    <label for="nim">Nomor Induk Mahasiswa</label>
                                                    <input type="text" style='width:40%' class="form-control" id="nim" name="nim" value="<?= !empty($input->nim) ? $input->nim : '' ?>">
                                                    <?= form_error('nim') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Lengkap</label>
                                                    <input type="text" style='width:60%' class="form-control" id="nama" name="nama" value="<?= !empty($input->nama) ? $input->nama : '' ?>">
                                                    <?= form_error('nama') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" style='width:40%' class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= !empty($input->tempat_lahir) ? $input->tempat_lahir : '' ?>">
                                                    <?= form_error('tempat_lahir') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" style='width:30%' class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= !empty($input->tanggal_lahir) ? $input->tanggal_lahir : '' ?>">
                                                    <?= form_error('tanggal_lahir') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <div>
                                                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="L"
                                                        <?php
                                                            if (!empty($input->jenis_kelamin)) {
                                                                if ($input->jenis_kelamin == 'L') {
                                                                    echo 'checked';
                                                                }
                                                            } 
                                                        ?>>
                                                        <label for="laki-laki">Laki - laki</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="perempuan" name="jenis_kelamin" value="P"
                                                        <?php
                                                            if (!empty($input->jenis_kelamin)) {
                                                                if ($input->jenis_kelamin == 'P') {
                                                                    echo 'checked';
                                                                }
                                                            } 
                                                        ?>>
                                                        <label for="perempuan">Perempuan</label>
                                                    </div>
                                                    <?= form_error('jenis_kelamin') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_ktp">Nomor Kartu Tanda Penduduk</label>
                                                    <input type="text" style='width:40%' class="form-control" id="no_ktp" name="no_ktp" value="<?= !empty($input->no_ktp) ? $input->no_ktp : '' ?>">
                                                    <?= form_error('no_ktp') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                                    <input type="text" style='width:40%' class="form-control" id="no_kk" name="no_kk" value="<?= !empty($input->no_kk) ? $input->no_kk : '' ?>">
                                                    <?= form_error('no_kk') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat Tinggal</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" ><?= !empty($input->alamat) ? $input->alamat : '' ?></textarea>
                                                    <?= form_error('alamat') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kota">Kota</label>
                                                    <input type="text" style='width:40%' class="form-control" id="kota" name="kota" value="<?= !empty($input->kota) ? $input->kota : '' ?>">
                                                    <?= form_error('kota') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_telpon">Nomor Telepon</label>
                                                    <input type="text" style='width:40%' class="form-control" id="no_telpon" name="no_telpon" value="<?= !empty($input->no_telpon) ? $input->no_telpon : '' ?>">
                                                    <?= form_error('no_telpon') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="asal_kampus">Asal Perguruan Tinggi</label>
                                                    <input type="text" style='width:40%' class="form-control" id="asal_kampus" name="asal_kampus"  value="<?= !empty($input->asal_kampus) ? $input->asal_kampus : '' ?>">
                                                    <?= form_error('asal_kampus') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_kampus">Alamat Perguruan Tinggi</label>
                                                    <textarea class="form-control" id="alamat_kampus" name="alamat_kampus"><?= !empty($input->alamat_kampus) ? $input->alamat_kampus : '' ?></textarea>
                                                    <?= form_error('alamat_kampus') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="program_studi">Jurusan / Program Studi</label>
                                                    <input type="text" style='width:40%' class="form-control" id="program_studi" name="program_studi" value="<?= !empty($input->program_studi) ? $input->program_studi : '' ?>">
                                                    <?= form_error('program_studi') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="semester">Semester Sekarang</label>
                                                    <input type="text" style='width:40%' class="form-control" id="semester" name="semester" value="<?= !empty($input->semester) ? $input->semester : '' ?>">
                                                    <?= form_error('semester') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Foto 3X4 Latar Merah</label>
                                                    <input type="file" style='width:60%' class="form-control" id="foto" name="foto" accept=".jpeg,.jpg,.png">
                                                </div>
                                            </div>
                                            <div class="form-column">
                                                <h2 style="font-weight: 600; margin-bottom: 20px">Form Identitas Orang Tua / Wali</h2>
                                                <div class="form-group">
                                                    <label for="namaAyah">Nama Ayah</label>
                                                    <input type="text" style='width:40%' class="form-control" id="namaAyah" name="nama_ayah" value="<?= !empty($input->nama_ayah) ? $input->nama_ayah : '' ?>">
                                                    <?= form_error('nama_ayah') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ibu">Nama Ibu</label>
                                                    <input type="text" style='width:40%' class="form-control" id="nama_ibu" name="nama_ibu" value="<?= !empty($input->nama_ibu) ? $input->nama_ibu : '' ?>">
                                                    <?= form_error('nama_ibu') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_wali">Nama Wali</label>
                                                    <input type="text" style='width:40%' class="form-control" id="nama_wali" name="nama_wali" value="<?= !empty($input->nama_wali) ? $input->nama_wali : '' ?>">
                                                    <?= form_error('nama_wali') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pekerjaan">Pekerjaan Orang Tua / Wali</label>
													<select class="form-control" style='width:40%' id="pekerjaan" data-placeholder="pekerjaan" name="pekerjaan">
														<option value=""></option>
														<option value="PNS">PNS</option>
														<option value="TNI/Polri">TNI/Polri</option>
														<option value="Karyawan Swasta">Karyawan Swasta</option>
														<option value="Wiraswasta">Wiraswasta</option>
														<option value="Pedagang">Pedagang</option>
														<option value="Petani">Petani</option>
														<option value="Lain-lain">Lain-lain</option>
													</select>
                                                    <?= form_error('pekerjaan') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_wali">Alamat Orang Tua / Wali</label>
                                                     <textarea class="form-control" id="alamat_wali" name="alamat_wali" ><?= !empty($input->alamat_wali) ? $input->alamat_wali : '' ?> </textarea>
                                                    <?= form_error('alamat_wali') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kota_wali">Kota / Kabupaten</label>
                                                    <input type="text" style='width:40%' class="form-control" id="kota_wali" name="kota_wali" value="<?= !empty($input->kota_wali) ? $input->kota_wali : '' ?>">
                                                    <?= form_error('kota_wali') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penghasilan">Penghasilan Orang Tua / Wali / Bulan</label>
                                                    <input type="text" style='width:40%' class="form-control" id="penghasilan" name="penghasilan" value="<?= !empty($input->penghasilan) ? $input->penghasilan : '' ?>">
                                                    <?= form_error('penghasilan') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_telpon_wali">Nomor Telepon Orang Tua / Wali</label>
                                                    <input type="text" style='width:40%' class="form-control" id="no_telpon_wali" name="no_telpon_wali" value="<?= !empty($input->no_telpon_wali) ? $input->no_telpon_wali : '' ?>">
                                                    <?= form_error('no_telpon_wali') ?>
                                                </div>
                                            </div>
                                            <div class="form-column">
                                                <h2 style="font-weight: 600; margin-bottom: 20px">Form Kelengkapan Dokumen <br/><span style="color: grey;font-size: 1rem">(Gunakan format .pdf Ukuran File Maksimal 500kb)</span></h2>
                                                <div class="form-group">
                                                    <label for="khs_semester_ganjil">KHS Semester Ganjil + Tanda Tangan Dekan, Ketua Jurusan atau Ketua Prodi</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="khs_semester_ganjil" name="khs_semester_ganjil">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surat_permohonan">Surat Permohonan ditujukan Kepada Bupati Bombana Cq. Kepala Dinas Dikbud Kabupaten Bombana (Ditulis Tangan)</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="surat_permohonan" name="surat_permohonan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ktp">Foto Copy KTP yang dilegalisir</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="ktp" name="ktp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kartu_keluarga">Foto Copy KK yang dilegalisir</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="kartu_keluarga" name="kartu_keluarga">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surat_keterangan_tidak_mampu">Surat Keterangan Tidak Mampu</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="surat_keterangan_tidak_mampu" name="surat_keterangan_tidak_mampu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kartu_mahasiswa">Foto Copy Kartu Mahasiswa yang dilegalisir</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="kartu_mahasiswa" name="kartu_mahasiswa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surat_keterangan_aktif_kuliah">Surat Keterangan Aktif Kuliah</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="surat_keterangan_aktif_kuliah" name="surat_keterangan_aktif_kuliah">
                                                </div>
                                                <div class="form-group">
                                                    <label for="akreditasi_prodi">Foto Copy Akreditasi Prodi yang dilegalisir</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="akreditasi_prodi" name="akreditasi_prodi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pdpt">Keterangan Pangkalan Data Perguruan Tinggi (PDPT)</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="pdpt" name="pdpt">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surat_keterangan_mahasiswa">Surat keterangan dari bagian kemahasiswaan yang menerangkan tidak sedang menerima beasiswa lain</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="surat_keterangan_mahasiswa" name="surat_keterangan_mahasiswa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rekening_perguruan_tinggi">Foto Copy Rekening Perguruan Tinggi<br>(Bagi PT yang belum melakukan Perjanjian Kerjasama dengan Pemda Bombana)</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="rekening_perguruan_tinggi" name="rekening_perguruan_tinggi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="prestasi">Foto Copy Prestasi (Jika Ada)</label>
                                                    <input type="file" accept=".pdf" class="form-control" id="prestasi" name="prestasi">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary continue-btn" id="back-btn">Kembali</button>
                                        <button type="button" class="btn btn-primary continue-btn" data-btn="0" id="submit-btn">Selanjutnya</button>
                                    </form>
                                <?php endif ?>

                                <?php if ($tahap === 2) : ?>
                                    <form action="<?= base_url('beasiswa') ?>" method="post" enctype="multipart/form-data">
                                        <h2 style="font-weight: 600; margin-bottom: 20px">Pendaftaran Tahap 2</h2>
                                        <div class="form-group">
                                            <label for="nim">Nomor Induk Mahasiswa</label>
                                            <input type="text" class="form-control" id="nim" name="nim">
                                        </div>
                                        <div class="form-group">
                                            <label for="khs_semester_genap">KHS Semester Genap + Tanda Tangan Dekan, Ketua Jurusan atau Ketua Prodi</label>
                                            <input type="file" class="form-control" id="khs_semester_genap" name="khs_semester_genap"  accept=".pdf">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                <?php endif ?>

								</div>
							</div>
						</div><br>
					</div>
				</div>
			</div>
		</div>
	</div>


<div class='main-sidebar right'>
<?php include "sidebar_kontributor.php"; ?>
</div>

<script>
    <?php if ($tahap == 1) : ?>
    let backBtn = document.getElementById('back-btn');
    let nextBtn = document.getElementById('submit-btn'); 
    var button = nextBtn.getAttribute('data-btn');
    let form = document.getElementsByClassName('form-column');
    form[button].style.display = 'block';
    <?php endif ?>

    let closeBtn = document.getElementById('close-btn'); 
    let messageError = document.getElementById('message-error'); 
    
    <?php if ($tahap == 1) : ?>
    function hide() {
        setTimeout(function() {
            form[button-1].style.display = 'none';
        }, 100);
    }

    function show() {
        setTimeout(function() {
            form[button].style.display = 'block';
        }, 100);
    }

    function hideAll() {
        form.style.display = 'none';
        form[button].style.display = 'block';
    }

    nextBtn.addEventListener("click", function () {
        if (button == 2) {
            nextBtn.setAttribute('type', 'submit');
            return;
        }

        if (button == 1) {
            nextBtn.textContent = "Simpan";
        }

        backBtn.style.display = 'inline-block';

        nextBtn.style.float = 'right';

        form[button].style.marginLeft = '-100%';
        button++;
        window.scrollTo(0, 200);
        hide();
        show();
    });

    backBtn.addEventListener("click", function () {

        if (nextBtn.textContent == 'Simpan') {
            nextBtn.textContent = 'Selanjutnya';
        }

        if (button == 1) {
            backBtn.style.display = 'none';

            nextBtn.style.float = 'left';
        }
        form[button-1].style.marginLeft = '0%';
        form[button].style.display = 'none';
        button--;

        show();
    });

    <?php endif ?>

    $(window).scroll(function () {
        // jarak antarmuka saat ini dengan atas
        var scrollTop       = $(window).scrollTop(),
        // jarak navbar dengan atas
            navbarOffset    = $('.main-menu').offset().top,
        // jarak navbar dengan atas ketika di scroll
            distance        = navbarOffset - scrollTop;
        
        if (distance <= 0) {
            $('.main-menu .wrapper').css({
                width: '100%',
                left: '0',
            });

            $('.main-menu .the-menu').css({
                width: '1180px',
                margin: '0 auto',
            });

        } else {
            $('.main-menu .wrapper').css({
                width: '1180px',
                left: 'unset',
                paddingLeft: 'unset',
            });
        }
    });

    <?php if ($this->session->flashdata('berkas-error') || $this->session->flashdata('success')) : ?>
    closeBtn.addEventListener("click", () => {
        messageError.style.padding = '0px';
        messageError.style.maxHeight = '0px';
        messageError.style.margin = '0px';
    });
    <?php endif ?>

</script>