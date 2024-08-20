<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="flash-data-error" data-flashdata-error="<?= $this->session->flashdata('error'); ?>"></div>
<div class="center">
    <img src="<?= base_url('assets/img/Portfolio/smp2.png') ?>" alt="" class="avatar img-fluid">
    <h1 class="mt-2">Reset Password</h1>
    <form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
        <div class="txt_field">
            <input type="text" name="username" value="<?= set_value('username'); ?>" required>
            <span></span>
            <Label>Username</Label>
        </div>
        <div class="txt_field">
            <input type="password" name="password1" id="password1" autocomplete="on" required>
            <span></span>
            <Label>Password</Label>
        </div>

        <div class="txt_field">
            <input type="password" name="password2" id="password2" autocomplete="on" required>
            <span></span>
            <Label>Konfirmasi Password</Label>
        </div>
        <?= form_error('password2', '<small class="text-danger">', ' </small>'); ?>
        <div>
            <input type="checkbox" id="chek4"><label class="sejarah-gw ml-2 small">Show Password</label>
        </div>
        <input type="submit" value="Reset">
        <div class="singup_link">
            <a href="<?= base_url('auth') ?>">Back To Login</a>
        </div>
    </form>
</div>