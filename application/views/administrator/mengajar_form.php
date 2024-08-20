<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Tambah Data Mata Pelajaran
    </div>

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo $this->session->flashdata('pesan'); ?>

    <form method="post" action="<?php echo base_url('administrator/mengajar/tambah_mengajar_aksi'); ?>">
        <input type="hidden" name="id_tahun" value="<?php echo htmlspecialchars($id_tahun, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="id_kelas" value="<?php echo htmlspecialchars($id_kelas, ENT_QUOTES, 'UTF-8'); ?>">
        
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <?php echo form_dropdown('id_mapel', $mapelDropdown, set_value('id_mapel'), 'class="form-control"'); ?>
        </div>
        
        <div class="form-group">
            <label>Guru Pengajar</label>
            <?php echo form_dropdown('nik', $guruDropdown, set_value('nik'), 'class="form-control"'); ?>
        </div>
        
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option value="Ganjil" <?php echo set_select('semester', 'Ganjil'); ?>>Ganjil</option>
                <option value="Genap" <?php echo set_select('semester', 'Genap'); ?>>Genap</option>
            </select>
            <?php echo form_error('semester', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label>KKM</label>
            <input type="text" name="kkm" class="form-control" value="<?php echo set_value('kkm'); ?>">
            <?php echo form_error('kkm', '<small class="text-danger">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo anchor('administrator/mengajar', '<button type="button" class="btn btn-danger">Batal</button>'); ?>
    </form>
</div>
