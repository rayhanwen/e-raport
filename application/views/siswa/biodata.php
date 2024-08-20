	<div class="container-fluid mt-3">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<div class="flash-data-error" data-flashdata-error="<?= $this->session->flashdata('error'); ?>"></div>
		<div class="card shadow mb-4 mx-2">
			<div class="jumbotron-user card-header py-2 bg-gray-600 ">
				<div class="container text-center mt-3  p-2 mb-2 bg-white rounded" style="width: 25%">
					<img class="img-profile img-thumbnail mb-2 mt-2 shadow-AAR-lg d-none d-sm-inline-block" src="<?= base_url('img/profile/') . $biodata['foto'] ?>" height="150vw" width="150vw">
					<img class="img-profile img-thumbnail mb-2 mt-2 shadow-AAR-lg d-sm-none" src="<?= base_url('img/profile/') . $biodata['foto'] ?>" width="60rem" height="600px">
				</div>
			</div>
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Biodata</a>
					<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Orang tua</a>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<!-- DataTales Example -->
					<div class="card shadow shadow mb-4">
						<div class="card-header py-2">
							<div class="text-center small">
								<b> <i class="fas fa-fw fa-user-graduate text-gray-900"></i></b>
								<b class="text-gray-900">Biodata</b>
							</div>
						</div>
						<div class="card-body">
							<div class="">
								<div class="row mt-3">
									<div class="col-md-6 container">
										<table class="table table-hover text-gray-900">
									</div>

									<tr>
										<td style="width:40%"><b>Nama</b><span class="text-danger">*</span></td>
										<td style="width:"> : <?= $biodata['nama_siswa'] ?></td>
									</tr>
									<tr>
										<td><b>NIS</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['nis'] ?></td>
									</tr>
									<!-- <tr>
										<td><b>NISN</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['nis'] ?></td>
									</tr> -->
									<tr>
										<td><b>Jenis Kelamin</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['jenis_kelamin'] ?></td>
									</tr>
									<tr>
										<td><b>Agama</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['agama'] ?></td>
									</tr>
									<tr>
										<td><b>TTL</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['tempat_lahir'] ?>,
											<?php if ($biodata['tgl_lahir'] != "") { ?>
												<?= tanggal_indonesia($biodata['tgl_lahir']); ?></td>
									<?php } ?>
									</tr>
									<tr>
										<td><b>Alamat</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['alamat'] ?></td>
									</tr>
									<!-- <tr>
										<td><b>Kabupaten</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['kabupaten'] ?></td>
									</tr> -->
									<!-- <tr>
										<td><b>Kecamatan</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['kecamatan'] ?></td>
									</tr> -->
									<!-- <tr>
										<td><b>Kelurahan</b><span class="text-danger">*</span></td>
										<td> : <?= $biodata['kelurahan'] ?></td>
									</tr> -->

									</table>
								</div>
								<div class="col-md-6 container">
									<table class="table  table-hover text-gray-900">
								</div>
								<!-- <tr>
									<td style="width:40%"><b>Rt</b></td>
									<td style="width:"> : <?= $biodata['rt'] ?></td>
								</tr> -->
								<!-- <tr>
									<td><b>Rw</b></td>
									<td> : <?= $biodata['rw'] ?></td>
								</tr>
								<tr>
									<td><b>Kode Pos</b></td>
									<td> : <?= $biodata['kode_pos'] ?></td>
								</tr>
								<tr>
									<td><b>Jenis Tinggal</b></td>
									<td> : <?= $biodata['jenis_tinggal'] ?></td>
								</tr>
								<tr>
									<td><b>Alat Transportasi</b></td>
									<td> : <?= $biodata['alat_transportasi'] ?></td>
								</tr> -->
								<tr>
									<td><b>HP</b></td>
									<td> : <?= $biodata['no_telp'] ?></td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td> : <?= $biodata['email'] ?></td>
								</tr>
								<tr>
									<td><b>Kelas</b></td>
									<td> : <?= $biodata['nama_kelas'] ?></td>
								</tr>
								<!-- <tr>
									<td><b>Angkatan</b><span class="text-danger">*</span></td>
									<td> : <?= $biodata['angkatan'] ?></td>
								</tr> -->
								</table>
							</div>
						</div>
					</div>
					<hr>
					<div align="center">
						<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
						<a class="btn btn-sm btn-outline-primary" href="<?= base_url('siswa/edit_biodata/' . $biodata['nis']); ?>"><i class="fas fas-fw fa-edit"> Edit</i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			<!-- DataTales Example -->
			<div class="card shadow shadow mb-4">
				<div class="card-header py-2 small">
					<div class="text-center">
						<b> <i class="fas fas fa-user-tie text-gray-900"></i></b>
						<b class="text-gray-900"> Data Orangtua</b>
					</div>
				</div>
				<div class="card-body">
					<div class="">
						<div class="row mt-3">
							<div class="col-md-6 container">
								<table class="table  table-hover text-gray-900">
							</div>
							<tr>
								<td style="width:40%"><b>Nama Ayah</b></td>
								<td> : <?= $biodata['nama_ayah'] ?></td>
							</tr>
							<tr>
								<td><b>Tahun Lahir Ayah</b></td>
								<td> : </td>
							</tr>
							<tr>
								<td><b>Pendidikan Ayah</b></td>
								<td> : </td>
							</tr>
							<tr>
								<td><b>Pekerjaan Ayah</b></td>
								<td> : <?= $biodata['pekerjaan_ayah'] ?></td>
							</tr>
							<tr>
								<td><b>Penghasilan ayah</b></td>
								<td> : </td>
							</tr>
							</table>
						</div>
						<div class="col-md-6 container">
							<table class="table  table-hover text-gray-900">
						</div>
						<tr>
							<td style="width:40%"><b>Nama Ibu</b></td>
							<td> : <?= $biodata['nama_ibu'] ?></td>
						</tr>
						<tr>
							<td><b>Tahun Lahir Ibu</b></td>
							<td> : </td>
						</tr>
						<tr>
							<td><b>Pendidikan Ibu</b></td>
							<td> : </td>
						</tr>
						<tr>
							<td><b>Pekerjaan Ibu</b></td>
							<td> : <?= $biodata['pekerjaan_ibu'] ?></td>
						</tr>
						<tr>
							<td><b>Penghasilan Ibu</b></td>
							<td> : </td>
						</tr>
						</table>
					</div>
				</div>
			</div>
			<hr>
			<div align="center">
				<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
				<a class="btn btn-sm btn-outline-primary" href="<?= base_url('siswa/edit_biodata/' . $biodata['nis']); ?>"><i class="fas fas-fw fa-edit"> Edit</i>
				</a>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="pt-5"></div>
