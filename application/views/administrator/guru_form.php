<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Form tambah guru
	</div>
	<?php echo $this->session->flashdata('pesan') ?>

	<div class="card shadow">
		<div class="card-header">

		</div>
		<div class="card-body">
			<form method="post" action="<?php echo base_url('administrator/guru/tambah_guru_aksi') ?>" enctype="multipart/form-data">
				<!-- Form group untuk nomor induk guru -->
				<div class="form-group">
					<label for="nik">Nomor Induk Guru</label>
					<input type="text" name="nik" id="nik" class="form-control" required>
					<?php echo form_error('nik', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk nama guru -->
				<div class="form-group">
					<label for="nama_guru">Nama Guru</label>
					<input type="text" name="nama_guru" id="nama_guru" class="form-control" required>
					<?php echo form_error('nama_guru', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk alamat -->
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control" required>
					<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk jenis kelamin -->
				<div class="form-group">
					<label for="jenis_kelamin">Jenis Kelamin</label>
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<!-- Form group untuk tempat lahir -->
				<div class="form-group">
					<label for="tempat_lahir">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
					<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk tanggal lahir -->
				<div class="form-group">
					<label for="tgl_lahir">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
					<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk email -->
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
					<?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk agama -->
				<div class="form-group">
					<label for="agama">Agama</label>
					<select name="agama" id="agama" class="form-control" required>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
				<!-- Form group untuk foto -->
				<div class="form-group">
					<label for="foto">Foto</label>
					<input type="file" name="foto" id="foto" class="form-control" required accept=".jpg, .jpeg">
					<small class="text-muted">Format harus berupa JPG atau JPEG</small>
					<?php echo form_error('foto', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk nomor telepon -->
				<div class="form-group">
					<label for="no_telp">Nomor Telepon</label>
					<input type="text" name="no_telp" id="no_telp" class="form-control" required>
					<?php echo form_error('no_telp', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Form group untuk hak akses (idu) -->
				<div class="form-group">
					<label for="idu">Hak Akses</label>
					<!-- Tambahkan input tersembunyi untuk atribut idu -->
					<input type="hidden" name="idu" id="idu" class="form-control">
					<?php echo form_error('idu', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>
				<!-- Tombol simpan -->
				<div class="text-center">
					<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
					<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
				</div>
			</form>
		</div>
	</div>
</div>