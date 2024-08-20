<!-- File: application/views/administrator/wali_tambah_siswa.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <!-- Sertakan CSS untuk Bootstrap dan Font Awesome jika belum ada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="alert alert-success text-uppercase" role="alert" style="margin-bottom: 20px;">
            <i class="fas fa-plus"></i> TAMBAH SISWA
        </div>

        <!-- Form untuk menambahkan siswa baru -->
        <form action="<?php echo site_url('administrator/wali/tambah_siswa_aksi'); ?>" method="post">
            <input type="hidden" name="id_wali" value="<?php echo isset($wali) ? $wali->id_wali : ''; ?>">
            <input type="hidden" name="id_kelas" value="<?php echo isset($wali) ? $wali->id_kelas : ''; ?>">
            <input type="hidden" name="id_tahun" value="<?php echo isset($tahun_ajaran) ? $tahun_ajaran->id_tahun : ''; ?>">

            <!-- Tabel siswa yang belum terdaftar -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pilih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa as $sw) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($sw->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($sw->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($sw->jenis_kelamin, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><input type="checkbox" name="nis[]" value="<?php echo htmlspecialchars($sw->nis, ENT_QUOTES, 'UTF-8'); ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Tambah Siswa</button>
        </form>

        <?php if (isset($wali) && isset($wali->id_wali)) : ?>
            <?php echo anchor('administrator/wali/detail/'.$wali->id_wali, '<button class="btn btn-sm btn-danger mt-3">Kembali</button>'); ?>
        <?php endif; ?>
    </div>

    <!-- Sertakan script untuk Bootstrap JS jika diperlukan -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
