<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Form Tambah kontak
    </div>

    <form method="post" action="<?= base_url('administrator/kontak/tambah_kontak_aksi') ?>">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <?= form_error('email', '<div class="text-danger small">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control">
            <?= form_error('instagram', '<div class="text-danger small">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>No whatsapp</label>
            <textarea name="no_telp" class="form-control"></textarea>
            <?= form_error('no_telp', '<div class="text-danger small">', '</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
