<?php

echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));

?>

<div class="col-md-12">
	<div class="form-group  form-group-lg">
		<label>Judul berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required>
		
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status berita</label>
		<select name="status_berita" class="form-control">
			<option value="Publish">Publikasikan</option>
			<option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
		</select>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Slider"<?php if($berita->jenis_berita=="Slider") { echo "selected"; } ?>>Homepage slider</option>
		</select>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" >
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label>Isi Berita</label>
		<textarea name="isi" class="form-control editor" placeholder="isi"><?php echo $berita->isi ?></textarea>
	</div>

		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data" >
			<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset" >
		</div>
	</div>

<?php

echo form_close();
?>