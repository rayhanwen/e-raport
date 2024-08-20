<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Guru
	</div> -->
	<?= $this->session->flashdata('pesan') ?>

	<div class="card shadow">
		<div class="card-header">
			<?= anchor('administrator/guru/tambah_guru', '<button class="btn btn-sm btn-primary mb-3">Tambah Guru</button>') ?>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>NAMA LENGKAP</th>
						<th>ALAMAT</th>
						<th>EMAIL</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (empty($guru)) : ?>
						<tr>
							<td colspan="7" class="text-center">Belum ada guru.</td>
						</tr>
					<?php else : ?>
						<?php
						foreach ($guru as $key => $gru) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $gru->nama_guru ?></td>
								<td><?= $gru->alamat ?></td=>
								<td><?= $gru->email ?></td>
								<td>
									<a href="<?= base_url('administrator/guru/biodata/' . $gru->nik) ?>" class="btn btn-primary btn-sm"><i class="fas fa-address-card"></i> Biodata</a>
									<!-- <?= anchor('administrator/guru/detail/' . $gru->nik, 'Detail', array('class' => 'btn btn-info btn-sm')); ?> -->
									<!-- <?= anchor('administrator/guru/update/' . $gru->nik, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> -->
									<!-- <?= anchor('administrator/guru/delete/' . $gru->nik, 'Hapus', array('class' => 'btn btn-danger btn-sm')); ?> -->
									<a href="<?= base_url('administrator/guru/delete/' . $gru->nik) ?>')" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pt-5"></div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'nama_guru', 'alamat', 'email']
	};
	var guruList = new List('guru_table', options);
</script> -->