<div class="col-xs-12">  
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Beasiswa</h3>
        <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/beasiswa'>Kembali</a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form method="POST" action="<?= base_url().$this->uri->segment(1); ?>/editbeasiswa/<?= $input->id ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Beasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $input->nama ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $input->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label for="anggaran">Anggaran</label>
                <input type="text" class="form-control" id="anggaran" name="anggaran" value="<?= $input->anggaran ?>">
            </div>
            <div class="form-group">
                <label for="batas_anggaran">Batas Anggaran</label>
                <input type="text" class="form-control" id="batas_anggaran" name="batas_anggaran" value="<?= $input->batas_anggaran ?>">
            </div>
            <div class="form-group">
                <label for="status_pendaftaran">Status Pendaftaran</label>
                <select name="status_pendaftaran" id="status_pendaftaran" class="form-control">
                    <option value="">Pilih Status Pendaftaran</option>
                    <option value="0" <?= $input->status_pendaftaran == 0 ? 'selected' : '' ?>>Tutup</option>
                    <option value="1" <?= $input->status_pendaftaran == 1 ? 'selected' : '' ?>>Tahap 1</option>
                    <option value="2" <?= $input->status_pendaftaran == 2 ? 'selected' : '' ?>>Tahap 2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>