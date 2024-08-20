<!-- application/views/administrator/nilai_list.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Data Nilai Kelas
        </div>
       
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
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>NILAI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($siswa)) : ?>
                        <?php 
                        $no = 1;
                        foreach ($krs_data as $nilai) : ?>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo htmlspecialchars($nilai->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($nilai->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($nilai->nilai, ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada siswa dalam krs ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo anchor('administrator/krs/tambah_krs/'.$id_kelas.'/'.$id_tahun, '<button class="btn btn-success">Tambah</button>'); ?>
        <?php echo anchor('administrator/krs', '<button class="btn btn-danger">Kembali</button>'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
