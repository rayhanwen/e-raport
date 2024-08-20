<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Detail Mata Pelajaran
    </div>
    <?php if (!empty($detail)) : ?>
        <table class="table table-hover table-striped table-bordered">
            <?php foreach ($detail as $dt): ?>
                <tr>
                    <th>Nama Mata Pelajaran</th>
                    <td><?php echo $dt->nama_mapel; ?></td>
                </tr>
                <tr>
                    <th>Kode Mata Pelajaran</th>
                    <td><?php echo $dt->kode_mapel; ?></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><?php echo $dt->deskripsi; ?></td>
                </tr>
                <tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Detail mata pelajaran tidak tersedia.</p>
    <?php endif; ?>
    <?php echo anchor('administrator/mapel','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
</div>
