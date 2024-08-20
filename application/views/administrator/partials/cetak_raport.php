<?php
error_reporting(0);
?>
<html>

<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/sb-admin-2.min.css">
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Cetak Raport</title>
</head>

<body>

    <div style="page-break-after:always;">
        <br />
        <img src="<?=base_url()?>assets/img/smp.png" alt="Logo Sekolah"
            style="width:70px;height:70px;float:left;margin-bottom:10px;">
        <h3 style="line-height:5px;text-align:right;">SMP Muhammadiyah Jayapura</h3>
        <br>
        <h3 style="line-height:5px;text-align:right;">Akreditasi A</h3>
        <hr style="border:1px solid;margin-right:0px;width:800px;">
        <hr style="border:0.5px solid;margin-top:-15px;margin-right:0px;width:750px;">
        <p style="line-height:5px;text-align:right;margin-top:-10px;">Alamat : test alamat RT
            00 / RW
            01
            dusun, Kel. kelurahan, kecamatan,
            Kota Jayapura - Papua</p>
        <br>
        <h4 class="text-center">DATA HASIL BELAJAR SISWA</h4>
        <h4 class="text-center">RAPORT SISWA</h4>
        <br>
        <table style="padding:15px;">
            <tr>
                <td width="150"><b>NIS</b></td>
                <td width="20">:</td>
                <td width="350"><?=$siswa->nis;?></td>
                <td width="125"><b>Tahun Ajaran</b></td>
                <td width="20">:</td>
                <td><?=$tahun_ajaran->tahun_ajaran;?></td>
            </tr>
            <tr>
                <td width="150"><b>Nama Siswa</b></td>
                <td width="20">:</td>
                <td width="350"><?=$siswa->nama_siswa;?></td>
                <td width="125"><b>Semester</b></td>
                <td width="20">:</td>
                <td><?=$semester;?></td>
            </tr>
            <tr>
                <td width="150"><b>Kelas</b></td>
                <td width="20">:</td>
                <td width="350"><?=$kelas->kode_kelas.' - '.$kelas->nama_kelas;?></td>
                <!-- <td width="125"><b>Tanggal Cetak</b></td>
                <td width="20">:</td>
                <td>//$raport_data['tanggal'];</td> -->
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped" style="font-size:12pt;">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">MATA PELAJARAN
                    </th>
                    <th colspan="4" style="text-align:center;padding:0px;">NILAI</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">NILAI AKHIR
                    </th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">PREDIKAT</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">KETERANGAN</th>
                </tr>
                <tr>
                    <th style="text-align:center;line-height:30px;padding:0px;">N1</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">N2</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">N3</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">N4</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nilai as $row) :?>
                <tr>
                    <td><?= $row->nama_mapel;?></td>
                    <td class="text-center"><?=$row->ns1;?></td>
                    <td class="text-center"><?=$row->ns2;?></td>
                    <td class="text-center"><?=$row->ns3;?></td>
                    <td class="text-center"><?=$row->ns4;?></td>
                    <td class="text-center"><?=$row->nilai_akhir;?></td>
                    <td class="text-center"><?=$row->predikat;?></td>
                    <td><?=$row->deskripsi?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <p>
            Nilai Sikap:
            <b><?= $sikap[0]->ket; ?></b>
        </p>

        <p>
            Keterangan :
            <br>
            <b>RTP</b> : Rata-rata nilai Tugas/PR
            <br>
            <b>RNU</b> : Rata-rata nilau Ulangan Harian
            <br>
            <b>PTS</b> : Penilaian Tengah Semester
            <br>
            <b>UAS</b> : Ujian Akhir Semester
        </p>
        <p style="text-align:right;margin-right:125px;">Jayapura, <?= date('d-m-Y'); ?></p>
        <table>
            <tr>
                <td class="text-center" width="500">
                    Kepala Sekolah
                    <br>
                        SMP Muhammadiyah Jayapura
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?= $kepsek ?></u>
                    <br>
                    NIP. 09990090
                </td>
                <td class="text-center" width="500">
                    Wali Kelas
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?=$wali->nama_guru;?></u>
                    <br>
                    NIP. <?=$wali->nik;?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>