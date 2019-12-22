<style>
    .single-block {
        width: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .content-block.left,
    .content-block.right {
        width: 100%;
    }

    .search-input:focus {
        opacity: 1;
        color: black;
    }

    @media (min-width: 990px) {

        .content-block.left {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%;
            margin:0 1%;
            box-sizing: border-box;
        }

        .content-block.right {
            -ms-flex: 0 0 76%;
            flex: 0 0 76%;
            max-width: 76%;
            margin:0 1%;
            box-sizing: border-box;
        }
    }

    .content-block.left img {
        width: 100%;
    }

    .school-tabs a {
        font-size: 18px;
    }

    .main-page .block {
        margin:0;
    }

    .block-content {
        margin: 0
    }

    td {
        text-transform: capitalize;
    }

    .table-striped th {
        width: 40%;
    }

</style>	
<div class="main-page">
	<div class="single-block">
        <div class="content-block main left">
            <div class="block-title" style="background: #337AB7; margin:0; padding: 16px 0px 1px">
                <center><h4>PROFIL <?= $schooltitle ?></h4><center>
            </div>
            <div style="background: #ffffff;">
                <img src="<?= $sekolah->foto != '' ? base_url('asset/foto_sekolah/'.$sekolah->foto.'') : base_url('asset/foto_default/school.svg') ?>" alt="<?= $sekolah->nama ?>" class="img-responsive">
            </div>
        </div>
		<div class="content-block main right">
			<div class="block">
				<div class="block-title" style="background: #337AB7;">
					<a href="<?php echo base_url('sekolah'); ?>" class="right">Back to school page</a>
					<h2>Data Sekolah <?= $schooltitle ?></h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
							<div class="column12">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active school-tabs" data-id="school-profile"><a href="#">Profile</a></li>
                                    <li role="presentation" class="school-tabs" data-id="school-teacher"><a href="#">Guru</a></li>
                                    <li role="presentation" class="school-tabs" data-id="school-student"><a href="#">Siswa</a></li>
                                </ul>
                                <div class="row tab-content" style="margin:10px" id="school-profile">
                                    <div class="col-sm-12 table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Nama Sekolah</th>
                                                <td><?= $sekolah->nama ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Pokok Sekolah Nasional</th>
                                                <td><?= $sekolah->npsn ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tingkat Pendidikan</th>
                                                <td><?php
                                                        if ($sekolah->tingkat == 'sd') {
                                                            echo 'sekolah dasar';
                                                        } 
                                                        if ($sekolah->tingkat == 'smp') {
                                                            echo 'sekolah menengah pertama';
                                                        } 
                                                        if ($sekolah->tingkat == 'paud') {
                                                            echo 'pendidikan anak usia dini';
                                                        } 
                                                        if ($sekolah->tingkat == 'pkbm') {
                                                            echo 'Pusat Kegiatan Belajar Masyarakat';
                                                        }
                                                        if ($sekolah->tingkat == 'lembaga_kursus') {
                                                            echo 'lembaga kursus';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?= $sekolah->status ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?= $sekolah->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <th>Desa</th>
                                                <td><?= $sekolah->desa ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td><?= $sekolah->kecamatan ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row tab-content" style="margin:10px; display: none;" id="school-teacher">
                                    <div class="col-sm-12 table-responsive">
                                        <table class="table table-bordered datatable-table">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>NUPTK</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jenis PTK</th>
                                                    <th>Agama</th>
                                                    <th>Golongan</th>
                                                    <th>Pend Terakhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; foreach ($guru as $row) : $no++ ?>
                                                    <tr>
                                                        <td><?= $row->nip ?></td>
                                                        <td><?= $row->nuptk ?></td>
                                                        <td><?= $row->nama ?></td>
                                                        <td><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                                        <td><?= $row->jenis_ptk ?></td>
                                                        <td><?= $row->agama ?></td>
                                                        <td><?= $row->golongan ?></td>
                                                        <td><?= $row->pend_terakhir ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row tab-content" style="margin:10px; display: none;" id="school-student">
                                    <div class="col-sm-12 table-responsive">
                                        <table class="table table-bordered datatable-table">
                                            <thead>
                                                <tr>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Agama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Umur</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; foreach ($siswa as $row) : $no++ ?>
                                                    <tr>
                                                        <td><?= $row->nis ?></td>
                                                        <td><?= $row->nama ?></td>
                                                        <td><?= $row->kelas ?></td>
                                                        <td><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                                        <td><?= $row->agama ?></td>
                                                        <td><?= $row->tempat_lahir ?></td>
                                                        <td><?= $row->umur ?></td>
                                                        <td><?= $row->alamat ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div><br>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () { 
        $(".datatable-table").DataTable();
    });

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
</script>