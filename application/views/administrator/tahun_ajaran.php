<div class="container-fluid">
	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Tahun Ajaran
	</div> -->
	<?php echo $this->session->flashdata('pesan') ?>

	<div class="card shadow">
		<div class="card-header">
			<?php echo anchor('administrator/tahun_ajaran/tambah', '<button class="btn btn-sm btn-primary mb-3">Tambah Tahun Ajaran</button>') ?>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-hover table-bordered table-striped">
				<thead class="bg-primary text-white text-uppercase">
					<tr>
						<th>NO</th>
						<th>Tahun Akademik</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (!empty($tahun_ajaran)) : ?>
						<?php $no = 1; ?>
						<?php foreach ($tahun_ajaran as $ta) : ?>
							<tr>
								<td class="no"><?php echo $no++ ?></td>
								<td class="tahun_akademik"><?php echo $ta->tahun_ajaran ?></td>
								<td class="status"><?php echo $ta->status ?></td>
								<td>
									<a href="<?php echo base_url('administrator/tahun_ajaran/edit/' . $ta->id_tahun); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
									<a href="<?php echo base_url('administrator/tahun_ajaran/delete/' . $ta->id_tahun); ?>" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="4">Belum ada data tahun ajaran</td>
						</tr>
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
		valueNames: ['no', 'tahun_akademik', 'status']
	};
	var tahunAjaranList = new List('tahun_ajaran_table', options);
</script> -->
