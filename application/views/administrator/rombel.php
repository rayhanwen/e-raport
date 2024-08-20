	<div class="container-fluid">
		<div class="alert alert-success" role="alert">
			<i class="fas fa-landmark"></i> Daftar Tingkatan Kelas Siswa
		</div>
		<div>
			<div class="alert alert-info">
				Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h5>Pilih Kelas Asal dan Tahun Aktif</h5>
				<form id="form_pilih_kelas">
					<div class="row">
						<div class="form-group col-6">
							<select name="id_kelas" id="kelas_asal" class="form-control">
								<option value="">Pilih Kelas Asal</option>
								<?php foreach ($kelas_asal as $kelas) : ?>
									<option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-6">
							<select name="tahun_asal" id="tahun_asal" class="form-control">
								<?php foreach ($tahun_ajaran as $tahun) : ?>
									<option value="<?php echo $tahun->id_tahun; ?>" <?= ($tahun->id_tahun == $tahun_ajaran_aktif->id_tahun) ? 'selected="True"' : ''; ?>><?php echo $tahun->tahun_ajaran; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Pilih</button>

					<hr>
					<div class="card">
						<div class="card-body shadow">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th><input type="checkbox" id="select_all" onchange="checkAll(this)"></th>
										<th>No</th>
										<th>NIS</th>
										<th>Nama Siswa</th>
									</tr>
								</thead>
								<tbody id="siswa_table">
									<tr>
										<td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>

			<div class="col-md-6">
				<h5>Pilih Kelas Tujuan</h5>
				<form id="form_pindah_siswa">
					<div class="row">
						<div class="form-group col-6">
							<select name="id_kelas_tujuan" id="kelas_tujuan" class="form-control">
								<option value="">Pilih Kelas dan Tahun Tujuan</option>
								<?php foreach ($kelas_asal as $kelas) : ?>
									<option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-6">
							<select name="tahun_tujuan" id="tahun_tujuan" class="form-control">
								<?php foreach ($tahun_ajaran as $tahun) : ?>
									<option value="<?php echo $tahun->id_tahun; ?>" <?= ($tahun->id_tahun == $tahun_ajaran_aktif->id_tahun) ? 'selected="True"' : ''; ?>><?php echo $tahun->tahun_ajaran; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<button type="submit" id="btnPindah" class="btn btn-sm btn-primary" disabled="true">Pindah yang terpilih ke Kelas Tujuan</button>

					<hr>
					<div class="card">
						<div class="card-body shadow">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>NIS</th>
										<th>Nama Siswa</th>
									</tr>
								</thead>
								<tbody id="siswa_tujuan_table">
									<tr>
										<td colspan="5" class="text-center">Pilih kelas tujuan terlebih dahulu</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		function checkAll(box) {
			let checkboxes = document.getElementsByTagName('input');
			if (box.checked) { // jika checkbox teratar dipilih maka semua tag input juga dipilih
				for (let i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = true;
					}
				}
			} else { // jika checkbox teratas tidak dipilih maka semua tag input juga tidak dipilih
				for (let i = 0; i > checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}

		$(document).ready(function() {
			// Tampilkan data siswa kelas asal ketika pilih kelas asal ketika tekan tombol pilih
			$('#form_pilih_kelas').submit(function(e) {
				e.preventDefault();
				tampilkan_data_siswa_kelas_asal();
			});

			// Tampilkan data siswa kelas tujuan ketika mengganti input select kelas tujuan
			$('#kelas_tujuan').change(function(e) {
				e.preventDefault();
				tampilkan_data_siswa_kelas_tujuan();
			});

			// Tampilkan data siswa kelas tujuan ketika mengganti input select tahun tujuan
			$('#tahun_tujuan').change(function(e) {
				e.preventDefault();
				tampilkan_data_siswa_kelas_tujuan();
			});

			// Pindahkan data siswa dari kelas asal ke kelas tujuan ketika tekan tombol pindahkan yang terpilih
			$('#form_pindah_siswa').submit(function(e) {
				e.preventDefault();
				var $this = $('#btnPindah'); //submit button selector using ID
				var $caption = $this.html(); // We store the html content of the submit button
				var form = "#form_pilih_kelas"; //defined the #form ID
				var formData = $(form).serializeArray(); //serialize the form into array
				var route = "<?php echo base_url('administrator/rombel/transfer_siswa_terpilih'); ?>" //get the route using attribute action
				var id_kelas = $('#kelas_tujuan').val();
				var id_tahun = $('#tahun_tujuan').val();

				// Ajax config
				$.ajax({
					type: "POST", //we are using POST method to submit the data to the server side
					url: route, // get the route value
					data: {
						sw: formData,
						id_kelas: id_kelas,
						id_tahun: id_tahun
					}, // our serialized array data for server side
					beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click
						$this.attr('disabled', true).html("Memindahkan...");
					},
					success: function(response) {

						// refresh data dari kedua tabel
						tampilkan_data_siswa_kelas_asal();
						tampilkan_data_siswa_kelas_tujuan();
					},
					complete: function() {
						$this.attr('disabled', false).html($caption);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						// Tampilkan error pesan
						$('#siswa_tujuan_table').html('<tr><td colspan="5" class="text-center">Terjadi kesalahan, silakan coba lagi.</td></tr>');
					}
				});
			});

			// fungsi ajax tampilkan data siswa kelas tujuan
			function tampilkan_data_siswa_kelas_tujuan() {
				var id_kelas_tujuan = $('#kelas_tujuan').val();
				var id_tahun_tujuan = $('#tahun_tujuan').val();
				if (id_kelas_tujuan) {
					$.ajax({
						url: "<?php echo base_url('administrator/rombel/get_siswa_by_kelas'); ?>",
						type: "POST",
						data: {
							id_kelas: id_kelas_tujuan,
							id_tahun: id_tahun_tujuan,
							asal: false
						},
						success: function(data) {
							console.log("Response Data:", data); // Debugging log
							$('#siswa_tujuan_table').html(data); // Menampilkan data siswa ke dalam tabel
							$('#btnPindah').attr('disabled', false);
						},
						error: function(xhr, status, error) {
							console.log("Ajax Error:", xhr.responseText); // Debugging log
							$('#siswa_tujuan_table').html('<tr><td colspan="5" class="text-center">Terjadi kesalahan, silakan coba lagi.</td></tr>');
						}
					});
				} else {
					$('#siswa_tujuan_table').html('<tr><td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td></tr>');
				}
			}

			// fungsi ajax tampilkan data siswa kelas asal
			function tampilkan_data_siswa_kelas_asal() {
				var id_kelas = $('#kelas_asal').val();
				var id_tahun = $('#tahun_asal').val();
				if (id_kelas) {
					$.ajax({
						url: "<?php echo base_url('administrator/rombel/get_siswa_by_kelas'); ?>",
						type: "POST",
						data: {
							id_kelas: id_kelas,
							id_tahun: id_tahun,
							asal: true
						},
						success: function(data) {
							console.log("Response Data:", data); // Debugging log
							$('#siswa_table').html(data); // Menampilkan data siswa ke dalam tabel
						},
						error: function(xhr, status, error) {
							console.log("Ajax Error:", xhr.responseText); // Debugging log
							$('#siswa_table').html('<tr><td colspan="5" class="text-center">Terjadi kesalahan, silakan coba lagi.</td></tr>');
						}
					});
				} else {
					$('#siswa_table').html('<tr><td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td></tr>');
				}
			}
		});
	</script>