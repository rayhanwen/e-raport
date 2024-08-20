    <!-- application/views/administrator/nilai_form.php -->

    <body>
        <!-- Fungsi Form Input -->
        <script>
            function minmax(value, min, max) {
                if (parseInt(value) < min)
                    return min;
                else if (parseInt(value) > max)
                    return max;
                else return value;
            }

            function nilai1(s, x) {
                var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
                $('[name="rata_' + s + '' + x + '"]').val(n1);
                $('[name="total_' + s + '' + x + '"]').val(n1);
                // $('[name="' + s + '2' + x + '"]').val("");
                dropreadonly(s + '2' + x);
                $('[name="' + s + '1' + x + '"]').prop('readonly', true);
            }

            function nilai2(s, x) {
                var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
                var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
                var hasil = (n1 + n2) / 2;
                var total = n1 + n2;

                $('[name="rata_' + s + '' + x + '"]').val(hasil);
                $('[name="total_' + s + '' + x + '"]').val(total);
                // $('[name="' + s + '3' + x + '"]').val("");
                dropreadonly(s + '3' + x);
                $('[name="' + s + '2' + x + '"]').prop('readonly', true);
            }

            function nilai3(s, x) {
                var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
                var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
                var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
                var hasil = (n1 + n2 + n3) / 3;
                var total = n1 + n2 + n3;

                $('[name="rata_' + s + '' + x + '"]').val(hasil);
                $('[name="total_' + s + '' + x + '"]').val(total);
                // $('[name="' + s + '4' + x + '"]').val("");
                dropreadonly(s + '4' + x);
                $('[name="' + s + '3' + x + '"]').prop('readonly', true);
            }
            function nilai4(s, x) {
                var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
                var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
                var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
                var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
                var hasil = (n1 + n2 + n3 + n4) / 4;
                var total = n1 + n2 + n3 + n4;

                $('[name="rata_' + s + '' + x + '"]').val(hasil);
                $('[name="total_' + s + '' + x + '"]').val(total);
                // $('[name="' + s + '4' + x + '"]').val("");
                dropreadonly(s + '5' + x);
                $('[name="' + s + '4' + x + '"]').prop('readonly', true);
            }

            function nilai5(s, x) {
                var kkm = parseInt($('[name="kkm"]').val());
                var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
                var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
                var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
                var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
                var n5 = parseInt($('[name="' + s + '5' + x + '"]').val());
                var hasil = (n1 + n2 + n3 + n4 + n5) / 5;
                var total = n1 + n2 + n3 + n4 + n5;

                $('[name="rata_' + s + '' + x + '"]').val(hasil);
                $('[name="total_' + s + '' + x + '"]').val(total);
                $('[name="akhir_' + s + '' + x + '"]').val(hasil);

                $('[name="akhir' + x + '"]').val(total);

                // Menentukan predikat dan deskripsi berdasarkan nilai hasil
                if (parseInt(hasil) < kkm) {
                    $('[name="predikat_' + x + '"]').val("D");
                    $('[name="deskripsi_' + x + '"]').val("Kurang Baik");
                } else if (parseInt(hasil) >= kkm && parseInt(hasil) <= 79) {
                    $('[name="predikat_' + x + '"]').val("C");
                    $('[name="deskripsi_' + x + '"]').val("Cukup Baik");
                } else if (parseInt(hasil) >= 80 && parseInt(hasil) <= 89) {
                    $('[name="predikat_' + x + '"]').val("B");
                    $('[name="deskripsi_' + x + '"]').val("Baik");
                } else if (parseInt(hasil) >= 90 && parseInt(hasil) <= 100) {
                    $('[name="predikat_' + x + '"]').val("A");
                    $('[name="deskripsi_' + x + '"]').val("Sangat Baik");
                }

            }
            function dropreadonly(value) {
                $('[name="' + value + '"]').prop('readonly', false);
            }
        </script>

        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-landmark"></i> Input Data Nilai Mata Pelajaran di Kelas
            </div>
            <?php 
                if ($nilai){
            ?>
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-landmark"></i> Nilai di Mata Pelajaran Kelas Ini sudah diisi
                    </div>
            <?php
                }
            ?>
            <?php echo $this->session->flashdata('pesan') ?>
            <center>
                <legend class="mt-3"><strong>Input Data Nilai</strong></legend>
            </center>
        
            <div class="d-flex justify-content-center mt-4">
                <table>
                    <tr>
                        <td><strong>Tahun Akademik</strong></td>
                        <td>&nbsp;: <?php echo htmlspecialchars($tahun_ajaran_mapel->tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td>&nbsp;: <?php echo htmlspecialchars($kelas->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Pengajar</strong></td>
                        <td>&nbsp;: <?php echo htmlspecialchars($guru, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Mata Pelajaran</strong></td>
                        <td>&nbsp;: <?php echo htmlspecialchars($mapel, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                </table>
            </div>
            <!-- Lanjuut Bikin Tabel Input -->
            <div class="mt-4" style="overflow-x:scroll;">
                <form action="<?= base_url('administrator/nilai/'.($nilai? 'update_nilai_aksi' : 'input_nilai_aksi')); ?>" id="formNilai" method="post">
                    <table class="table table-bordered table-hover table-striped" style="table-layout:fixed;">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" width="50px" style="line-height:55px;">No</th>
                                <th rowspan="2" class="text-center" width="150px" style="line-height:55px;">NIS</th>
                                <th rowspan="2" class="text-center"  width="300px" style="line-height:55px;">Nama Siswa</th>
                                <th colspan="5" class="text-center" width="500px">NILAI  ASUMATIF</th>
                                <th rowspan="2" class="text-center" width="100px" style="line-height:55px;">Total</th>
                                <th rowspan="2" class="text-center" width="100px" style="line-height:55px;">Rata</th>
                                <th rowspan="2" class="text-center" width="100px" style="line-height:55px;">KKM</th>
                                <th rowspan="2" class="text-center" width="100px" style="line-height:55px;">NA</th>
                                <th rowspan="2" class="text-center" width="100px" style="line-height:55px;">Predikat</th>
                                <th rowspan="2" class="text-center" width="250px" style="line-height:55px;">Deskripsi</th>
                            </tr>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">5</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php if (!empty($siswa)): ?>
    <?php foreach ($siswa as $key => $sw): ?>
        <tr>
    <td class="text-center"><?php echo $key + 1; ?></td>
    <td><?php echo htmlspecialchars($sw->nis, ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($sw->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
    <td width="100">
        <input type="hidden" name="nis<?=$sw->nis;?>" value="<?=$sw->nis;?>">
        <?php if($nilai && isset($nilai[$key]->id_nilai)): ?>
            <input type="hidden" name="idn<?=$sw->nis;?>" value="<?=$nilai[$key]->id_nilai;?>">
        <?php endif; ?>
        <input type="number" name="n1<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->ns1)? $nilai[$key]->ns1 : 0; ?>" id="n1" class="form-control" min="0"
        max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)"
        onchange="nilai1('n',<?=$sw->nis;?>)"
        onclick="dropreadonly('n1<?=$sw->nis;?>')">
    </td>
    <td width="100">
        <input type="number" name="n2<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->ns2)? $nilai[$key]->ns2 : 0; ?>" id="n2" class="form-control" min="0"
        max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)"
        onchange="nilai2('n',<?=$sw->nis;?>)"
        onclick="dropreadonly('n2<?=$sw->nis;?>')">
    </td>
    <td width="100">
        <input type="number" name="n3<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->ns3)? $nilai[$key]->ns3 : 0; ?>" id="n3" class="form-control" min="0"
        max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)"
        onchange="nilai3('n',<?=$sw->nis;?>)"
        onclick="dropreadonly('n3<?=$sw->nis;?>')">
    </td>
    <td width="100">
        <input type="number" name="n4<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->ns4)? $nilai[$key]->ns4 : 0; ?>" id="n4" class="form-control" min="0"
        max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)"
        onchange="nilai4('n',<?=$sw->nis;?>)"
        onclick="dropreadonly('n4<?=$sw->nis;?>')">
    </td>
    <td width="100">
        <input type="number" name="n5<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->ns5)? $nilai[$key]->ns5 : 0; ?>" id="n5" class="form-control" min="0"
        max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)"
        onchange="nilai5('n',<?=$sw->nis;?>)"
        onclick="dropreadonly('n5<?=$sw->nis;?>')">
    </td>
    <td>
        <input type="text" name="total_n<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->total)? $nilai[$key]->total : 0; ?>" id="total" class="form-control text-center" placeholder="0" readonly>
    </td>
    <td>
    <input type="text" name="rata_n<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->rata1)? intval($nilai[$key]->rata1) : 0; ?>" id="rata" class="form-control text-center" placeholder="0" readonly>
</td>
<td>
    <input type="text" name="kkm" id="kkm" class="form-control text-center" value="<?= intval($kkm->kkm) ?>" readonly>
</td>
<td>
    <input type="text" name="akhir_n<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->nilai_akhir)? intval($nilai[$key]->nilai_akhir) : 0; ?>" id="na" class="form-control text-center" placeholder="0" readonly>
</td>

    <td>
        <input type="text" name="predikat_<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->predikat)? $nilai[$key]->predikat : ''; ?>" id="predikat" class="form-control text-center" readonly>
    </td>
    <td>
        <input type="text" name="deskripsi_<?=$sw->nis;?>" value="<?= $nilai && isset($nilai[$key]->deskripsi)? $nilai[$key]->deskripsi : ''; ?>" id="deskripsi" class="form-control text-center" readonly>
    </td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="4" class="text-center">Tidak ada data nilai untuk kelas ini.</td>
</tr>
<?php endif; ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="idm" value="<?=$id_mengajar;?>">
                    <input type="hidden" name="idk" value="<?=$id_kelas; ?>">
                </form>
            </div>

            <div class="mt-3">
                <!-- Lanjut Bikin Fungsi Simpan Nilai -->
                <a href="#simpan" class="btn btn-success" onclick="$('#formNilai').submit()"><?= $nilai? 'Update' : 'Simpan';?></a>
                <?php echo anchor('administrator/nilai/nilai_aksi', '<button class="btn btn-danger">Kembali</button>'); ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
