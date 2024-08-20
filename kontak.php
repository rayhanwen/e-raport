<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Data kontak
    </div>
    
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <?php echo anchor('administrator/kontak/tambah_kontak', '<button class="btn btn-sm btn-primary mb-3">Tambah kontak</button>') ?>
    
    <table id="kontak_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">NO <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="email">Email <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="no_telp">No whatsapp <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="instagram">Instagram <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($kontak)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($kontak as $kontak): ?>
                    <tr>
                        <td class="no"><?= $no++ ?></td>
                        <td class="email"><?= $kontak->email ?></td>
                        <td class="no_telp"><?= $kontak->no_telp ?></td>
                        <td class="instagram"><?= $kontak->instagram ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php echo anchor('administrator/kontak/update/'.$kontak->id_kontak, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Update</div>') ?>
                                <?php echo form_open('administrator/kontak/hapus/'.$kontak->id_kontak, array('style' => 'display:inline;')) ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?');"><i class="fa fa-trash"></i> Delete</button>
                                <?php echo form_close() ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Belum ada data kontak</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'email', 'no_telp', 'instagram' ]
    };
    var kontakList = new List('kontak_table', options);
</script>
