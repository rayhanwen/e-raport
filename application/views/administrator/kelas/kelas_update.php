<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Form Update Kelas
	</div>

	<?php foreach ($kelas as $kls) : ?>
		<div class="card">
			<div class="card-header">
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('administrator/kelas/update_aksi') ?>">
					<div class="row">
						<div class="form-group col-6">
							<label for="kode_kelas" class="text-primary"><b>Kode Kelas</b></label>
							<input type="hidden" name="id_kelas" value="<?= $kls->id_kelas ?>">
							<input type="text" name="kode_kelas" class="form-control" value="<?= $kls->kode_kelas ?>" required>
						</div>
						<div class="form-grou col-6">
							<label for="nama_kelas" class="text-primary"><b>Nama Kelas</b></label>
							<input type="text" name="nama_kelas" class="form-control" value="<?= $kls->nama_kelas ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="tahun_ajaran" class="text-primary"><b>Tahun Ajaran</b></label>
							<select name="tahun_ajaran" class="form-control" required>
								<?php foreach ($tahun_ajaran as $ta) : ?>
									<option value="<?= $ta->id_tahun; ?>" <?= ($ta->id_tahun == $kls->id_tahun) ? 'selected' : ''; ?>><?= $ta->tahun_ajaran; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="text-center">
						<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
						<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
					</div>
				</form>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</div>

<div class="pt-4"></div>