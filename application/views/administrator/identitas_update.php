<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Update Data Identitas
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('administrator/identitas/update_aksi') ?>" method="post">
        <input type="hidden" name="id_identitas" value="<?= $identitas->id_identitas ?>">
        
        <div class="form-group">
            <label for="nama_website">Nama Website</label>
            <input type="text" class="form-control" id="nama_website" name="nama_website" value="<?= $identitas->nama_website ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $identitas->alamat ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $identitas->email ?>" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $identitas->no_telp ?>" required>
        </div>
        <div class="form-group">
            <label for="npsn">NPSN</label>
            <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $identitas->npsn ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
