<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Tambah Galeri
    </div>

    <?php echo validation_errors(); ?>
    <?php echo $this->session->flashdata('pesan'); ?>

    <?php echo form_open_multipart('administrator/galeri/tambah_galeri_aksi'); ?>

    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control-file" />
    </div>

    <input type="hidden" name="tanggal_publish" id="tanggal_publish" value="<?php echo date('Y-m-d'); ?>" />

    <input type="submit" name="submit" value="Tambah Galeri" class="btn btn-primary" />
    <?php echo form_close(); ?>
</div>

<script>
    // JavaScript untuk mengatur nilai default tanggal_publish menjadi tanggal hari ini pada form tambah galeri
    var today = new Date().toISOString().slice(0, 10);
    document.getElementById("tanggal_publish").value = today;
</script>
