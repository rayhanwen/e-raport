<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat datang <strong><?php echo $username; ?></strong> di Sistem Informasi E-Raport SMP Muhammadiyah Jayapura, Anda Login sebagai <strong><?php echo $hak_akses; ?></strong></p>
        <!-- Tambahkan informasi kelas di atas ini -->
        <hr>
        
        <!-- Visi Misi SMP Muhammadiyah -->
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVisiMisi" aria-expanded="false" aria-controls="collapseVisiMisi">
            Visi dan Misi SMP Muhammadiyah Jayapura
        </button>
        <div class="collapse" id="collapseVisiMisi">
            <div class="card card-body">
                <strong>Visi:</strong> Menjadi lembaga pendidikan yang unggul dalam membentuk akhlak mulia dan prestasi yang tinggi.<br>
                <strong>Misi:</strong>
                <ul>
                    <li>Mendidik siswa untuk menjadi insan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa.</li>
                    <li>Mengembangkan potensi siswa secara optimal dalam aspek akademik dan non-akademik.</li>
                    <li>Membentuk karakter siswa yang memiliki kecerdasan spiritual, emosional, sosial, dan intelektual.</li>
                    <li>Menyelenggarakan pembelajaran yang berkualitas dan relevan dengan perkembangan zaman.</li>
                </ul>
            </div>
        </div>
        <!-- End of Visi Misi SMP Muhammadiyah -->
    </div>
</div>
<!-- End of Page Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Raihan Ramadhan 2024</span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->
