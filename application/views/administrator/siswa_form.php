<div class="container-fluid">
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="card shadow">
		<div class="card-header">
			<div class="alert alert-success" role="alert">
				<i class="fas fa-landmark"></i> Form tambah Siswa
			</div>
		</div>
		<div class="card-body">
			<form method="post" action="<?php echo base_url('administrator/siswa/tambah_siswa_aksi') ?>" enctype="multipart/form-data">
				<div class="row">
					<!-- Form group untuk nomor induk siswa -->
					<div class="form-group col-6">
						<label for="nis" class="text-primary"><b>Nomor Induk Siswa</b></label>
						<input type="text" name="nis" id="nis" class="form-control" required>
						<?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>

					<!-- Form group untuk nama siswa -->
					<div class="form-group col-6">
						<label for="nama_siswa" class="text-primary"><b>Nama Siswa</b></label>
						<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required>
						<?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>

				<div class="row">
					<!-- Form group untuk tempat lahir -->
					<div class="form-group col-4">
						<label for="tempat_lahir" class="text-primary"><b>Tempat Lahir</b></label>
						<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
						<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
					<!-- Form group untuk tanggal lahir -->
					<div class="form-group col-4">
						<label for="tgl_lahir" class="text-primary"><b>Tanggal Lahir</b></label>
						<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
						<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
					<!-- Form group untuk jenis kelamin -->
					<div class="form-group col-4">
						<label for="jenis_kelamin" class="text-primary"><b>Jenis Kelamin</b></label>
						<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
							<option value="">-- Pilih --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<!-- Form group untuk agama -->
				<div class="form-group">
					<label for="agama" class="text-primary"><b>Agama</b></label>
					<select name="agama" id="agama" class="form-control" required>
						<option value="">-- Pilih --</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Lainnya">Lainnya</option>
					</select>
					<?php echo form_error('agama', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<!-- Form group untuk alamat -->
				<div class="form-group">
					<label for="alamat" class="text-primary"><b>Alamat</b></label>
					<textarea type="text" name="alamat" id="alamat" class="form-control" required></textarea>
					<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<div class="row">
					<!-- Form group untuk nama ayah -->
					<div class="form-group col-6">
						<label for="nama_ayah" class="text-primary"><b>Nama Ayah</b></label>
						<input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
						<?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>

					<!-- Form group untuk pekerjaan ayah -->
					<div class="form-group col-6">
						<label for="pekerjaan_ayah" class="text-primary"><b>Pekerjaan Ayah</b></label>
						<input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
						<?php echo form_error('pekerjaan_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>

				<div class="row">
					<!-- Form group untuk nama ibu -->
					<div class="form-group col-6">
						<label for="nama_ibu" class="text-primary"><b>Nama Ibu</b></label>
						<input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
						<?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>

					<!-- Form group untuk pekerjaan ibu -->
					<div class="form-group col-6">
						<label for="pekerjaan_ibu" class="text-primary"><b>Pekerjaan Ibu</b></label>
						<input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
						<?php echo form_error('pekerjaan_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>

				<!-- Form group untuk kelas -->
				<div class="form-group">
					<label for="id_kelas" class="text-primary"><b>Kelas</b></label>
					<select name="id_kelas" id="id_kelas" class="form-control" required>
						<option value="">-- Pilih --</option>
						<?php foreach ($kelas as $kls) : ?>
							<option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->nama_kelas; ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('id_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<div class="row">
					<!-- Form group untuk nomor telepon -->
					<div class="form-group col-6">
						<label for="no_telp" class="text-primary"><b>Nomor Telepon</b></label>
						<input type="text" name="no_telp" id="no_telp" class="form-control" required>
						<?php echo form_error('no_telp', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
					<!-- Form group untuk email -->
					<div class="form-group col-6">
						<label for="email" class="text-primary"><b>Email</b></label>
						<input type="email" name="email" id="email" class="form-control" required>
						<?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>

				<!-- Form group untuk foto -->
				<div class="form-group">
					<label for="foto" class="text-primary"><b>Foto</b></label>
					<input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .jpeg">
					<small class="text-muted">Format harus berupa JPG atau JPEG</small>
					<?php echo form_error('foto', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>


				<div class="text-center">
					<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
					<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="pt-5"></div>
