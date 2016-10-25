<?php
// Validasi inputan

echo validation_errors('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>
<div class="col-md-6">
	<!--<div class="form-grouo form-group-lg">
	<label>User untuk Site ?</label>
	<select name="id_site" class="form-control">
		<?php foreach($site as $site){ ?>
		<option value="<?php echo $site->id_site ?>"
		<?php if ($user->id_site==$site->id_site) { echo "selected";} ?>
		>
			<?php echo $site->nama_site. '-'.$site->kota ?>
		</option>
		<?php } ?>
	</select>
	</div>-->
	
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" 
		value="<?php echo $user->username ?>" readonly/>
	</div>
	
	<div class="form-group">
		<label>Password <sup>Minimal 6 Karakter | Maksimal 32 Karakter</sup></label>
		<input type="password" name="password" class="form-control" placeholder="password" 
		/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php 
		echo $user->nama ?>" required/>
	</div>
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" 
		value="<?php echo $user->email ?>"/>
	</div>
	
	<div class="form-group">
		<label>Akses Level</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Administrator</option>
			<option value="User" <?php if($user->akses_level=="User"){ echo "selected";} ?>>User Site/Staf</option>
			<option value="Blocked" <?php if($user->akses_level=="Blocked"){ echo "selected";} ?>>Blocked</option>
		</select>
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

