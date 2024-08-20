<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Tambah Tahun Ajaran
	</div>
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="card shadow">
		<div class="card-header">

		</div>
		<div class="card-body">
			<form action="<?php echo base_url('administrator/tahun_ajaran/tambah'); ?>" method="post">
				<div class="form-group">
					<label for="tahun_ajaran" class="text-primary"><b>Tahun Akademik</b></label>
					<input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Contoh: 2024/2025" required>
					<?php echo form_error('tahun_ajaran', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="status" class="text-primary"><b>Status</b></label>
					<select class="form-control" id="status" name="status" required>
						<option value="Aktif">Aktif</option>
						<option value="Nonaktif">Nonaktif</option>
					</select>
					<?php echo form_error('status', '<small class="text-danger">', '</small>'); ?>
				</div>
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
