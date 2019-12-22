<style>
    .list-sekolah,
    .list-sekolah a {
        color: blue;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        box-sizing: border-box;
    }

    .col-50 {
            flex: 100%;
            max-width: 100%;
            padding: 0px 10px;
            margin: 0px;
            box-sizing: border-box;
        }

    @media (min-width: 992px) {
        .col-50 {
            flex: 50%;
            max-width: 50%;
        }
    }
</style>	
<div class="main-page left">
	<div class="single-block">
		<div class="content-block main">
			<div class="block">
				<div class="block-title" style="background: #337AB7;">
					<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>
					<h2>Data Sekolah</h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
							<div class="column12">
								<div id="writecomment">
                                    <h3>Berdasarkan Tingkat Pendidikan</h3>
                                    <ul class="list-sekolah">
                                        <li>
                                            <a href="<?php echo base_url(); ?>sekolah/daftarpertingkat/paud">TK / PAUD (<?= !empty($jumlahPaud) ? $jumlahPaud : '0' ?>)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>sekolah/daftarpertingkat/sd">SD (<?= !empty($jumlahSd) ? $jumlahSd : '0' ?>)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>sekolah/daftarpertingkat/smp">SMP (<?= !empty($jumlahSmp) ? $jumlahSmp : '0' ?>)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>sekolah/daftarpertingkat/pkbm">PKBM (<?= !empty($jumlahPkbm) ? $jumlahPkbm : '0' ?>)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>sekolah/daftarpertingkat/lembaga_kursus">Lembaga Kursus (<?= !empty($jumlahLembagaKursus) ? $jumlahLembagaKursus : '0' ?>)</a>
                                        </li>
                                    </ul>
                                    
                                    <h3>Berdasarkan Kecamatan</h3>
                                    <div class="row">
                                        <div class="col-50">
                                            <ul class="list-sekolah">
                                                <?php 
                                                    $no=1;
                                                    foreach($kecamatan as $value) :
                                                        if ($no % 12 == 0) {
                                                            echo '</ul></div><div class="col-50"><ul class="list-sekolah">';
                                                        }
                                                ?>
                                                <li><a href="<?= base_url('sekolah/daftarperkecamatan/').str_replace(" ", "-", $value['kecamatan']) ?>"><?= $value['kecamatan'].' ('.$jumlahPerKecamatan[$value['kecamatan']].')' ?></a></li>
                                                <?php $no++; endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
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