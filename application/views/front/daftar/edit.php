<!-- tinyMCE -->
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script>tinymce.init({selector:'textarea'});</script>
<?php
// Validasi inputan

echo validation_errors('<div class="alert alert-warning">','</div>');
// error upload file
if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

//open form
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>
<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul</label>
		<input type="text" name="judul" class="form-control" placeholder="Judul berita" value="<?php 
		echo $berita->judul?>" required/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Jenis Berita</label>
		<select class="form-control" name="jenis_berita">
			<option value="Berita">Berita</option>
			<option value="Profil"<?php if($berita->jenis_berita=="Profil"){ echo "selected"; } ?>>Profil</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label><a href="<?php echo base_url('admin/kategori_berita') ?>" class="btn btn-primary btn-xs">
			<i class="fa fa-plus"></i></a>  Kategori Berita</label>
		<select class="form-control" name="id_kategori_berita">
			<?php foreach ($kategori as $kategori){?>
			<option value="<?php echo $kategori->id_kategori_berita ; ?>"
			<?php if($berita->id_kategori_berita==$kategori->id_kategori_berita){ echo "selected"; } ?>>
				<?php echo $kategori->nama_kategori ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status Berita</label>
		<select class="form-control" name="status_berita">
		<option value="Publish">Publikasikan</option>
		<option value="Draft"<?php if($berita->status_berita=="Draft"){ echo "selected"; } ?>>
		Simpan sebagai draft</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" name="gambar" class="form-control"/>
	</div>
</div>

<div class="col-md-12">
		<div class="form-group">
		<label>Isi Berita</label>
		<textarea class="form-control" name="isi" placeholder="Isi berita">
		<?php echo $berita->isi?>
		</textarea>
		</div>
</div>
<div class="col-md-12">
		<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" 
		value="Save"/>
		<input type="reset" name="reset" class="btn btn-default" 
		value="Reset"/>
		</div>
</div>
<?
// Close form
echo form_close();
?>

