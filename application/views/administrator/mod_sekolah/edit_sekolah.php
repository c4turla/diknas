<div class="col-xs-12">  
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Data <?= $input->nama ?></h3>
        <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/sekolah'>Kembali</a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form method="POST" action="<?= base_url().$this->uri->segment(1); ?>/editsekolah/<?= $input->npsn ?>" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label for="nama">Nama Sekolah</label>
                <input type="text" class="form-control" value="<?= $input->nama ?>" id="nama" name="nama">
            </div>
            <div class="form-group col-md-6">
                <label>Tingkat Sekolah</label>
                <select name="tingkat" class="form-control">
                    <option value="">Pilih Tingkat Sekolah</option>
                    <option value="sd" <?= ($input->tingkat == 'sd') ? 'selected' : '' ?>>Sekolah Dasar</option>
                    <option value="smp" <?= ($input->tingkat == 'smp') ? 'selected' : '' ?>>Sekolah Menengah Pertama</option>
                    <option value="paud" <?= ($input->tingkat == 'paud') ? 'selected' : '' ?>>Pendidikan Anak Usia Dini</option>
                    <option value="pkbm" <?= ($input->tingkat == 'pkbm') ? 'selected' : '' ?>>Pusat Kegiatan Belajar Masyarakat.</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" value="<?= $input->alamat ?>" id="alamat" name="alamat">
            </div>
            <div class="form-group col-md-6">
                <label for="desa">Desa</label>
                <input type="text" class="form-control" value="<?= $input->desa ?>" id="desa" name="desa">
            </div>
            <div class="form-group col-md-6">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" value="<?= $input->kecamatan ?>" id="kecamatan" name="kecamatan">
            </div>
            <div class="form-group col-md-12">
                <label for="foto">Unggah Foto Sekolah</label>
                <input type="file" name="foto" id="foto" accept=".jpeg, .png, .JPEG, .PNG, .svg">
                <p class="help-block">Gunakan format .jpg, .jpeg, .png</p>
            </div>
            <div class="form-group col-md-12">                
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class='btn btn-warning' href='<?php echo base_url().$this->uri->segment(1); ?>/sekolah'>Batal</a>            
            </div>
        </form>
    </div>