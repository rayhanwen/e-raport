<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Form tambah pengguna
        </div>

        <?= $this->session->flashdata('pesan') ?>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="<?= base_url('administrator/user/tambah_guru_aksi'); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Pilih Guru</h5>
                            <div class="form-group">
                                <select name="guru" id="guru" class="form-control" onchange="updateEmail()">
                                    <option value="">--Pilih Guru--</option>
                                    <?php foreach ($data_guru as $guru): ?>
                                        <option value="<?php echo $guru->nik; ?>" data-email="<?php echo $guru->email; ?>"><?php echo $guru->nama_guru; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5>Peran</h5>
                            <div class="form-group">
                                <select name="hak_akses" class="form-control">
                                    <option value="guru">Guru</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="email" id="email">

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Username</h5>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" onkeyup="validasiInput();" placeholder="username">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5>Password</h5>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" onkeyup="validasiInput();" placeholder="password">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" id="btnSubmit" class="btn btn-success" disabled="true" style="margin-top: 30px;">Tambah</button>
                </form>
                <?php echo anchor('administrator/user', '<button class="btn btn-danger" style="margin-top: 10px;">Kembali</button>'); ?>                
            </div>
        </div>
    </div>
</body>
<script>
    function updateEmail() {
        var guruSelect = document.getElementById('guru');
        var emailInput = document.getElementById('email');
        var selectedOption = guruSelect.options[guruSelect.selectedIndex];
        emailInput.value = selectedOption.getAttribute('data-email');
        validasiInput();
    }

    function validasiInput() {
        var usr = document.getElementById('username');
        var email = document.getElementById('email');
        var pass = document.getElementById('password');
        if (usr.value && email.value && pass.value) {
            document.getElementById('btnSubmit').disabled = false;
        } else {
            document.getElementById('btnSubmit').disabled = true;
        }
    }
</script>
</html>
