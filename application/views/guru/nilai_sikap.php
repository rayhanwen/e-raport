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
            <i class="fas fa-landmark"></i> Penilaian Siswa
        </div>
        <div id="pesan">
            <!-- Pesan Error Ajax Disini -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="form_sikap" action="<?= base_url('guru/nilai/'.($sikap? 'update_sikap_aksi' : 'nilai_sikap_aksi')); ?>" method="post">
                <h5>Nama Siswa</h5>
                    <div class="form-group">
                        <input type="hidden" name="nis" value="<?= $detail[0]->nis; ?>">
                        <input type="text" name="nama_siswa" id="id_nama" class="form-control" placeholder="Nama Siswa" value="<?= $detail[0]->nama_siswa; ?>" readonly>
                    </div>
                <hr>
                <h5>Sikap</h5>
                    <div class="form-group">
                        <input type="text" name="sikap" id="id_sikap" class="form-control" placeholder="Penilaian Sikap" value="<?=  $sikap? $sikap[0]->ket : ""; ?>">
                    </div>
                <hr>
                    
                <button type="submit" id="btnSubmit" class="btn btn-success" disabled="true">
                <?=  $sikap? '<i class="fa fa-edit"></i> <span>Update</span>': '<i class="fa fa-plus"></i> <span>Tambah</span>'; ?>
                </button>
            </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Validasi Untuk memastikan form sikap terisi
            $('#id_sikap').keyup(function(e) {
                var sikap = $('#id_sikap').val();
                if (sikap){
                    $('#btnSubmit').attr('disabled', false);
                }else{
                    $('#btnSubmit').attr('disabled', true);
                }
            });
        });
    </script>
</body>
</html>
