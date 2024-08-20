<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Form Edit Siswa
	</div>

	<div class="card">
		<div class="card-body">
			<?php foreach ($siswa as $sw) : ?>
				<form method="post" action="<?php echo base_url('administrator/siswa/update_aksi') ?>" id="formEditSiswa" enctype="multipart/form-data">
					<div class="row">
						<!-- Form group untuk nomor induk siswa -->
						<div class="form-group col-6">
							<label for="nis" class="text-primary"><b>Nomor Induk Siswa</b></label>
							<input type="text" name="nis" id="nis" class="form-control" value="<?php echo $sw->nis ?>" readonly>
							<?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
						</div>

						<!-- Form group untuk nama siswa -->
						<div class="form-group col-6">
							<label for="nama_siswa" class="text-primary"><b>Nama Siswa</b></label>
							<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?php echo $sw->nama_siswa ?>"required>
							<?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>') ?>
						</div>
					</div>

					<div class="row">
						<!-- Form group untuk tempat lahir -->
						<div class="form-group col-4">
							<label for="tempat_lahir" class="text-primary"><b>Tempat Lahir</b></label>
							<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $sw->tempat_lahir ?>" required>
							<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
						</div>
						<!-- Form group untuk tanggal lahir -->
						<div class="form-group col-4">
							<label for="tgl_lahir" class="text-primary"><b>Tanggal Lahir</b></label>
							<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $sw->tgl_lahir ?>" required>
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



				<form method="post" action="<?php echo base_url('administrator/siswa/update_aksi') ?>" id="formEditSiswa" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nomor Induk Siswa</label>
						<input type="text" name="nis" class="form-control" value="<?php echo $sw->nis ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" name="nama_siswa" class="form-control" value="<?php echo $sw->nama_siswa ?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo $sw->alamat ?>">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control">
							<option value="Laki-laki" <?php echo ($sw->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
							<option value="Perempuan" <?php echo ($sw->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $sw->tempat_lahir ?>">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $sw->tgl_lahir ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $sw->email ?>">
					</div>
					<div class="form-group">
						<label>Agama</label>
						<select name="agama" class="form-control">
							<option value="Islam" <?php echo ($sw->agama == 'Islam') ? 'selected' : ''; ?>>Islam</option>
							<option value="Kristen" <?php echo ($sw->agama == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
							<option value="Hindu" <?php echo ($sw->agama == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
							<option value="Budha" <?php echo ($sw->agama == 'Budha') ? 'selected' : ''; ?>>Budha</option>
							<option value="Lainnya" <?php echo ($sw->agama == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Ayah</label>
						<input type="text" name="nama_ayah" class="form-control" value="<?php echo $sw->nama_ayah ?>">
					</div>
					<div class="form-group">
						<label>Pekerjaan Ayah</label>
						<input type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $sw->pekerjaan_ayah ?>">
					</div>
					<div class="form-group">
						<label>Nama Ibu</label>
						<input type="text" name="nama_ibu" class="form-control" value="<?php echo $sw->nama_ibu ?>">
					</div>
					<div class="form-group">
						<label>Pekerjaan Ibu</label>
						<input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $sw->pekerjaan_ibu ?>">
					</div>
					<div class="form-group">
						<div>
							<label for="foto">Foto</label>
						</div>
						<img src="<?php echo base_url('assets/uploads/img/siswa/') . $sw->foto; ?>" alt="Foto guru" style="max-width: 200px; max-height: 200px;">
						<input type="file" name="foto" class="form-control">
						<input type="hidden" name="old_foto" value="<?php echo $sw->foto; ?>">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="text" name="no_telp" class="form-control" value="<?php echo $sw->no_telp ?>">
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
						<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
					</div>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
<div class="pt-5"></div>
