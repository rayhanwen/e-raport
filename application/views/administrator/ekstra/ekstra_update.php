<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Form Update Ekstrakurikuler
	</div>

	<?php if (!empty($ekstra) && is_object($ekstra)) : ?>
		<form method="post" action="<?= base_url('administrator/ekstra/update_aksi') ?>">
			<div class="form-group">
				<label for="nama_ekstra">Nama Ekstrakurikuler</label>
				<input type="hidden" name="id_ekstra" value="<?= $ekstra->id_ekstra ?>">
				<input type="text" name="nama_ekstra" class="form-control" value="<?= isset($ekstra->nama_ekstra) ? $ekstra->nama_ekstra : '' ?>">
			</div>

			<div class="form-group">
				<label for="deskripsi">Deskripsi</label>
				<textarea name="deskripsi" class="form-control"><?= isset($ekstra->deskripsi) ? $ekstra->deskripsi : '' ?></textarea>
			</div>

			<!-- Dropdown untuk memilih nama guru -->
			<div class="form-group">
				<label for="guru">Nama Guru</label>
				<select name="guru" class="form-control">
					<?php foreach ($guru_list as $guru) : ?>
						<option value="<?= $guru->nik; ?>" <?= ($ekstra->nik == $guru->nik) ? 'selected' : ''; ?>><?= $guru->nama_guru; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="text-center">
				<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
				<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
			</div>
		</form>
	<?php else : ?>
		<div class="alert alert-danger" role="alert">
			Data ekstrakurikuler tidak ditemukan.
		</div>
	<?php endif; ?>
</div>