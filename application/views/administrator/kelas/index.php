<div class="container-fluid">
	<div class="card shadow mb-2">
		<div class="card-body">
			<form action="<?= base_url('administrator/kelas') ?>" method="get">
				<div class="row">
					<div class="col-4">
						<select class="form-control js-example-basic-single" name="tahun_ajaran" data-placeholder="Pilih Tahun AJaran">
							<option value=""></option>
							<?php if (isset($get_tahun_ajaran) && is_iterable($get_tahun_ajaran)) : ?>
								<?php foreach ($get_tahun_ajaran as $thn) : ?>
									<option value="<?= $thn->id_tahun ?>"><?= $thn->tahun_ajaran ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-sm btn-primary mt-1"><i class="fas fa-search"></i> Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="card shadow">
		<div class="card-header">
			<!-- Button trigger modal -->
			<button type="button" href="<?= base_url('administrator/kelas/tambah_kelas') ?>" class="btn btn-sm btn-primary btn-add">
				<i class="fas fa-plus"></i> Tambah Kelas
			</button>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white">
					<tr>
						<th>NO</th>
						<th>KODE KELAS</th>
						<th>NAMA KELAS</th>
						<th>WALI KELAS</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (!empty($kelas)) : ?>
						<?php foreach ($kelas as $key => $kls) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $kls->kode_kelas ?></td>
								<td><?= $kls->nama_kelas ?></td>
								<td><?= $kls->wali_kelas ?></td>
								<td>
									<button type="button" href="<?= base_url('administrator/kelas/get_by_id'); ?>" id="<?= $kls->kode_kelas; ?>" data-form="<?= base_url('administrator/kelas/update'); ?>" class="btn btn-sm btn-success btn-edit"><i class="fa fa-edit"></i> Edit</button>
									<button type="button" href="<?= base_url('administrator/kelas/delete'); ?>" id="<?= $kls->kode_kelas; ?>" class="btn btn-sm btn-danger btn-delete mx-1"><i class="fa fa-trash"></i> Hapus</button>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="4" align="center" class="text-danger">Belum ada data kelas</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-6">
							<label for="kode_kelas" class="text-primary"><b>Kode Kelas</b></label>
							<input type="hidden" name="kode_kelas_lama" id="kode_kelas_lama" class="form-control">
							<input type="text" name="kode_kelas" id="kode_kelas" class="form-control" placeholder="Input Kode Kelas" required>
							<div class="invalid-feedback kode_kelas_error"></div>
						</div>
						<div class="form-group col-6">
							<label for="nama_kelas" class="text-primary"><b>Nama Kelas</b></label>
							<input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="Input Nama Kelas" required>
							<div class="invalid-feedback nama_kelas_error"></div>
						</div>
						<div class="form-group col-12">
							<label for="nama_kelas" class="text-primary"><b>Wali Kelas</b></label>
							<select class="form-control js-example-basic-single" name="wali_kelas" id="wali_kelas" data-placeholder="Pilih Wali Kelas" required>
								<?php if (isset($guru) && is_iterable($guru)) : ?>
									<?php foreach ($guru as $key => $val): ?>
										<option value=""></option>
										<option value="<?= $val->nip; ?>"><?= $val->nip; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
							<div class="invalid-feedback nama_kelas_error"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary btn-submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="pt-4"></div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

<script>
	$(".btn-add").on("click", function(e) {
		e.preventDefault();
		$("#formModal").modal("show");
		$('.modal-title').html('Form Input Data');
		let url = $(this).attr('href');
		$('form').attr('action', url);
	})

	$(".btn-edit").on("click", function(e) {
		e.preventDefault();
		$("#formModal").modal("show");
		$('.modal-title').html('Form Update Data');
		let formUrl = $(this).data('form');

		$('form').attr('action', formUrl);

		let href = $(this).attr("href");
		let id = $(this).attr("id");

		$.ajax({
			type: "POST",
			url: href,
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(result) {
				// console.log(result)
				$("#kode_kelas_lama").val(result.kode_kelas);
				$("#kode_kelas").val(result.kode_kelas);
				$("#nama_kelas").val(result.nama_kelas);
				$("#wali_kelas").val(result.wali_kelas).trigger('change');
			},
		});
	});

	$("form").submit(function(e) {
		e.preventDefault();

		var form = $(this)[0];
		var data = new FormData(form);
		let action = $(this).attr("action");

		$.ajax({
			url: action,
			method: "post",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			dataType: "json",
			beforeSend: function() {
				$(".btn-submit").prop("disabled", true);
				$(".btn-submit").html('<i class="fa fa-spin fa-spinner"></i>');
			},
			complete: function() {
				$(".btn-submit").prop("disabled", false);
				$(".btn-submit").html("Simpan");
			},
			success: function(result) {
				console.log(result);

				if (result.error) {
					console.log(result.error);
					if (result.kode_kelas_error != "") {
						$("#kode_kelas").addClass("is-invalid");
						$(".kode_kelas_error").html(result.kode_kelas_error);
					} else {
						$("#kode_kelas").removeClass("is-invalid");
						$("#kode_kelas").addClass("is-valid");
						$(".kode_kelas_error").html("");
					}
					if (result.nama_kelas_error != "") {
						$("#nama_kelas").addClass("is-invalid");
						$(".nama_kelas_error").html(result.nama_kelas_error);
					} else {
						$("#nama_kelas").removeClass("is-invalid");
						$("#nama_kelas").addClass("is-valid");
						$(".nama_kelas_error").html("");
					}
				} else if (result.msg) {
					location.reload();
				} else if (result.alert == "nothing changes") {
					$("#formModal").modal("hide");
				}
			},
		});
	});
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
	var options = {
		valueNames: ['no', 'kode_kelas', 'nama_kelas']
	};
	var kelasList = new List('kelas_table', options);
</script> -->
