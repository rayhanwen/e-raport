<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Daftar Galeri
    </div>
    <?php echo $this->session->flashdata('pesan'); ?>
    <?php echo anchor('administrator/galeri/tambah_galeri', '<button class="btn btn-sm btn-primary mb-3">Tambah Galeri</button>'); ?>
    <table id="galeri_table" class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="sort" data-sort="no">No <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="foto">Foto <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="tanggal_publish">Tanggal Publish <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($galeri)) : ?>
                <?php $no = 1; foreach ($galeri as $glr) : ?>
                <tr>
                    <td class="no"><?php echo $no++; ?></td>
                    <td class="foto">
                        <img src="<?php echo base_url('sisfo_akademikk/assets/uploads/img/galeri/'.$glr->foto); ?>" alt="Foto Galeri" width="300" height="150">
                    </td>
                    <td class="tanggal_publish"><?php echo $glr->tanggal_publish; ?></td>
                    <td>
                        <a href="<?php echo site_url('administrator/galeri/delete/'.$glr->id_galeri); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Belum ada data galeri</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'foto', 'tanggal_publish' ]
    };
    var galeriList = new List('galeri_table', options);
</script>
