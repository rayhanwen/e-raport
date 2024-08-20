<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Daftar Wali Kelas
	</div> -->

	<?php echo $this->session->flashdata('pesan'); ?>

	<!-- Display the active academic year -->
	<!-- <div class="alert alert-info">
		Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
	</div> -->

	<div class="card shadow">
		<div class="card-header">
			<?php echo anchor('administrator/wali/tambah_wali', '<button class="btn btn-sm btn-primary mb-3">Tambah Data Guru Wali</button>'); ?>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-hover table-striped">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>KELAS</th>
						<th>WALI KELAS</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<!-- Looping data wali kelas dari database -->
					<?php
					foreach ($wali_kelas as $key => $wali) : ?>
						<tr>
							<td><?= $key + 1; ?></td>
							<td><?= $wali->nama_kelas; ?></td>
							<td><?= $wali->nama_guru; ?></td>
							<td>
								<?= anchor('administrator/wali/update/' . $wali->id_kelas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</div>'); ?>
								<?= anchor('administrator/wali/hapus/' . $wali->id_kelas, '<div class="btn btn-sm btn-danger mx-1"><i class="fa fa-trash"></i> Hapus</div>', ['onclick' => 'return confirm(\'Yakin ingin menghapus data ini?\')']); ?>
								<?= anchor('administrator/wali/detail/' . $wali->id_kelas, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</div>'); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<div class="pt-5"></div>
