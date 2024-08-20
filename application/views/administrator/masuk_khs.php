<!-- application/views/administrator/masuk_mengajar.php -->

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Halaman Data Mengajar Kelas
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <div class="alert alert-info">
        Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
    </div>

    <form method="post" action="<?php echo base_url('administrator/mengajar/mengajar_aksi'); ?>">
        <div class="form-group">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kelas</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kelas_data as $kelas): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $kelas->nama_kelas; ?></td>
                            <td>
                                <button type="submit" name="id_kelas" value="<?php echo $kelas->id_kelas; ?>" class="btn btn-primary">Pilih</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
