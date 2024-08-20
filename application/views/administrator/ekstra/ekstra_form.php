    	<div class="container">
    		<h2>Tambah Ekstrakurikuler</h2>
    		<!-- Menampilkan pesan jika terjadi kesalahan input -->
    		<?php if (validation_errors()) : ?>
    			<div class="alert alert-danger" role="alert">
    				<?php echo validation_errors(); ?>
    			</div>
    		<?php endif; ?>
    		<form action="<?php echo base_url('administrator/ekstra/tambah_aksi'); ?>" method="post">
    			<div class="form-group">
    				<label for="nama_ekstra">Nama Ekstrakurikuler:</label>
    				<input type="text" class="form-control" id="nama_ekstra" name="nama_ekstra" required>
    			</div>
    			<div class="form-group">
    				<label for="deskripsi">Deskripsi:</label>
    				<textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
    			</div>
    			<div class="form-group">
    				<label for="guru">Pilih Guru:</label>
    				<select class="form-control" id="guru" name="guru" required>
    					<option value="">--Pilih Guru--</option>
    					<?php foreach ($guru_list as $guru) : ?>
    						<option value="<?php echo $guru->nik; ?>"><?php echo $guru->nama_guru; ?></option>
    					<?php endforeach; ?>
    				</select>
    			</div>
    			<div class="text-center">
    				<button type="button" class="btn btn-sm btn-outline-danger mx-1" onclick="goBack()"><i class="fas fa-angle-double-left"> Kembali</i></button>
    				<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"> Simpan</i></button>
    			</div>
    		</form>
    	</div>