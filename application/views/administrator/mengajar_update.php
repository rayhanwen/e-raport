<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Data Mengajar Mata Pelajaran di Kelas
    </div>

    <center>
        <legend class="mt-3"><strong>Update Data Mata Pelajaran di Kelas</strong></legend>
    </center>

    <div class="d-flex justify-content-center mt-4">
        <table>
            <tr>
                <td><strong>Tahun Akademik</strong></td>
                <td>&nbsp;: <?php echo htmlspecialchars($tahun_ajaran->tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>&nbsp;: <?php echo htmlspecialchars($kelas->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        </table>
    </div>

    <div class="mt-4">
        <?php echo form_open('administrator/mengajar/update_mengajar_aksi'); ?>
            <input type="hidden" name="id_mengajar" value="<?php echo $mengajar->id_mengajar; ?>">
            <input type="hidden" name="id_kelas" value="<?php echo $kelas->id_kelas; ?>">
            <input type="hidden" name="id_tahun" value="<?php echo $tahun_ajaran->id_tahun; ?>">
            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>"> <!-- URL redirect -->

            <div class="form-group">
                <label>Nama Mata Pelajaran</label>
                <select name="id_mapel" class="form-control">
                    <?php foreach ($mapelDropdown as $mapel) : ?>
                        <option value="<?php echo $mapel->id_mapel; ?>" <?php echo ($mapel->id_mapel == $mengajar->id_mapel) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($mapel->nama_mapel, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('id_mapel', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Guru Pengajar</label>
                <select name="nik" class="form-control">
                    <?php foreach ($guruDropdown as $guru) : ?>
                        <option value="<?php echo $guru->nik; ?>" <?php echo ($guru->nik == $mengajar->nik) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($guru->nama_guru, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semester" class="form-control">
                    <option value="Ganjil" <?php echo ($mengajar->semester == 'Ganjil') ? 'selected' : ''; ?>>Ganjil</option>
                    <option value="Genap" <?php echo ($mengajar->semester == 'Genap') ? 'selected' : ''; ?>>Genap</option>
                </select>
                <?php echo form_error('semester', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>KKM</label>
                <input type="text" name="kkm" class="form-control" value="<?php echo htmlspecialchars($mengajar->kkm, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo form_error('kkm', '<small class="text-danger">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Update</button>
            <?php echo anchor('administrator/mengajar/mengajar_aksi/'.$kelas->id_kelas.'/'.$tahun_ajaran->id_tahun, '<button class="btn btn-sm btn-danger">Kembali</button>'); ?>
        <?php echo form_close(); ?>
    </div>
</div>
