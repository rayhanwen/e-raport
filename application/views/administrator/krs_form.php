<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Tambah Rencana Studi
    </div>

    <form method="post" action="<?php echo base_url('administrator/krs/tambah_krs_aksi'); ?>">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="hidden" name="id_tahun" class="form-control" value="<?php echo htmlspecialchars($id_tahun, ENT_QUOTES, 'UTF-8'); ?>"/>
            <input type="hidden" name="id_krs" class="form-control" value="<?php echo htmlspecialchars($id_krs, ENT_QUOTES, 'UTF-8'); ?>"/>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?>" readonly/>
        </div>
        
        <div class="form-group">
            <label>Kelas</label>
            <input type="hidden" name="id_kelas" class="form-control" value="<?php echo htmlspecialchars($id_kelas, ENT_QUOTES, 'UTF-8'); ?>"/>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($nama_kelas, ENT_QUOTES, 'UTF-8'); ?>" readonly/>
        </div>

        <div class="form-group">
            <label>Mata Pelajaran</label>
            <?php
            $query = $this->db->query('SELECT id_mapel, nama_mapel FROM mapel');
            $dropdowns = $query->result();
            $dropdownList = array();
            foreach($dropdowns as $dropdown){
                $dropdownList[$dropdown->id_mapel] = $dropdown->nama_mapel;
            }
            echo form_dropdown('id_mapel', $dropdownList, set_value('id_mapel'), 'class="form-control" id="id_mapel"');
            ?>
        </div>

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" value="<?php echo set_value('nis'); ?>"/>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
        <?php echo anchor('administrator/krs', '<div class="btn btn-sm btn-danger">Cancel</div>'); ?>
    </form>
</div>
