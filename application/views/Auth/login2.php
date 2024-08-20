    <div class="container-fluid gbr py-3">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-3">

            <div class="col-lg-4">

                <div class="card border-login shadow-lg my-5 p-4">
                    <div class="card-body  p-0">
                        <div class="col-lg">
                            <div class="p-1 m-2">
                                <div class="text-center mb-4">
                                    <img src="<?= base_url() ?>assets/img/Portfolio/smp2.png" width="100" height="80" class="d-inline-block align-top" alt="">
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user " method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username Anda" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" autocomplete="on" id="password" name="password" placeholder="Masukan Password Anda">
                                        <?= form_error('password', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="chek"><label class="text-white ml-2 small">Show Password</label>
                                    </div>

                                    <div class="row justify-content-center mt-2" style="margin-bottom: auto;">
                                        <div class="col-md-4 ">
                                            <button type="submit" class="btn btn-outline-primary btn btn-block">
                                                LOGIN
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--
                                <div class="text-center mt-2">

                                    <a class="small text-gray-100" href="<?= base_url('auth/changePassword') ?> ">Lupa Sandi?</a>
                                </div>
                               
                                <div class="text-center">
                                    <a class="small text-gray-100" href="<?= base_url(); ?>auth/registration">Buat Akun Baru!</a>
                                </div>
-->
                                <div class="mt-3"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="text-center col-lg-12 text-gray-900 " id="footer" style="background-color: 	#00FFFF;">
        <div class="container">
            <div class="text-center">
                <span>
                    <b>Copyright &copy; Andrian Ade Risma </b> | Sistem Informasi Sekolah <?= date('Y'); ?>
                </span>
            </div>

        </div>