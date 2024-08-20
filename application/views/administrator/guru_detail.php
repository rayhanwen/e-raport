<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Detail guru
    </div>
    <table class="table table-hover table-striped table-bordered">
        <?php foreach ($detail as $dt): ?>
            <tr>
                <th>FOTO</th>
                <td>
                    <img src="<?php echo base_url('assets/uploads/img/guru/') . $dt->foto; ?>" alt="Foto guru" style="max-width: 200px; max-height: 200px;">
                </td>
            </tr>
            <tr>
                <th>NOMOR INDUK GURU</th>
                <td><?php echo $dt->nik; ?></td>
            </tr>
            <tr>
                <th>NAMA GURU</th>
                <td><?php echo $dt->nama_guru; ?></td>
            </tr>
            <tr>
                <th>ALAMAT</th>
                <td><?php echo $dt->alamat; ?></td>
            </tr>
            <tr>
                <th>JENIS KELAMIN</th>
                <td><?php echo $dt->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <th>TEMPAT LAHIR</th>
                <td><?php echo $dt->tempat_lahir; ?></td>
            </tr>
            <tr>
                <th>TANGGAL LAHIR</th>
                <td><?php echo $dt->tgl_lahir; ?></td>
            </tr>
            <tr>
                <th>EMAIL</th>
                <td><?php echo $dt->email; ?></td>
            </tr>
            <tr>
                <th>AGAMA</th>
                <td><?php echo $dt->agama; ?></td>
            </tr>
            <tr>
                <th>NO TELPON</th>
                <td><?php echo $dt->no_telp; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo anchor('administrator/guru','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
</div>
