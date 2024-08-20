<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-landmark"></i> Data Pengguna
	</div> -->

	<?= $this->session->flashdata('pesan'); ?>

	<!-- <center>
		<legend class="mt-3"><strong>Data Pengguna</strong></legend>
	</center> -->

	<div class="card">
		<div class="card-header">
			<?= anchor('administrator/user/tambah_guru', '<button class="btn btn-sm btn-primary mb-3">Tambah Pengguna Guru/Admin</button>'); ?>
			<?= anchor('administrator/user/tambah_siswa', '<button class="btn btn-sm btn-primary mb-3">Tambah Pengguna Siswa</button>'); ?>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-hover table-striped">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>NAMA LENGKAP</th>
						<th>USERNAME</th>
						<th>EMAIL</th>
						<th>HAK AKSES</th>
						<th colspan="2">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data_pengguna as $key => $pengguna) : ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $pengguna->nama_lengkap; ?></td> <!-- Data Nama Lengkap -->
							<td><?= $pengguna->username; ?></td>
							<td><?= $pengguna->email; ?></td>
							<td><?= $pengguna->hak_akses; ?></td>
							<td>
								<a href="<?= base_url('administrator/user/update/' . $pengguna->idu); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
								<a href="<?= base_url('administrator/user/delete/' . $pengguna->idu); ?>" class="btn btn-sm btn-danger mx-1"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="pt-5"></div>
