<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Detail Siswa
    </div>
    <table class="table table-hover table-striped table-bordered">
        <tbody>
            <tr>
                <th scope="row">Foto</th>
                <td><img src="<?php echo base_url('assets/uploads/img/siswa/') . $detail[0]->foto; ?>" alt="Foto Siswa" style="max-width: 200px; max-height: 200px;"></td>
            </tr>
            <tr>
                <th scope="row">NIS</th>
                <td><?php echo $detail[0]->nis; ?></td>
            </tr>
            <tr>
                <th scope="row">Nama Siswa</th>
                <td><?php echo $detail[0]->nama_siswa; ?></td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td><?php echo $detail[0]->alamat; ?></td>
            </tr>
            <tr>
                <th scope="row">Jenis Kelamin</th>
                <td><?php echo $detail[0]->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <th scope="row">Tanggal Lahir</th>
                <td><?php echo date('d-m-Y', strtotime($detail[0]->tgl_lahir)); ?></td>
            </tr>
            <tr>
                <th scope="row">Tempat Lahir</th>
                <td><?php echo $detail[0]->tempat_lahir; ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?php echo $detail[0]->email; ?></td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td><?php echo $detail[0]->agama; ?></td>
            </tr>
            <tr>
                <th scope="row">Nama Ayah</th>
                <td><?php echo $detail[0]->nama_ayah; ?></td>
            </tr>
            <tr>
                <th scope="row">Pekerjaan Ayah</th>
                <td><?php echo $detail[0]->pekerjaan_ayah; ?></td>
            </tr>
            <tr>
                <th scope="row">Nama Ibu</th>
                <td><?php echo $detail[0]->nama_ibu; ?></td>
            </tr>
            <tr>
                <th scope="row">Pekerjaan Ibu</th>
                <td><?php echo $detail[0]->pekerjaan_ibu; ?></td>
            </tr>
            <tr>
                <th scope="row">No. Telepon</th>
                <td><?php echo $detail[0]->no_telp; ?></td>
            </tr>
        </tbody>
    </table>
    <?php echo anchor('guru/siswa','<div class="btn btn-danger mb-5">Kembali</div>') ?>
</div>
