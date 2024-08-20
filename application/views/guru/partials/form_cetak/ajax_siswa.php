<?php foreach ($siswa as $sw): ?>
    <option value="<?php echo $sw->nis; ?>"><?php echo $sw->nis; ?> - <?php echo $sw->nama_siswa; ?></option>
<?php endforeach; ?>