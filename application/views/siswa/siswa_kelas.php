<div class="container-fluid">
	<div class="alert alert-dark text-center" role="alert">
		<strong>
			<i class="fas fa-home">
				<?= $walikelas->nama_kelas ?>
				<hr><i class="fas fa-fw fa-user-tie"></i> <?= $walikelas->nama_guru ?> (<?= $walikelas->nik ?>)
			</i>
		</strong>
	</div>
	<!-- DataTales Example -->
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
						<th style="width: 1%">JK</th>
						<!-- <th style="width: 1%">ANGKATAN</th> -->
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
					<?php
					foreach ($siswa as $key => $s) : ?>
						<tr class="" align="center">
							<td><?= $key + 1 ?></td>
							<td><img class="img-profile img-thumbnail" src="<?= base_url('assets/img/profile/') . $s['foto'] ?>" alt="foto" width="35%"></td>
							<td><?= $s['nis'] ?></td>
							<td><?= $s['nama_siswa'] ?></td>
							<?php if ($s['jenis_kelamin'] == "Laki-laki") { ?>
								<td>L</td>
							<?php } else { ?>
								<td>P</td>
							<?php } ?>
							<!-- <td><?= $s['angkatan'] ?></td> -->
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<div class="pt-4"></div>
<!-- End of Main Content -->