<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="flash-data-error" data-flashdata-error="<?= $this->session->flashdata('error'); ?>"></div>
<div class="flash-data-warning" data-flashdata-warning="<?= $this->session->flashdata('warning'); ?>"></div>
<div class="center">
	<img src="<?= base_url('img/smp.png'); ?>" height="60" width="60" alt="" class="avatar img-fluid">
	<h1>Login</h1>
	<form method="post" action="<?= base_url('auth'); ?>" autocomplete="off">
		<div class="txt_field">
			<input type="text" name="username" autocomplete="off" required autofocus>
			<span></span>
			<Label>Username</Label>
		</div>
		<div class="txt_field">
			<input type="password" name="password" id="password" autocomplete="new-password" required>
			<span></span>
			<Label>Password</Label>
			<div id="toggle" onclick="showHide();"></div>
		</div>
		<!-- <div>
            <input type="checkbox" id="chek"><label class="sejarah-gw ml-2 small">Show Password</label>
        </div> -->
		<input type="submit" value="Login">
		<div class="singup_link">
			Lupa Kata Sandi? <a href="<?= base_url('auth/forgot_password') ?>">Reset Password</a>
		</div>
	</form>
</div>

<script>
	const password = document.getElementById('password');
	const toggle = document.getElementById('toggle');

	function showHide() {
		if (password.type === 'password') {
			password.setAttribute('type', 'text');
			toggle.classList.add('hide')
		} else {
			password.setAttribute('type', 'password');
			toggle.classList.remove('hide')
		}
	}
</script>
