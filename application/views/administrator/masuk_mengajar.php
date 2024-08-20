	<div class="container-fluid">
		<!-- <div class="alert alert-success" role="alert">
			<i class="fas fa-edit"></i> Form Halaman Data Mengajar Kelas
		</div> -->

		<?= $this->session->flashdata('pesan'); ?>

		<!-- <div class="alert alert-info">
			Tahun Ajaran Aktif: <?= isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
		</div> -->

		<div class="card shadow">
			<div class="card-body">
				<form method="post" action="<?= base_url('administrator/mengajar/mengajar_aksi'); ?>">
					<div class="form-group">
						<?php
						$query_kelas = $this->db->query('SELECT id_kelas, nama_kelas FROM kelas');
						$kelas = $query_kelas->result();
						?>
						<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-hover table-striped">
							<thead class="bg-primary text-white text-uppercase">
								<tr>
									<th>NO</th> <!-- tambahkan sort disini -->
									<th>Nama Kelas</th> <!-- dan disini -->
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kelas as $key => $kelas_item) : ?>
									<tr>
										<td><?= $key + 1; ?></td>
										<td><?= htmlspecialchars($kelas_item->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
										<td>
											<button type="submit" name="id_kelas" value="<?= $kelas_item->id_kelas; ?>" class="btn btn-sm btn-outline-primary">Pilih</button>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="pt-5"></div>
	<!-- <script type="text/javascript">
		$(document).ready(function() {
			$('#kelasTable').DataTable({
				"order": [
					[0, "asc"],
					[1, "asc"]
				] // Mengurutkan berdasarkan kolom "NO" dan "Nama Kelas" secara ascending
			});
		});
	</script> -->
	<!-- </body>

</html> -->
