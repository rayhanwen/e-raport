<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Tambah Informasi
    </div>
    <form method="post" action="<?= base_url('administrator/informasi/tambah_informasi_aksi') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul Informasi</label>
            <input type="text" name="judul_informasi" class="form-control">
            <?= form_error('judul_informasi', '<div class="text-danger small ml-2">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Isi Informasi</label>
            <textarea name="isi_informasi" class="form-control"></textarea>
            <?= form_error('isi_informasi', '<div class="text-danger small ml-2">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
