<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Form tambah Mata Pelajaran
	</div>

	<div class="card">
		<div class="card-header">
		</div>
		<div class="card-body">
			<form method="post" action="<?php echo base_url('administrator/mapel/tambah_mapel_aksi') ?>">
				<div class="row">
					<div class="form-group col-6">
						<label for="nama_mapel" class="text-primary"><b>Mata Pelajaran</b></label>
						<input type="text" name="nama_mapel" id="nama_mapel" class="form-control" placeholder="Input Mata Pelajaran" required>
						<?php echo form_error('nama_mapel', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
					<div class="form-group col-6">
						<label for="kode_mapel" class="text-primary"><b>Kode Mata Pelajaran</b></label>
						<input type="text" name="kode_mapel" id="kode_mapel" class="form-control" placeholder="Input Kode Mata Pelajaran" required>
						<?php echo form_error('kode_mapel', '<div class="text-danger small ml-3">', '</div>') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="deskripsi" class="text-primary"><b>Deskripsi</b></label>
					<input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Input Deskripsi" required>
					<?php echo form_error('deskripsi', '<div class="text-danger small ml-3">', '</div>') ?>
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
