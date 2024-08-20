<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Form Tambah Kelas
	</div>

	<div class="card">
		<div class="card-header">
		</div>
		<div class="card-body">
			<form method="post" action="<?= base_url('administrator/kelas/tambah_kelas_aksi') ?>">
				<div class="row">
					<div class="form-group col-6">
						<label for="nama_kelas" class="text-primary"><b>Nama Kelas</b></label>
						<input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="Input Nama Kelas"required>
						<?= form_error('nama_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
					<div class="form-group col-6">
						<label for="kode_kelas" class="text-primary"><b>Kode Kelas</b></label>
						<input type="text" name="kode_kelas" id="kode_kelas" class="form-control" placeholder="Input Kode Kelas" required>
						<?= form_error('kode_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label for="tahun_ajaran" class="text-primary"><b>Tahun Ajaran</b></label>
						<select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
							<option value="">-- Pilih --</option>
							<?php foreach ($tahun_ajaran as $ta) : ?>
								<option value="<?= $ta->id_tahun; ?>"><?= $ta->tahun_ajaran; ?></option>
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
</div>
</div>
<div class="pt-5"></div>
<!-- https://themes.envytheme.com/ecademy/single-instructor/ -->
