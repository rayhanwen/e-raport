<!-- application/views/administrator/nilai_list.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Kelas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Input Nilai / Data Kelas
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <center>
            <legend class="mt-3"><strong>Data Mapel</strong></legend>
        </center>
    
        <div class="d-flex mt-4">
            <div class="row">
                <?php foreach ($mapel_data as $row) :?>
                    <div class="mb-4 ml-4">
                    <form id="<?=$row->id_kelas; ?>" action="<?php echo base_url('guru/nilai/input_nilai/').$row->id_mengajar;?>" method="get">
                        <input type="hidden" name="kelas" value="<?=$row->id_kelas; ?>">
                        <a href="#" onclick="document.getElementById('<?=$row->id_kelas; ?>').submit();" class="col-xl-3 col-md-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?=$row->kode_kelas.' - '.$row->nama_mapel;?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                            <!-- lanjut bikin inputan langsung ke kelas dan mapel yg dipilih -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
