<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Form Tambah Data Wali Kelas
	</div>

	<div class="card shadow">
		<div class="card-header">

		</div>
		<div class="card-body">
			<form method="post" action="<?php echo base_url('administrator/wali/tambah_wali_aksi'); ?>">
				<div class="form-group">
					<label class="text-primary"><b>Nama Guru</b></label>
					<select class="form-control" name="nik" required>
						<option value="">Pilih Nama Guru</option>
						<?php foreach ($guru_list as $guru) : ?>
							<option value="<?php echo $guru->nik; ?>"><?php echo $guru->nama_guru; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-primary"><b>Kelas</b></label>
					<select class="form-control" name="id_kelas" required>
						<option value="">Pilih Kelas</option>
						<?php foreach ($kelas_list as $kelas) : ?>
							<option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="text-primary"><b>Tahun Ajaran</b></label>
					<select class="form-control" name="id_tahun" required>
						<option value="">Pilih Tahun Ajaran</option>
						<?php foreach ($tahun_ajaran_list as $tahun_ajaran) : ?>
							<option value="<?php echo $tahun_ajaran->id_tahun; ?>"><?php echo $tahun_ajaran->tahun_ajaran; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
					<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
				</div>
			</form>
		</div>
	</div>

</div>

<div class="pt-5">

</div>

