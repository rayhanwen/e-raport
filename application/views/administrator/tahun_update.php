<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Update Tahun Ajaran
	</div>
	<div class="card shadow">
		<div class="card-header">

		</div>
		<div class="card-body">
			<form action="<?= base_url('administrator/tahun_ajaran/update'); ?>" method="post">
				<div class="form-group">
					<label for="tahun_ajaran" class="text-primary"><b>Tahun Akademik</b></label>
					<input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $tahun_ajaran->tahun_ajaran; ?>" required>
				</div>
				<div class="form-group">
					<label for="status" class="text-primary"><b>Status</b></label>
					<select class="form-control" id="status" name="status" required>
						<option value="Aktif" <?php if ($tahun_ajaran->status == 'Aktif') echo 'selected'; ?>>Aktif</option>
						<option value="Tidak Aktif" <?php if ($tahun_ajaran->status == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
					</select>
				</div>
				<input type="hidden" name="id_tahun" value="<?= $tahun_ajaran->id_tahun; ?>">
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
