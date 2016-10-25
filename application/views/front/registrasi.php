<?php
// Validasi inputan

echo validation_errors('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/user/tambah'));
?>
<div class="col-md-6">
	<div class="form-grouo form-group-lg">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" 
		value="<?php echo set_value('username');?>"/>
	</div>
	
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="password" 
		value="<?php echo set_value('password');?>"/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php 
		echo set_value('nama');?>" required/>
	</div>
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" 
		value="<?php echo set_value('email');?>"/>
	</div>
	
</div>

<div class="col-md-12">
		
		<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" 
		value="Simpan Data"/>
		<input type="reset" name="reset" class="btn btn-default" 
		value="Reset"/>
		</div>
	</div>
</div>
<?
// Close form
echo form_close();
?>

