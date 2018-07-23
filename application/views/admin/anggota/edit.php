<?php

echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/anggota/edit/'.$anggota->id_anggota));

?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama" value="<?php echo $anggota->nama_anggota ?>" required>
		
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $anggota->email ?>" required>
		
	</div>

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $anggota->username ?>" required readonly disabled>
		
	</div>

	<div class="form-group">
		<label>Password <span class="text-danger"><small>(Password minimal 6 karakter atau di biarkan kosong)</small></span></label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">

	</div>
</div>
	
	<div class="col-md-6">

		<div class="form-group">
		<label>Telepon/HP</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="<?php echo $anggota->telepon ?>" required>
		
	</div>

		<div class="form-group">
			<label>Status Anggota</label>
			<select name="status_anggota" class="form-control">
				<option value="Active">Active</option>
				<option value="Not Active" <?php if ($anggota->status_anggota=="Not Active") { echo "selected"; } ?>>Not Active</option>
			</select>
		</div>
	

		<div class="form-group">
			<label>Ketrangan lain</label>
			<textarea name="instansi" class="form-control" placeholder="instansi"><?php echo $anggota->instansi ?></textarea>
		</div>

		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data" >
			<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset" >
		</div>
	</div>

<?php

echo form_close();
?>