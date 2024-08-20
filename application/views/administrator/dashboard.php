<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
	</div>
	<div class="alert alert-success" role="alert">
		<h4 class="alert-heading">Selamat Datang!</h4>
		<p>Selamat datang <strong>
				<?= $this->session->userdata('username'); ?>
			</strong>
			di Sistem Informasi E-Raport SMP Muhammadiyah Jayapura, Anda Login sebagai
			<strong><?= $this->session->userdata('hak_akses'); ?>
			</strong>
		</p>
		<hr>
		<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
			<i class="fas fa-cogs"></i> Control Panel
		</button>
	</div>
</div>
<!-- Button trigger modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fas fa-cogs"></i> Control Panel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">SISWA</a>
						<i class="fas fa-3x fa-user-graduate"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">TAHUN AJARAN</a>
						<i class="fas fa-3x fa-calendar-alt"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">MATA PELAJARAN</a>
						<i class="fas fa-3x fa-edit"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">KELAS</a>
						<i class="fas fa-3x fa-landmark"></i>
					</div>
					<hr>

					<hr>
					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">SEMESTER</a>
						<i class="fas fa-3x fa-graduation-cap"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">GURU</a>
						<i class="fas fa-3x fa-user-tie"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">LAPORAN NILAI</a>
						<i class="fas fa-3x fa-file-alt"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">EKSTRAKULIKULER</a>
						<i class="fas fa-3x fa-running"></i>
					</div>
					<hr>



					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">Informasi Sekolah</a>
						<i class="fas fa-3x fa-bullhorn"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">IDENTITAS</a>
						<i class="fas fa-3x fa-id-card-alt"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">TENTANG SEKOLAH</a>
						<i class="fas fa-3x fa-info-circle"></i>
					</div>
					<hr>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">FASILITAS</a>
						<i class="fas fa-3x fa-laptop"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">GALERI</a>
						<i class="fas fa-3x fa-images"></i>
					</div>

					<div class="col-md-3 text-info text-center">
						<a href="<?= base_url() ?>" class="nav-link small text-info">KONTAK</a>
						<i class="fas fa-3x fa-address-book"></i>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">

		<!-- Guru Card -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Guru</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($guru) ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Murid Card -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Murid</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($siswa) ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Kelas Card -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kelas
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ($kelas) ?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-building fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pengguna Card -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Pengguna</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($pengguna) ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-key fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->


	<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="login.html">Logout</a>
			</div>
		</div>
	</div>
</div>