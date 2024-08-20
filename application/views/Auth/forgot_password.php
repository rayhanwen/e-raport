<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="flash-data-error" data-flashdata-error="<?= $this->session->flashdata('error'); ?>"></div>
<div class="center">
    <img src="<?= base_url('assets/img/Portfolio/smp2.png') ?>" alt="" class="avatar img-fluid">
    <h1 class="mt-2">Forgot Password</h1>
    <form class="user" method="post" action="<?= base_url('auth/forgot_password'); ?>">
        <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <Label>Email</Label>
        </div>
        <input type="submit" value="Submit">
        <div class="singup_link">
            <a href="<?= base_url('auth') ?>">Back To Login</a>
        </div>
        <?= form_error('email', '<small class="text-danger pl-3">', ' </small>'); ?>
    </form>
</div>