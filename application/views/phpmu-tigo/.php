<?php
    // var_dump($kecamatan);
    // die;
?>
<style>
    @media (min-width: 990px) {
        .content-block {
            width: 1180px !important;
        }
    }
</style>	
<div class="main-page left">
	<div class="single-block">
		<div class="content-block main left">
			<div class="block">
				<div class="block-title" style="background: #bf4b37;">
					<a href="<?php echo base_url('sekolah'); ?>" class="right">Back to school page</a>
					<h2>Data Sekolah Per Tingkat</h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
							<div class="column12 table-responsive">
                                    <table id="table-datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2" class="text-center">Sekolah</th>
                                                <th colspan="3" class="text-center">Total</th>
                                                <!-- <th colspan="3" class="text-center">Total</th> -->
                                                <?php foreach ($kecamatan as $key => $row) {
                                                ?>
                                                <th colspan="3" class="text-center"><?= $row->kecamatan ?></th>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Jml</th>
                                                <th class="text-center">N</th>
                                                <th class="text-center">S</th>
                                                <?php foreach ($kecamatan as $key => $row) {
                                                ?>
                                                <th class="text-center">Jml</th>
                                                <th class="text-center">N</th>
                                                <th class="text-center">S</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 0;
                                            foreach ($sekolah as $key => $row) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><a style="color: blue" href="<?= base_url('sekolah/detail/'.$row->npsn.'') ?>"><?= $row->nama ?></a></td>
                                                <?php for ($i=1; $i < $jumlahKecamatan+2; $i++) {  ?>
                                                    <td><?= !empty($row->{'total'.$i}) ? $row->{'total'.$i} : '0' ?></td>
                                                    <td><?= !empty($row->{'n'.$i}) ? $row->{'n'.$i} : '0' ?></td>
                                                    <td><?= !empty($row->{'s'.$i}) ? $row->{'s'.$i} : '0' ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
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
<script>
    $(function () { 
        $("#table-datatable").DataTable();
    });
</script>