<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Daftar Iklan
    </div>
    <?php echo $this->session->flashdata('pesan'); ?>
    <?php echo anchor('administrator/iklan/tambah_iklan', '<button class="btn btn-sm btn-primary mb-3">Tambah Iklan</button>'); ?>
    <table id="iklan_table" class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Foto</th>
                <th>Tanggal Publish</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($iklan)) : ?>
                <?php $no = 1; foreach ($iklan as $ikn) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                        <img src="<?php echo base_url('sisfo_akademikk/assets/uploads/img/iklan/'.$ikn->foto); ?>" alt="Foto Iklan" width="150" height="100">
                    </td>
                    <td><?php echo $ikn->nama_foto; ?></td>
                    <td><?php echo $ikn->tanggal_publish; ?></td>
                    <td>
                        <a href="<?php echo site_url('administrator/iklan/detail/'.$ikn->id_iklan); ?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('administrator/iklan/update/'.$ikn->id_iklan); ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('administrator/iklan/delete/'.$ikn->id_iklan); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">Belum ada data iklan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
