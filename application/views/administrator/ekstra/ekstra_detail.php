<!DOCTYPE html>
<html>
<head>
    <title>Detail Ekstrakurikuler</title>
    <!-- Sertakan CSS untuk Bootstrap dan Font Awesome jika belum ada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success text-uppercase" role="alert" style="margin-bottom: 20px;">
            <i class="fas fa-edit"></i> DETAIL EKSTRAKURIKULER
        </div>
        <div style="padding-top: 20px; padding-bottom: 20px;">
            <?php if (!empty($detail)) : ?>
                <table class="table table-hover table-striped table-bordered" style="background-color: #fff; width: 100%;">
                    <tr>
                        <th style="width: 30%; font-size: 18px;">Nama Ekstrakurikuler</th>
                        <td style="width: 70%; font-size: 18px;"><?php echo $detail->nama_ekstra; ?></td>
                    </tr>
                    <tr>
                        <th style="width: 30%; font-size: 18px;">Deskripsi</th>
                        <td style="width: 70%; font-size: 18px;"><?php echo $detail->deskripsi; ?></td>
                    </tr>
                    <tr>
                        <th style="width: 30%; font-size: 18px;">Nama Guru</th>
                        <td style="width: 70%; font-size: 18px;">
                            <?php echo !empty($guru->nama_guru) ? $guru->nama_guru : 'Tidak ada guru'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%; font-size: 18px;">Tahun Ajaran</th>
                        <td style="width: 70%; font-size: 18px;"><?php echo $tahun_ajaran->tahun_ajaran; ?></td>
                    </tr>
                </table>
                <!-- Mark "Informasi Siswa" -->
                <div class="alert alert-info text-uppercase" role="alert" style="margin-bottom: 20px;">
                    <i class="fas fa-info-circle"></i> Informasi Siswa
                </div>
                <a href="<?php echo base_url('administrator/ekstra/daftar_siswa/'.$detail->id_ekstra); ?>" class="btn btn-success mb-3">Tambah Siswa</a>
                <?php echo anchor('administrator/ekstra','<div class="btn btn-danger mb-3">Kembali</div>') ?>
                <!-- Tabel siswa -->
                <table class="table table-hover table-striped table-bordered" style="background-color: #fff; width: 100%;">
                    <thead>
                        <tr style="background-color: #f9f9f9;">
                            <th style="font-size: 14px;">NO</th>
                            <th style="font-size: 14px;">NAMA SISWA</th>
                            <th style="width: 15%; font-size: 14px;">JENIS KELAMIN</th>
                            <th style="font-size: 14px;">ALAMAT</th>
                            <th style="width: 10%; font-size: 14px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($siswa)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($siswa as $sw) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $sw->nama_siswa; ?></td>
                                    <td><?php echo $sw->jenis_kelamin; ?></td>
                                    <td><?php echo $sw->alamat; ?></td>
                                    <td>
                                    <a href="<?php echo site_url('administrator/ekstra/hapus_siswa/' . $detail->id_ekstra . '?nis=' . $sw->nis); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>


                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada siswa dalam ekstrakurikuler ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
                Data Ekstrakurikuler tidak ditemukan!
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
