<div class="container">
    <h2>Update Tentang Sekolah</h2>
    <form action="<?php echo base_url('administrator/tentang_sekolah/update'); ?>" method="post">
        <input type="hidden" name="id_tentang" value="<?php echo $tentang_sekolah->id_tentang; ?>">
        <div class="form-group">
            <label for="sejarah">Sejarah:</label>
            <input type="text" class="form-control" id="sejarah" name="sejarah" value="<?php echo $tentang_sekolah->sejarah; ?>">
        </div>
        <div class="form-group">
            <label for="visi">Visi:</label>
            <input type="text" class="form-control" id="visi" name="visi" value="<?php echo $tentang_sekolah->visi; ?>">
        </div>
        <div class="form-group">
            <label for="misi">Misi:</label>
            <input type="text" class="form-control" id="misi" name="misi" value="<?php echo $tentang_sekolah->misi; ?>">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
