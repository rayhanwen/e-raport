<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Form Update kontak
    </div>

    <form method="post" action="<?= base_url('administrator/kontak/update_aksi') ?>">
        <input type="hidden" name="id_kontak" value="<?= $kontak->id_kontak ?>">
        <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" value="<?= $kontak->email ?>">
            <?= form_error('email', '<div class="text-danger small">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" value="<?= $kontak->instagram ?>">
            <?= form_error('instagram', '<div class="text-danger small">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>No Whatsapp</label>
            <textarea name="no_telp" class="form-control"><?= $kontak->no_telp ?></textarea>
            <?= form_error('no_telp', '<div class="text-danger small">', '</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
