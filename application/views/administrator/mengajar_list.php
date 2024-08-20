<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Data Mengajar Mata Pelajaran di Kelas
    </div>

    <center>
        <legend class="mt-3"><strong>Data Mata Pelajaran di Kelas</strong></legend>
    </center>

    <div class="d-flex justify-content-center mt-4">
        <table>
            <tr>
                <td><strong>Tahun Akademik</strong></td>
                <td>&nbsp;: <?php echo htmlspecialchars($tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>&nbsp;: <?php echo htmlspecialchars($nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        </table>
    </div>

    <?php echo anchor('administrator/mengajar/tambah_mengajar/'.$id_kelas.'/'.$id_tahun, '<button class="btn btn-sm btn-primary mb-3">Tambah Data Rencana Mata Pelajaran</button>'); ?>

    <div class="mt-4">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA MATA PELAJARAN</th>
                    <th>GURU PENGAJAR</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($mengajar_data as $mengajar) : ?>
                <tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo htmlspecialchars($mengajar->nama_mapel, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($mengajar->nama_guru, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/mengajar/delete/'.$mengajar->id_mengajar); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/mengajar/update_mengajar/'.$mengajar->id_mengajar); ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php echo anchor('administrator/mengajar', '<button class="btn btn-sm btn-danger">Kembali</button>'); ?>
</div>
