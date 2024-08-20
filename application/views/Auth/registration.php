<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $tittle; ?>
    </title>
    <link rel="icon" type="image / png" size="32x32" href="<?php echo base_url(); ?>assets/img/favicon2.png">


    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/login.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form | Register</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="user_name" name="user_name" placeholder="user name" value="<?= set_value('user_name'); ?>">
                                    <?= form_error('user_name', '<small class="text-danger pl-3">', ' </small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <input class="my-auto ml-3" type="checkbox" id="chek1"><label class="text-dark mt-2 ml-2">Show Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                                <div class="text-center mt-2">
                                    <a class="small" href="<?= base_url(); ?>auth">Sudah Memiliki Akun? Masuk!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>