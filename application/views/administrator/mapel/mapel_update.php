<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Form Edit Mata Pelajaran
	</div>

	<div class="card">
		<div class="card-header">
		</div>
		<div class="card-body">
			<?php foreach ($mapel as $mp) : ?>
				<form method="post" action="<?php echo base_url('administrator/mapel/update_aksi') ?>">
					<div class="row">
						<div class="form-group col-6">
							<label class="text-primary"><b>Nama Mata Pelajaran</b></label>
							<input type="text" name="nama_mapel" class="form-control" value="<?php echo $mp->nama_mapel ?>">
						</div>
						<div class="form-group col-6">
							<label class="text-primary"><b>Kode Mata Pelajaran</b></label>
							<input type="text" name="kode_mapel" class="form-control" value="<?php echo $mp->kode_mapel ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label class="text-primary"><b>Deskripsi</b></label>
							<input type="text" name="deskripsi" class="form-control" value="<?php echo $mp->deskripsi ?>">
						</div>
					</div>
					<!-- Menambahkan input hidden untuk menyimpan id_mapel -->
					<input type="hidden" name="id_mapel" value="<?php echo $mp->id_mapel ?>">
					<hr>
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
