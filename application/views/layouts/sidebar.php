<body id="page-top">

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
	<div class="flash-data-error" data-flashdata-error="<?= $this->session->flashdata('error'); ?>"></div>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('administrator/dashboard') ?>">
				<?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
					<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('guru/dashboard') ?>">
					<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
						<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
						<?php } ?>
						<div class="sidebar-brand-icon">
							<img src="<?= base_url('img/smp.png') ?>" alt="Logo SMP" class="logo" width="50" height="50">
						</div>
						<div class="sidebar-brand-text mx-1">E-Raport<sup></sup></div>
						</a>

						<!-- Divider -->
						<hr class="sidebar-divider">

						<!-- User Information -->
						<!-- <li class="nav-item">
							<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
								<a class="nav-link" href="<?= base_url('administrator/dashboard') ?>">
								<?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
									<a class="nav-link" href="<?= base_url('guru/dashboard') ?>">
									<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
										<a class="nav-link" href="<?= base_url('siswa/dashboard') ?>">
										<?php } ?>
										<div class="d-flex align-items-center">
											<div class="mr-3">
												<i class="fas fa-user fa-2x text-gray-300"></i>
											</div>
											<div>
												<div class="text-white font-weight-bold"><?= $this->session->userdata('username'); ?></div>
												<hr class="sidebar-divider my-1">
												<div class="text-white font-weight-bold small"><?= $this->session->userdata('hak_akses'); ?></div>
											</div>
										</div>
										</a>
						</li> -->

						<!-- Nav Item - Dashboard -->
						<li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
							<?php if ($this->session->userdata('hak_akses') == 'admin') { ?>
								<a class="nav-link" href="<?= base_url('administrator/dashboard') ?>">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									<span>Dashboard</span>
								</a>
							<?php } elseif ($this->session->userdata('hak_akses') == 'Guru') { ?>
								<a class="nav-link" href="<?= base_url('guru/dashboard') ?>">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									<span>Dashboard</span>
								</a>
							<?php } elseif ($this->session->userdata('hak_akses') == 'Siswa') { ?>
								<a class="nav-link" href="<?= base_url('siswa/dashboard') ?>">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									<span>Dashboard</span>
								</a>
							<?php } ?>
						</li>

						<!-- Pengguna -->
						<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
								<a class="nav-link collapsed" href="<?= base_url('administrator/user') ?>">
									<i class="fas fa-fw fa-users"></i>
									<span>Pengguna</span>
								</a>
								<!-- <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
									<div class="bg-white py-2 collapse-inner rounded">
										<h6 class="collapse-header">Menu Pengguna:</h6>
										<a class="collapse-item" href="<?= base_url('administrator/user') ?>">Pengguna</a>
									</div>
								</div> -->
							</li>
						<?php } ?>

						<!-- Data Master -->
						<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'mapel' || $this->uri->segment(2) == 'tahun_ajaran' || $this->uri->segment(2) == 'ekstra' || $this->uri->segment(2) == 'Siswa' || $this->uri->segment(2) == 'Guru' ? 'active' : '' ?>">
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster" aria-expanded="true" aria-controls="collapseDataMaster">
									<i class="fas fa-fw fa-database"></i>
									<span>Data Master</span>
								</a>
								<div id="collapseDataMaster" class="collapse <?= $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'mapel' || $this->uri->segment(2) == 'tahun_ajaran' || $this->uri->segment(2) == 'ekstra' || $this->uri->segment(2) == 'Siswa' || $this->uri->segment(2) == 'Guru' ? 'show' : '' ?>" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
									<div class="bg-white py-2 collapse-inner rounded">
										<h6 class="collapse-header">Menu Data:</h6>
										<a class="collapse-item <?= $this->uri->segment(2) == 'kelas' ? 'active' : '' ?>" href="<?= base_url('administrator/kelas') ?>">Kelas</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'mapel' ? 'active' : '' ?>" href="<?= base_url('administrator/mapel') ?>">Mata Pelajaran</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'tahun_ajaran' ? 'active' : '' ?>" href="<?= base_url('administrator/tahun_ajaran') ?>">Tahun Ajaran</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'ekstra' ? 'active' : '' ?>" href="<?= base_url('administrator/ekstra') ?>">Ekstrakurikuler</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'Siswa' ? 'active' : '' ?>" href="<?= base_url('administrator/siswa') ?>">Siswa</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'Guru' ? 'active' : '' ?>" href="<?= base_url('administrator/guru') ?>">Guru</a>
									</div>
								</div>
							</li>
						<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>

							<li class="nav-item <?= $this->uri->segment(2) == 'siswa_kelas' ? 'active' : '' ?>">
								<a class="nav-link collapsed" href="<?= base_url('siswa/siswa_kelas') ?>">
									<i class="fa fa-home"></i>
									<span>Lihat Kelas</span>
								</a>
							</li>

							<li class="nav-item <?= $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'mapel' || $this->uri->segment(2) == 'tahun_ajaran' || $this->uri->segment(2) == 'ekstra' || $this->uri->segment(2) == 'Siswa' && $this->uri->segment(3) == "" || $this->uri->segment(2) == 'Guru' ? 'active' : '' ?>">
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster" aria-expanded="true" aria-controls="collapseDataMaster">
									<i class="fas fa-fw fa-database"></i>
									<span>Data Master</span>
								</a>
								<div id="collapseDataMaster" class="collapse" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
									<div class="bg-white py-2 collapse-inner rounded">
										<h6 class="collapse-header">Menu Data:</h6>
										<a class="collapse-item" href="<?= base_url('siswa/siswa_kelas') ?>">Kelas</a>
										<a class="collapse-item" href="<?= base_url('siswa/siswa_ekstra') ?>">Ekstrakurikuler</a>
									</div>
								</div>
							</li>
						<?php } ?>

						<!-- Akademik -->
						<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'mengajar' || $this->uri->segment(2) == 'wali' || $this->uri->segment(2) == 'rombel' ? 'active' : '' ?>">
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik" aria-expanded="true" aria-controls="collapseAkademik">
									<i class="fas fa-fw fa-cog"></i>
									<span>Akademik</span>
								</a>
								<div id="collapseAkademik" class="collapse <?= $this->uri->segment(2) == 'mengajar' || $this->uri->segment(2) == 'wali' || $this->uri->segment(2) == 'rombel' ? 'show' : '' ?>" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
									<div class="bg-white py-2 collapse-inner rounded">
										<h6 class="collapse-header">Menu Akademik:</h6>
										<a class="collapse-item <?= $this->uri->segment(2) == 'mengajar' ? 'active' : '' ?>" href="<?= base_url('administrator/mengajar') ?>">Mengajar</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'wali' ? 'active' : '' ?>" href="<?= base_url('administrator/wali') ?>">Wali Kelas</a>
										<a class="collapse-item <?= $this->uri->segment(2) == 'rombel' ? 'active' : '' ?>" href="<?= base_url('administrator/rombel') ?>">Rombongan Kelas</a>
									</div>
								</div>
							</li>
						<?php } ?>


						<!-- Akademik -->
						<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'raport' ? 'active' : '' ?>">
							<?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'raport' || $this->uri->segment(2) == 'Siswa' && $this->uri->segment(3) == "" ? 'active' : '' ?>">
							<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
							<li class="nav-item <?= $this->uri->segment(2) == 'nilai_semester' ? 'active' : '' ?>">
							<?php } ?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenilaian" aria-expanded="true" aria-controls="collapsePenilaian">
								<i class="fas fa-fw fa-cogs"></i>
								<span>Penilaian</span>
							</a>

							<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
								<div id="collapsePenilaian" class="collapse <?= $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'raport' ? 'show' : '' ?>" aria-labelledby="headingPenilaian" data-parent="#accordionSidebar">
								<?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
									<div id="collapsePenilaian" class="collapse <?= $this->uri->segment(2) == 'nilai' || $this->uri->segment(2) == 'raport' || $this->uri->segment(2) == 'Siswa' && $this->uri->segment(3) == "" ? 'show' : '' ?>" aria-labelledby="headingPenilaian" data-parent="#accordionSidebar">
									<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
										<div id="collapsePenilaian" class="collapse <?= $this->uri->segment(2) == 'nilai_semester' ? 'show' : '' ?>" aria-labelledby="headingPenilaian" data-parent="#accordionSidebar">
										<?php } ?>

										<div class="bg-white py-2 collapse-inner rounded">
											<h6 class="collapse-header">Submenu Penilaian:</h6>

											<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>
												<a class="collapse-item <?= $this->uri->segment(2) == 'nilai' ? 'active' : '' ?>" href="<?= base_url('administrator/nilai') ?>">Penilaian</a>
												<a class="collapse-item <?= $this->uri->segment(2) == 'raport' ? 'active' : '' ?>" href="<?= base_url('administrator/raport') ?>">Cetak Raport</a>
											<?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
												<a class="collapse-item <?= $this->uri->segment(2) == 'nilai' ? 'active' : '' ?>" href="<?= base_url('guru/nilai') ?>">Input Nilai</a>
												<a class="collapse-item <?= $this->uri->segment(2) == 'Siswa' ? 'active' : '' ?>" href="<?= base_url('guru/siswa') ?>">Siswa</a>
												<a class="collapse-item <?= $this->uri->segment(2) == 'raport' ? 'active' : '' ?>" href="<?= base_url('guru/raport') ?>">Cetak Raport</a>
											<?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
												<a class="collapse-item <?= $this->uri->segment(2) == 'nilai_semester' ? 'active' : '' ?>" href="<?= base_url('siswa/nilai_semester') ?>">Nilai Semester</a>
											<?php } ?>
										</div>
										</div>
							</li>

							<!-- Info Sekolah -->
							<?php if ($this->session->userdata('hak_akses') === 'Admin') : ?>
								<li class="nav-item">
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
										<i class="fas fa-fw fa-folder"></i>
										<span>Info Sekolah</span>
									</a>
									<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
										<div class="bg-white py-2 collapse-inner rounded">
											<h6 class="collapse-header">Menu Info Sekolah:</h6>
											<a class="collapse-item" href="<?= base_url('administrator/identitas') ?>">Identitas</a>
											<a class="collapse-item" href="<?= base_url('administrator/iklan') ?>">Papan Iklan</a>
											<a class="collapse-item" href="<?= base_url('administrator/informasi') ?>">Informasi Sekolah</a>
											<a class="collapse-item" href="<?= base_url('administrator/tentang_sekolah') ?>">Tentang Sekolah</a>
											<a class="collapse-item" href="<?= base_url('administrator/galeri') ?>">Galeri</a>
											<a class="collapse-item" href="<?= base_url('administrator/kontak') ?>">Kontak</a>
										</div>
									</div>
								</li>
							<?php endif; ?>


							<!-- Logout -->
							<!-- <li class="nav-item">
							<a class="nav-link" href="<?= base_url('administrator/auth/logout') ?>">
								<i class="fas fa-sign-out-alt"></i>
								<span>Logout</span></a>
						</li> -->

							<!-- Divider -->
							<hr class="sidebar-divider d-none d-md-block">

							<!-- Sidebar Toggler (Sidebar) -->
							<div class="text-center d-none d-md-inline">
								<button class="rounded-circle border-0" id="sidebarToggle"></button>
							</div>

		</ul>
		<!-- End of Sidebar -->



		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="navbar-nav">
						<li class="nav-item dropdown no-arrow">
							<div class="nav-link dropdown-toggle text-dark">
								<span class="badge bg-primary">
									<?php
									$tahun_ajaran = $this->db->query('SELECT * FROM tahun_ajaran WHERE status = "Aktif"')->row();
									?>
									<?= !empty($tahun_ajaran->tahun_ajaran) && $tahun_ajaran->tahun_ajaran !== "" ? 'Tahun Ajaran : ' . $tahun_ajaran->tahun_ajaran : "Belum ada tahun ajaran aktif"; ?>
								</span>
							</div>
						</li>
					</ul>


					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">


						<a class="dropdown-item" href="<?= base_url('administrator/guru/biodata/' . $this->session->userdata('idu')); ?>">

						</a>

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>


						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('img/profile/default.jpg'); ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

								<?php if ($this->session->userdata('hak_akses') == "Admin") { ?>

								<?php } elseif ($this->session->userdata('hak_akses') == "Guru") { ?>
									<a class="dropdown-item" href="<?= base_url('administrator/guru/biodata/' . $this->session->userdata('idu')); ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profil
									</a>
								<?php } elseif ($this->session->userdata('hak_akses') == "Siswa") { ?>
									<a class="dropdown-item" href="<?= base_url('administrator/siswa/biodata/' . $this->session->userdata('idu')); ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profil
									</a>
								<?php } ?>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>


					</ul>

				</nav>
