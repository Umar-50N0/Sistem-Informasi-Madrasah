<?php
// Validasi inputan

echo validation_errors('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/site/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama Situs</label>
		<input type="text" name="nama_site" class="form-control" placeholder="Nama Situs" value="<?php 
		echo set_value('nama_site');?>"/>
	</div>
	
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat" 
		value="<?php echo set_value('alamat');?>"/>
	</div>
	
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon" 
		value="<?php echo set_value('telepon');?>"/>
	</div>
	
	<div class="form-group">
		<label>Kota</label>
		<input type="text" name="kota" class="form-control" placeholder="Kota" 
		value="<?php echo set_value('kota');?>"/>
	</div>
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" 
		value="<?php echo set_value('email');?>"/>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Contact Person</label>
		<input type="text" name="contact_person" class="form-control" placeholder="Contact Person" 
		value="<?php echo set_value('contact_person');?>"/>
	</div>
	
		<div class="form-group">
		<label>Keterangan lain</label>
		<textarea class="form-control" name="keterangan" placeholder="Keterangan lain">
		<?php echo set_value('keterangan') ;?>
		</textarea>
		
		<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" 
		value="Save"/>
		<input type="reset" name="reset" class="btn btn-default" 
		value="Reset"/>
		</div>
	</div>
</div>
<?
// Close form
echo form_close();
?>

