<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tingkatan Kelas Siswa</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Cetak Raport Siswa
        </div>
        <div class="alert alert-info">
            Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
        </div>
        <div id="pesan">
            <!-- Pesan Error Ajax Disini -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="form_pilih_kelas" action="<?= base_url('administrator/raport/cetak_raport'); ?>" method="post">
                    <h5>Tahun Ajaran</h5>
                    <div class="form-group">
                        <select name="tahun" id="id_tahun" class="form-control">
                            <?php foreach ($tahun_ajaran as $tahun): ?>
                                <?php if ($tahun->status == "Aktif") { ?>
                                    <option value="<?php echo $tahun->id_tahun; ?>" selected><?php echo $tahun->tahun_ajaran; ?> - Aktif</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $tahun->id_tahun; ?>"><?php echo $tahun->tahun_ajaran; ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>

                    <h5>Semester</h5>
                    <div class="form-group">
                        <select name="semester" id="id_semester" class="form-control">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>

                    <hr>

                    <h5>Nama Kepala Sekolah</h5>
                    <div class="form-group">
                        <select name="kepala_sekolah" id="id_kepsek" class="form-control">
                            <option value="">Pilih Kepala Sekolah</option>
                            <?php foreach ($guruDropdown as $guru) : ?>
                                <option value="<?php echo $guru->nik; ?>"><?php echo htmlspecialchars($guru->nama_guru, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <h5>Kelas</h5>
                    <div class="form-group">
                        <select name="kelas" id="id_kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $kls): ?>
                                <option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>

                    <h5>Siswa</h5>
                    <div class="form-group">
                        <select name="siswa" id="id_siswa" class="form-control">
                            <!-- Option Inputan Data Siswa Muncul disini -->
                            <option selected="true">Pilih Kelas Terlebih Dahulu</option>
                        </select>
                    </div>

                    <hr>

                    <button type="submit" id="btnSubmit" class="btn btn-success" style="margin-top: 30px !important;" disabled="true">
                        <i class="fa fa-print"></i> <span>Cetak Raport</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Tampilkan data siswa kelas tujuan ketika mengganti input select kelas tujuan
            $('#id_kelas').change(function(e) {
                e.preventDefault();
                var id_kelas = $('#id_kelas').val();
                var kepsek = $('#id_kepsek').val();
                if (id_kelas) {
                    $.ajax({
                        url: "<?php echo base_url('administrator/raport/get_siswa_by_kelas'); ?>",
                        type: "POST",
                        data: {id_kelas: id_kelas},
                        success: function(data) {
                            console.log("Response Data:", data); // Debugging log
                            $('#id_siswa').html(data); // Menampilkan data siswa ke dalam tabel
                            if (kepsek){
                                $('#btnSubmit').attr('disabled', false);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Ajax Error:", xhr.responseText); // Debugging log
                            $('#pesan').html('<div class="alert alert-danger">Terjadi kesalahan, silakan coba memilih kelas lagi.</div>');
                        }
                    });
                } else {
                    $('#id_siswa').html('<option selected="true">Pilih Kelas Terlebih Dahulu</option>');
                }
            });

            // Validasi Untuk memastikan form nama kepala sekolah terisi
            $('#id_kepsek').change(function(e) {
                var id_kelas = $('#id_kelas').val();
                var kepsek = $('#id_kepsek').val();
                if (kepsek && id_kelas){
                    $('#btnSubmit').attr('disabled', false);
                }else{
                    $('#btnSubmit').attr('disabled', true);
                }
            });
        });
    </script>
</body>
</html>
