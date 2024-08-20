<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Nilai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Detail Nilai Mata Pelajaran di <?= htmlspecialchars($nama_kelas, ENT_QUOTES, 'UTF-8') ?>
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <center>
            <legend class="mt-3"><strong>Detail Nilai</strong></legend>
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
                <tr>
                    <td><strong>Mata Pelajaran</strong></td>
                    <td>&nbsp;: <?php echo htmlspecialchars($nama_mapel, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Guru</strong></td>
                    <td>&nbsp;: <?php echo htmlspecialchars($nama_guru, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            </table>
        </div>
        
        <div class="mt-5">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nilai 1</th>
                        <th>Nilai 2</th>
                        <th>Nilai 3</th>
                        <th>Nilai 4</th>
                        <th>Nilai 5</th>
                        <th>Rata-rata</th>
                        <th>Predikat</th>
                        <th>Deskripsi</th>
                        <th>Total Nilai</th>
                        <th>Nilai Akhir</th>
                        <th>KKM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($nilai_data)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($nilai_data as $nilai): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($nilai->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->ns1, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->ns2, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->ns3, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->ns4, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->ns5, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->rata1, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->predikat, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->deskripsi, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->total, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->nilai_akhir, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->kkm, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="13" class="text-center">Tidak ada data nilai untuk ditampilkan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <?php echo anchor('administrator/nilai', '<button class="btn btn-sm btn-danger">Kembali</button>'); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
