<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Informasi</h1>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open_multipart('administrator/informasi/tambah_informasi_aksi'); ?>
        <div class="form-group">
            <label for="judul_informasi">Judul Informasi</label>
            <input type="text" name="judul_informasi" class="form-control" id="judul_informasi" value="<?php echo set_value('judul_informasi'); ?>">
            <?php echo form_error('judul_informasi', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="isi_informasi">Isi Informasi</label>
            <textarea name="isi_informasi" class="form-control" id="isi_informasi"><?php echo set_value('isi_informasi'); ?></textarea>
            <?php echo form_error('isi_informasi', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="foto">Upload foto (Image)</label>
            <input type="file" name="foto" class="form-control-file" id="foto">
            <?php echo form_error('foto', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    <?php echo form_close(); ?>
</div>
