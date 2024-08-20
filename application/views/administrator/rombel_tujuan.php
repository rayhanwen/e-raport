<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Kelas Tujuan
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Kelas Tujuan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kelas_tujuan as $kelas) { ?>
            <tr>
                <td><?php echo $kelas->id_kelas; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>