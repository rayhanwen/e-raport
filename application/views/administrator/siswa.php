<!-- File: siswa_view.php -->

<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Siswa
	</div> -->
	<?= $this->session->flashdata('pesan') ?>
	<div class="card shadow">
		<div class="card-header">
			<?= anchor('administrator/siswa/tambah_siswa', '<button class="btn btn-sm btn-primary mb-3">Tambah Siswa</button>') ?>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>NAMA LENGKAP</th>
						<th>ALAMAT</th>
						<th>L/P</ths=>
						<th>EMAIL</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (empty($siswa)) : ?>
						<tr>
							<td colspan="8" class="text-center">Belum ada siswa.</td>
						</tr>
					<?php else : ?>
						<?php
						foreach ($siswa as $key => $sis) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $sis->nama_siswa ?></td>
								<td><?= $sis->alamat ?></td>
								<td><?= $sis->jenis_kelamin ?></td>
								<td><?= $sis->email ?></td>
								<td>
									<a href="<?= base_url('administrator/siswa/biodata/' . $sis->nis) ?>" class="btn btn-primary btn-sm"><i class="fas fa-address-card"></i> Biodata</a>
									<!-- <?= anchor('administrator/siswa/detail/' . $sis->nis, 'Detail', array('class' => 'btn btn-info btn-sm')); ?> -->
									<!-- <?= anchor('administrator/siswa/update/' . $sis->nis, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> -->
									<!-- <?= anchor('administrator/siswa/delete/' . $sis->nis, 'Hapus', array('class' => 'btn btn-danger btn-sm')); ?> -->
									<a href="<?= base_url('administrator/siswa/delete/' . $sis->nis) ?>" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pt-4"></div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'nama_siswa', 'alamat', 'jenis_kelamin', 'email', 'nama_kelas']
	};
	var siswaList = new List('siswa_table', options);
</script> -->
