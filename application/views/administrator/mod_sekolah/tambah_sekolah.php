<div class="col-xs-12">  
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Data Sekolah</h3>
        <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/sekolah'>Kembali</a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form method="POST" action="<?= base_url().$this->uri->segment(1); ?>/tambahsekolah" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tingkat Sekolah</label>
                <select name="tingkat" class="form-control" required>
                    <option value="">Pilih Tingkat Sekolah</option>
                    <option value="sd">Sekolah Dasar</option>
                    <option value="smp">Sekolah Menengah Pertama</option>
                    <option value="paud">Pendidikan Anak Usia Dini</option>
                    <option value="pkbm">Pusat Kegiatan Belajar Masyarakat</option>
					<option value="lembaga_kursus">Lembaga Kursus</option>					
                </select>
            </div>
            <div class="form-group">
                <label for="file">Unggah Data Sekolah</label>
                <input type="file" name="file" id="file" accept=".xlsx" required>
                <p class="help-block">Gunakan format .xlsx</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>