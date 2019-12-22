
<style>
    div.dataTables_paginate {
        margin-left: -15px;
    }

    @media (min-width: 768px) {
        div.dataTables_paginate {
            float: right;
            margin-left: 0px;
        }
    }

    @media (min-width: 990px) {
        .content-block {
            width: 1180px !important;
        }
    }

    div.dt-button {
        margin: 10px !important;
    }

    .btn-dt {
        color: #ffffff !important;
        background: #03A9F4 !important;
        border: none !important;
        transition: .2s;
        margin: 5px 2px 15px !important;
    }

    .btn-dt:hover {
        background: blue !important;
    }

    .search-input:focus {
        opacity: 1;
        color: black;
    }

    div.dataTables_info {
        display: inline-block;
    }

</style>
<?php 

    $filetitle = $schooltitle;

    if ($schooltitle == 'sd') {
        $filetitle = 'Sekolah Dasar';
    }

    if ($schooltitle == 'smp') {
        $filetitle = 'Sekolah Menengah Pertama';
    }

    if ($schooltitle == 'paud') {
        $filetitle = 'Pendidikan Anak Usia Dini';
    }

    if ($schooltitle == 'lembaga_kursus') {
        $filetitle = 'Lembaga Kursus';
    }

    if ($schooltitle == 'pkbm') {
        $filetitle = 'Pusat Kegiatan Belajar Masyarakat';
    }
?>	
<div class="main-page left">
	<div class="single-block">
		<div class="content-block main left">
			<div class="block">
				<div class="block-title" style="background: #337AB7;">
					<a href="<?php echo base_url('sekolah'); ?>" class="right">Back to school page</a>
					<h2>Data Sekolah <?= $filetitle ?></h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
							<div class="column12 table-responsive">
                                    <table id="table-datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Sekolah</th>
                                                <th class="text-center">NPSN</th>
                                                <th class="text-center">BP</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Desa</th>
                                                <th class="text-center">Kecamatan</th>
                                                <th class="text-center">Guru</th>
                                                <th class="text-center">Siswa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; foreach ($sekolah as $row) : $no++ ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><a href="<?= base_url('sekolah/detail/').$row->npsn ?>" style="color:blue"><?= $row->nama ?></td>
                                                    <td style="text-align:center;"><?= $row->npsn ?></td>
                                                    <td style="text-align:center; text-transform: uppercase"><?= $row->tingkat == 'lembaga_kursus' ? 'lembaga kursus' : $row->tingkat ?></td>
                                                    <td style="text-align:center; text-transform: uppercase"><?= $row->status ?></td>
                                                    <td><?= $row->desa ?></td>
                                                    <td><?= $row->kecamatan ?></td>
                                                    <td style="text-align:center"><?= $row->jumlah_guru ?></td>
                                                    <td style="text-align:center"><?= $row->jumlah_siswa ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <th colspan="7" style="text-align:center">
                                                Total
                                            </th>
                                            <th style="text-align:center">
                                                <?php  
                                                    foreach ($jumlahGuru as $key => $value) {
                                                        echo $value->total_guru;
                                                    }
                                                ?>
                                            </th>
                                            <th style="text-align:center">
                                                <?php  
                                                    foreach ($jumlahSiswa as $key => $value) {
                                                        echo $value->total_siswa;
                                                    }
                                                ?>
                                            </th>
                                        </tfoot>
                                    </table>
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
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/datatable.button.min.js"></script>
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/button.print.min.js"></script>
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/button.flash.min.js"></script>
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/button.html5.min.js"></script>
<script src="<?php echo base_url(); ?>template/phpmu-tigo/jscript/vfs_fonts.js"></script>
<script>
    $('#table-datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Salin',
                extend: 'copy',
                className: 'btn-dt'
            },
            {
                text: 'Unduh Excel',
                extend: 'excel',
                className: 'btn-dt',
                title: '<?= $filetitle ?>'
            },
            {
                text: 'Unduh PDF',
                extend: 'print',
                className: 'btn-dt',
                title: '<?= $filetitle ?>'
            },
        ]
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