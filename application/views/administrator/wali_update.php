<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Update Data Wali Kelas
    </div>

    <form method="post" action="<?php echo base_url('administrator/wali/update_aksi'); ?>">
        <input type="hidden" name="id_wali" value="<?php echo $wali->id_wali; ?>">
        <div class="form-group">
            <label>Nama Guru</label>
            <select class="form-control" name="nik">
                <?php foreach ($guru_list as $guru): ?>
                    <option value="<?php echo $guru->nik; ?>" <?php if($guru->nik == $wali->nik) echo 'selected'; ?>><?php echo $guru->nama_guru; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas">
                <?php foreach ($kelas_list as $kelas): ?>
                    <option value="<?php echo $kelas->id_kelas; ?>" <?php if($kelas->id_kelas == $wali->id_kelas) echo 'selected'; ?>><?php echo $kelas->nama_kelas; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="id_tahun" value="<?php echo $wali->id_tahun; ?>">

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <?php echo anchor('administrator/wali', '<div class="btn btn-danger mt-3">Kembali</div>'); ?>
    </form>
</div>
