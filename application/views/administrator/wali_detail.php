<div class="container-fluid">
    <div class="alert alert-success text-uppercase" role="alert" style="margin-bottom: 20px;">
        <i class="fas fa-edit"></i> DETAIL WALI KELAS
    </div>

    <?php if (!empty($wali)) : ?>
        <div class="d-flex justify-content-center mt-4">
            <table class="table">
                <tr>
                    <td><strong>Nama Guru</strong></td>
                    <td>: <?php echo htmlspecialchars($wali->nama_guru, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>: <?php echo htmlspecialchars($wali->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Tahun Ajaran</strong></td>
                    <td>: <?php echo htmlspecialchars($tahun_ajaran->tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            </table>
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
            Data Wali Kelas tidak ditemukan!
        </div>
    <?php endif; ?>

    <?php echo anchor('administrator/wali', '<div class="btn btn-danger mt-3">Kembali</div>'); ?>
</div>
