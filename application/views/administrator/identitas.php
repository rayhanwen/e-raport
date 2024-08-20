<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Data Identitas
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
    
    <?php echo anchor('administrator/identitas/tambah_identitas', '<button class="btn btn-sm btn-primary mb-3">Tambah Identitas</button>') ?>
    
    <table id="identitas_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">NO <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="nama_website">Nama Website <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="alamat">Alamat <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="email">Email <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="no_telp">No Telp <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="npsn">NPSN <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($identitas)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($identitas as $item): ?>
                    <tr>
                        <td class="no"><?= $no++ ?></td>
                        <td class="nama_website"><?= $item->nama_website ?></td>
                        <td class="alamat"><?= $item->alamat ?></td>
                        <td class="email"><?= $item->email ?></td>
                        <td class="no_telp"><?= $item->no_telp ?></td>
                        <td class="npsn"><?= $item->npsn ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php echo anchor('administrator/identitas/edit/'.$item->id_identitas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Update</div>') ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">Belum ada data identitas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'nama_website', 'alamat', 'email', 'no_telp', 'npsn' ]
    };
    var identitasList = new List('identitas_table', options);
</script>
