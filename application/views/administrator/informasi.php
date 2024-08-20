<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-images"></i> Data Informasi
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
    
    <?php echo anchor('administrator/informasi/tambah_informasi', '<button class="btn btn-sm btn-primary mb-3">Tambah Informasi</button>') ?>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul Informasi</th>
                <th>Isi Informasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($informasi)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($informasi as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php if ($item->foto) : ?>
                                <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/informasi/' . $item->foto); ?>" alt="Foto Informasi" width="100" height="100">
                            <?php else : ?>
                                <p class="text-center">Foto tidak tersedia</p>
                            <?php endif; ?>
                        </td>
                        <td><?= $item->judul_informasi ?></td>
                        <td><?= $item->isi_informasi ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?= anchor('administrator/informasi/edit/'.$item->id_informasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Update</div>') ?>
                                <?= anchor('administrator/informasi/hapus/'.$item->id_informasi, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</div>') ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data informasi</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
