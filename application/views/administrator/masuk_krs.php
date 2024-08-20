<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Halaman Data Mata Pelajaran
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <form method="post" action="<?php echo base_url('administrator/krs/krs_aksi'); ?>">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <?php 
                $query = $this->db->query('SELECT id_tahun, tahun_ajaran, status FROM tahun_ajaran');
                $dropdowns = $query->result();
                $dropdownlist = array();

                foreach ($dropdowns as $dropdown) {
                    $status_text = ($dropdown->status == 'Aktif') ? " (Aktif)" : "";
                    $dropdownlist[$dropdown->id_tahun] = $dropdown->tahun_ajaran . $status_text;
                }

                $id_tahun_kelas = $this->session->userdata('id_tahun');
                echo form_dropdown('id_tahun', $dropdownlist, $id_tahun_kelas, 'class="form-control" id="id_tahun"');
            ?>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <?php
                $query_kelas = $this->db->query('SELECT id_kelas, nama_kelas FROM kelas');
                $kelas = $query_kelas->result();
                $kelasDropdown = array();

                foreach ($kelas as $kelas_item) {
                    $kelasDropdown[$kelas_item->id_kelas] = $kelas_item->nama_kelas;
                }

                echo form_dropdown('id_kelas', $kelasDropdown, '', 'class="form-control" id="id_kelas"');
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>