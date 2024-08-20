<div class="container-fluid">
	<div class="card shadow mb-2">
		<div class="card-body">
			<form action="<?= base_url('administrator/mapel') ?>" method="get">
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
			<button type="button" href="<?= base_url('administrator/mapel/tambah_mapel') ?>" class="btn btn-sm btn-primary btn-add">
				<i class="fas fa-plus"></i> Tambah mapel
			</button>
		</div>
		<div class="card-body">
			<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
				<thead class="bg-primary text-white text-capitalize">
					<tr>
						<th>no</th>
						<th>kode mapel</th>
						<th>nama mapel</th>
						<th>KKM</th>	
						<th>aksi</th>
					</tr>
				</thead>
				<tbody class="list">
					<?php if (!empty($mapel)) : ?>
						<?php foreach ($mapel as $key => $kls) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $kls->kode_mapel ?></td>
								<td><?= $kls->nama_mapel ?></td>
								<td><?= $kls->kkm ?></td>
								<td>
									<button type="button" href="<?= base_url('administrator/mapel/get_by_id'); ?>" id="<?= $kls->kode_mapel; ?>" data-form="<?= base_url('administrator/mapel/update'); ?>" class="btn btn-sm btn-success btn-edit"><i class="fa fa-edit"></i> Edit</button>
									<button type="button" href="<?= base_url('administrator/mapel/delete'); ?>" id="<?= $kls->kode_mapel; ?>" class="btn btn-sm btn-danger btn-delete mx-1"><i class="fa fa-trash"></i> Hapus</button>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="4" align="center" class="text-danger">Belum ada data mapel</td>
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
							<label for="kode_mapel" class="text-primary text-capitalize"><b>kode mapel</b></label>
							<input type="hidden" name="kode_mapel_lama" id="kode_mapel_lama" class="form-control">
							<input type="text" name="kode_mapel" id="kode_mapel" class="form-control" placeholder="Input Kode mapel" required>
							<div class="invalid-feedback kode_mapel_error"></div>
						</div>
						<div class="form-group col-6">
							<label for="nama_mapel" class="text-primary text-capitalize"><b>nama mapel</b></label>
							<input type="text" name="nama_mapel" id="nama_mapel" class="form-control" placeholder="Input Nama mapel" required>
							<div class="invalid-feedback nama_mapel_error"></div>
						</div>
						<div class="form-group col-6">
							<label for="kkm" class="text-primary text-capitalize"><b>kkm</b></label>
							<input type="text" name="kkm" id="kkm" class="form-control" placeholder="Input kkm" required>
							<div class="invalid-feedback kkm_error"></div>
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
				$("#kode_mapel_lama").val(result.kode_mapel);
				$("#kode_mapel").val(result.kode_mapel);
				$("#nama_mapel").val(result.nama_mapel);
				$("#kkm").val(result.kkm);
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
					if (result.kode_mapel_error != "") {
						$("#kode_mapel").addClass("is-invalid");
						$(".kode_mapel_error").html(result.kode_mapel_error);
					} else {
						$("#kode_mapel").removeClass("is-invalid");
						$("#kode_mapel").addClass("is-valid");
						$(".kode_mapel_error").html("");
					}
					if (result.nama_mapel_error != "") {
						$("#nama_mapel").addClass("is-invalid");
						$(".nama_mapel_error").html(result.nama_mapel_error);
					} else {
						$("#nama_mapel").removeClass("is-invalid");
						$("#nama_mapel").addClass("is-valid");
						$(".nama_mapel_error").html("");
					}
					if (result.kkm_error != "") {
						$("#kkm").addClass("is-invalid");
						$(".kkm_error").html(result.kkm_error);
					} else {
						$("#kkm").removeClass("is-invalid");
						$("#kkm").addClass("is-valid");
						$(".kkm_error").html("");
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
		valueNames: ['no', 'kode_mapel', 'nama_mapel']
	};
	var mapelList = new List('mapel_table', options);
</script> -->
