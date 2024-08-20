<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Edit Informasi
    </div>
    <form method="post" action="<?= base_url('administrator/informasi/edit_aksi') ?>" enctype="multipart/form-data">
        <input type="hidden" name="id_informasi" value="<?= $informasi->id_informasi ?>">
        <div class="form-group">
            <label>Judul Informasi</label>
            <input type="text" name="judul_informasi" class="form-control" value="<?= $informasi->judul_informasi ?>">
            <?= form_error('judul_informasi', '<div class="text-danger small ml-2">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Isi Informasi</label>
            <textarea name="isi_informasi" class="form-control"><?= $informasi->isi_informasi ?></textarea>
            <?= form_error('isi_informasi', '<div class="text-danger small ml-2">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            <input type="hidden" name="foto_old" value="<?= $informasi->foto ?>">
            <?php if ($informasi->foto) : ?>
                <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/informasi/' . $informasi->foto); ?>" alt="Foto Informasi" width="100" height="100">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
