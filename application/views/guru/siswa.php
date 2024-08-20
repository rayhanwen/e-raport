<!-- File: siswa_view.php -->

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Siswa
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <table id="siswa_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">NO <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="nama_siswa">NAMA LENGKAP <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="alamat">ALAMAT <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="jenis_kelamin">JENIS KELAMIN <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="email">EMAIL <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
               
                <th colspan="3">AKSI</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if(empty($siswa)): ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada siswa.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach($siswa as $sis) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $sis->nama_siswa ?></td>
                        <td><?php echo $sis->alamat ?></td>
                        <td><?php echo $sis->jenis_kelamin ?></td>
                        <td><?php echo $sis->email ?></td>
                        <td><?php echo anchor('guru/siswa/detail/'.$sis->nis, 'Detail', array('class' => 'btn btn-info btn-sm')); ?></td>
                        <td><?php echo anchor('guru/nilai/nilai_sikap/'.$sis->nis, 'Nilai Sikap', array('class' => 'btn btn-info btn-sm')); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['no', 'nama_siswa', 'alamat', 'jenis_kelamin', 'email', 'nama_kelas']
    };
    var siswaList = new List('siswa_table', options);
</script>
