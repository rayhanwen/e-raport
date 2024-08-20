<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-carousel {
            max-height: 800px;
            overflow: hidden;
        }

        .custom-carousel .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .carousel-image {
            max-width: 5000px;
            max-height: 5000px;
        }

        .d-none {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Navbar Atas -->
    <nav class="navbar navbar-light bg-primary text-light">
        <?php if (!empty($identitas)): ?>
        <a class="navbar-brand">
            <strong style="color: white;">
                <img src="<?php echo base_url('assets/img/smp.png') ?>" alt="Logo SMP" class="logo" width="50" height="50">
                <?php echo $identitas[0]->nama_website; ?>
            </strong>
        </a>
        <span class="small"><?php echo $identitas[0]->alamat; ?></span>
        <span class="small"><?php echo $identitas[0]->email; ?></span>
        <span class="small"><?php echo $identitas[0]->no_telp; ?></span>
        <?php endif; ?>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="button" onclick="window.location.href='<?php echo base_url('landing_page/login'); ?>'">Login</button>
        </form>
    </nav>

   <!-- Navbar Bawah -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-foto"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a class="nav-link ml-3" href="#">BERANDA <span class="sr-only">(current)</span></a>
            <a class="nav-link ml-3" href="#" id="scrollToTentangSekolah">TENTANG SEKOLAH</a>
            <a class="nav-link ml-3" href="#" id="scrollToInformasi">INFORMASI</a>
            <a class="nav-link ml-3" href="#" id="scrollTogaleri">GALERI</a>
            <a class="nav-link ml-3" href="#" id="scrollToKontakKami">KONTAK KAMI</a>
        </div>
    </div>
</nav>


    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide custom-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($iklan as $key => $ikl) : ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" <?= $key === 0 ? 'class="active"' : '' ?>></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($iklan as $key => $ikl) : ?>
            <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/iklan/' . $ikl->foto) ?>" class="d-block w-100 carousel-image" alt="Iklan <?= $key + 1 ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-foto" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-foto" aria-hidden="true"></span>
            <span class="sr-only">Selanjutnya</span>
        </a>
    </div>

<!-- Tentang Sekolah dan Kontak Kami Section -->
<div class="container-fluid mt-4"> 
    <div class="row">
        <!-- Tentang Sekolah -->
        <div class="col-md-7">
            <div class="alert alert-success" role="alert" id="tentangSekolahSection">
                <i class="fas fa-info-circle"></i> <strong>TENTANG SEKOLAH</strong>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success') ?>
            </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <?php foreach ($tentang as $ttg) : ?>
            <div class="card text-center m-5">
                <div class="card-body">
                    <h5 class="card-title"><strong>SEJARAH, VISI DAN MISI SEKOLAH</strong></h5>
                    <p class="card-text">
                        <span class="short-text"><?= word_limiter($ttg->sejarah, 75) ?></span>
                        <span class="full-text d-none"><?= $ttg->sejarah ?></span>
                    </p>
                    <button type="button" class="btn btn-primary toggle-text" data-toggle="modal" data-target="#modalSejarah">
                        Selengkapnya...
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalSejarah" tabindex="-1" aria-labelledby="modalSejarahLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSejarahLabel"><strong>TENTANG SEKOLAH</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-justify">
                            <strong>SEJARAH SEKOLAH</strong>
                            <p class="card-text"><?= $ttg->sejarah ?></p>
                            <br>
                            <strong>VISI</strong>
                            <p class="card-text"><?= $ttg->visi ?></p>
                            <br>
                            <strong>MISI</strong>
                            <p class="card-text"><?= $ttg->misi ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Garis Vertikal -->
        <div class="col-md-1 d-flex justify-content-center">
            <div style="border-left: 2px solid #ddd; height: 100%;"></div>
        </div>

        <!-- Kontak Kami -->
        <div class="col-md-4">
            <div class="alert alert-danger" role="alert" id="kontakKamiSection">
                <i class="fas fa-address-book"></i> <strong>KONTAK SEKOLAH</strong>
            </div>
            <div class="row">
                <?php foreach ($kontak as $ktk) : ?>
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title mb-0">Kontak Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><strong>Email:</strong> <?php echo htmlspecialchars($ktk->email, ENT_QUOTES, 'UTF-8'); ?></li>
                                <li class="mb-2"><strong>Instagram:</strong> <?php echo htmlspecialchars($ktk->instagram, ENT_QUOTES, 'UTF-8'); ?></li>
                                <li class="mb-2"><strong>Telepon:</strong> <?php echo htmlspecialchars($ktk->no_telp, ENT_QUOTES, 'UTF-8'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modals Informasi -->
<?php foreach ($informasi as $info) : ?>
<div class="modal fade" id="modalInformasi<?= $info->id_informasi ?>" tabindex="-1" aria-labelledby="modalInformasi<?= $info->id_informasi ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInformasi<?= $info->id_informasi ?>Label"><?= $info->judul_informasi ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/informasi/' . $info->foto) ?>" class="img-fluid mb-3" alt="<?= $info->judul_informasi ?>">
                <p class="card-text"><?= $info->isi_informasi ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


     <!-- Informasi Section -->
     <div class="container-fluid mt-4">
        <div class="alert alert-primary" role="alert" id="informasiSection">
            <i class="fas fa-info-circle"></i> <strong>INFORMASI SEKOLAH</strong>
        </div>
        <div class="row">
            <?php foreach ($informasi as $info) : ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/informasi/' . $info->foto) ?>" class="img-fluid" alt="<?= $info->judul_informasi ?>">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $info->judul_informasi ?></h5>
                        <p class="card-text">
                            <span class="short-text"><?= word_limiter($info->isi_informasi, 10) ?></span>
                            <span class="full-text d-none"><?= $info->isi_informasi ?></span>
                        </p>
                        <button type="button" class="btn btn-primary toggle-text" data-toggle="modal" data-target="#modalInformasi<?= $info->id_informasi ?>">
                            Selengkapnya...
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modals Informasi -->
    <?php foreach ($informasi as $info) : ?>
    <div class="modal fade" id="modalInformasi<?= $info->id_informasi ?>" tabindex="-1" aria-labelledby="modalInformasi<?= $info->id_informasi ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInformasi<?= $info->id_informasi ?>Label"><?= $info->judul_informasi ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/informasi/' . $info->foto) ?>" class="img-fluid mb-3" alt="<?= $info->judul_informasi ?>">
                    <p class="card-text"><?= $info->isi_informasi ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Galeri Section -->
    <div class="container-fluid mt-4"> 
        <div class="alert alert-primary" role="alert" id="galeriSection">
            <i class="fas fa-info-circle"></i> <strong>GALERI SEKOLAH</strong>
        </div>
        <div class="row">
            <?php foreach ($galeri as $g) : ?>
            <div class="card col-md-3 mb-3">
                <div class="card-header text-center">
                    <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/galeri/' . $g->foto) ?>" class="img-fluid" alt="<?= $g->judul_foto ?>">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $g->judul_foto ?></h5>
                    <p class="card-text">
                        <span class="short-text"><?= word_limiter($g->deskripsi, 10) ?></span>
                        <span class="full-text d-none"><?= $g->deskripsi ?></span>
                    </p>
                    <button type="button" class="btn btn-primary toggle-text" data-toggle="modal" data-target="#modal<?= $g->id_galeri ?>">
                        Selengkapnya...
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modals -->
    <?php foreach ($galeri as $g) : ?>
    <div class="modal fade" id="modal<?= $g->id_galeri ?>" tabindex="-1" aria-labelledby="modal<?= $g->id_galeri ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal<?= $g->id_galeri ?>Label"><?= $g->judul_foto ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('sisfo_akademikk/assets/uploads/img/galeri/' . $g->foto) ?>" class="img-fluid mb-3" alt="<?= $g->judul_foto ?>">
                    <p class="card-text"><?= $g->deskripsi ?></p>
                    <p class="card-text"><small class="text-muted"><strong> Tanggal Publish: <?= $g->tanggal_publish ?></strong></small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <script>
       document.querySelectorAll('.toggle-text').forEach(button => {
    button.addEventListener('click', () => {
        const shortText = button.previousElementSibling.querySelector('.short-text');
        const fullText = button.previousElementSibling.querySelector('.full-text');

        shortText.classList.toggle('d-none');
        fullText.classList.toggle('d-none');

        button.textContent = shortText.classList.contains('d-none') ? 'Lihat Sedikit...' : 'Selengkapnya...';
    });
});

document.getElementById('scrollToTentangSekolah').addEventListener('click', (event) => {
    event.preventDefault();
    document.getElementById('tentangSekolahSection').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('scrollToInformasi').addEventListener('click', (event) => {
    event.preventDefault();
    document.getElementById('informasiSection').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('scrollTogaleri').addEventListener('click', (event) => {
    event.preventDefault();
    document.getElementById('galeriSection').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('scrollToKontakKami').addEventListener('click', (event) => {
    event.preventDefault();
    document.getElementById('kontakKamiSection').scrollIntoView({ behavior: 'smooth' });
});



        $('#modalInformasi').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var title = button.closest('.card-body').find('h5.card-title').text();
            var content = button.closest('.card-body').find('.short-text').next('.full-text').html();

            var modal = $(this);
            modal.find('#informasiTitle').text(title);
            modal.find('#informasfototent').html(content);
        });
    </script>

    <!-- Script untuk Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
