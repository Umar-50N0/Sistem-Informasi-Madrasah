
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
echo form_open_multipart(base_url('admin/daftar/edit/'.$daftar->id_daftar));
?>
<div class="col-md-4">
	<div class="form-group">
		<label><a href="<?php echo base_url('admin/santri') ?>" class="btn btn-primary btn-xs">
			<i class="fa fa-plus"></i></a>  ID santri</label>
		<select class="form-control" name="id_santri">
			<?php foreach ($santri as $santri){?>
			<option value="<?php echo $santri->id_santri ; ?>"
			<?php if($daftar->id_santri==$santri->id_santri){ echo "selected"; } ?>>
				<?php echo $santri->nama_lengkap ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status daftar</label>
		<select class="form-control" name="status">
		<option value="Terdaftar">Terdaftar</option>
		<option value="Calon"<?php if($daftar->status=="Calon"){ echo "selected"; } ?>>
		Calon</option>
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
		<label>Keterangan</label>
		<textarea class="form-control" name="keterangan" placeholder="Keterangan daftar">
		<?php echo $daftar->keterangan ?>
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

