<?php if (!empty($siswa_kelas)): ?>
    <?php $no = 1; ?>
    <?php foreach ($siswa_kelas as $siswa): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $siswa->nis; ?></td>
            <td><?php echo $siswa->nama_siswa; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">Tidak ada siswa dalam kelas ini</td>
    </tr>
<?php endif; ?>
