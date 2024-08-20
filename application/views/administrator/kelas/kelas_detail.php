<div class="container-fluid">
	<div class="alert alert-dark text-center" role="alert">
		<strong>
			<i class="fas fa-home">
				<?= $walikelas->nama_kelas ?>
				<hr><i class="fas fa-fw fa-user-tie"></i> <?= $walikelas->nama_guru ?> (<a href="<?= base_url() . 'administrator/guru/biodata/' . $walikelas->nik ?>"><?= $walikelas->nik ?></a>)
			</i>
		</strong>
	</div>
	<div class="card shadow">
		<div class="card-header py-2">

		</div>
		<div class="card-body">
			<table class="table-responsive table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align=" center">
						<th style="width: 1%;">NO</th>
						<th style="width: 5%">FOTO</th>
						<th style="width: 5%;">NIS</th>
						<th style="width: 10%">NAMA</th>
						<th style="width: 5%">JENIS KELAMIN</th>
						<th style="width: 1%">Alamat</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($siswa)) : ?>
						<tr>
							<td colspan="8">
								<div class="alert alert-danger text-center" role="alert">
									Data tidak ditemukan
								</div>
							</td>
						</tr>
					<?php endif; ?>
					<?php foreach ($siswa as $key => $sw) : ?>
						<tr>
							<td><?= $key + 1; ?></td>
							<td><img class="img-profile img-thumbnail" src="<?= base_url('assets/img/profile/') . $sw->foto ?>" alt="foto" width="35%"></td>
							<td><?= $sw->nis; ?></td>
							<td><?= $sw->nama_siswa; ?></td>
							<td><?= $sw->jenis_kelamin; ?></td>
							<td><?= $sw->alamat; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<div class="pt-4"></div>
