<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Data Tentang Sekolah
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
    
    <?php echo anchor('administrator/tentang_sekolah/edit/' . $tentang_sekolah[0]->id_tentang, '<button class="btn btn-sm btn-primary mb-3">Edit Tentang Sekolah</button>') ?>
    
    <table id="tentang_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="sejarah">Sejarah <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="visi">Visi <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="misi">Misi <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($tentang_sekolah)) : ?>
                <?php foreach ($tentang_sekolah as $item): ?>
                    <tr>
                        <td class="sejarah"><?= $item->sejarah ?></td>
                        <td class="visi"><?= $item->visi ?></td>
                        <td class="misi"><?= $item->misi ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php echo anchor('administrator/tentang_sekolah/edit/' . $item->id_tentang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Update</div>') ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Belum ada data tentang sekolah</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['sejarah', 'visi', 'misi']
    };
    var tentangList = new List('tentang_table', options);
</script>
