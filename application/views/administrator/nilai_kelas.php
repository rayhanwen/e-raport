<!-- application/views/administrator/nilai_kelas.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Kelas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Data Nilai Mata Pelajaran di <?=$nama_kelas ?>
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <center>
            <legend class="mt-3"><strong>Data Nilai Kelas</strong></legend>
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
        
        <div class="mt-4">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MATA PELAJARAN</th>
                        <th>GURU PENGAJAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($nilai_data)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($nilai_data as $nilai): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($nilai->nama_mapel, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($nilai->nama_guru, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php 
                                    // Periksa apakah sudah ada nilai
                                    $already_filled = false;
                                    foreach ($nilai_data as $data) {
                                        if ($data->id_mengajar == $nilai->id_mengajar && !empty($data->nilai)) {
                                            $already_filled = true;
                                            break;
                                        }
                                    }
                                    if (!$already_filled): ?>
                                        <?php echo anchor('administrator/nilai/input_nilai/'.$nilai->id_mengajar.'?kelas='.$id_kelas, '<button class="btn btn-sm btn-primary">Input Nilai</button>'); ?> 
                                        <?php echo anchor('administrator/nilai/lihat_nilai/'.$nilai->id_mengajar, '<button class="btn btn-sm btn-success">Lihat Nilai</button>'); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data nilai untuk kelas ini.</td>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
