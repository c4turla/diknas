<div class="col-xs-12">  
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Data Siswa</h3>
        <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/siswa'>Kembali</a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form method="POST" action="<?= base_url().$this->uri->segment(1); ?>/tambahsiswa" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Unggah Data Siswa</label>
                <input type="file" name="file" id="file" accept=".xlsx" required>
                <p class="help-block">Gunakan format .xlsx</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>