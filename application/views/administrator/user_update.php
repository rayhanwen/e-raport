<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Edit Pengguna
    </div>
    <div>
        <form method="post" action="<?php echo base_url('administrator/user/update_aksi') ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="hidden" name="id" value="<?php echo $user->idu ?>">
                <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $user->email ?>">
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="hak_akses" class="form-control">
                    <option value="admin" <?php echo ($user->hak_akses == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="guru" <?php echo ($user->hak_akses == 'guru') ? 'selected' : ''; ?>>Guru</option>
                    <option value="siswa" <?php echo ($user->hak_akses == 'siswa') ? 'selected' : ''; ?>>Siswa</option>
                </select>
            </div>
            <div class="form-group">
                <label>Blokir</label>
                <select name="blokir" class="form-control">
                    <option value="N" <?php echo ($user->blokir == 'N') ? 'selected' : ''; ?>>Tidak</option>
                    <option value="Y" <?php echo ($user->blokir == 'Y') ? 'selected' : ''; ?>>Ya</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Update</button>
        </form>
    </div>
</div>
