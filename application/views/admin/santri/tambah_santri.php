<?php
// Validasi inputan
echo validation_errors('<div class="alert alert-warning">','</div>');
//open form
echo form_open(base_url('admin/santri/tambah'));
?>
<div class="col-md-4">
	<div class="form-group">
	<label>Nama Lengkap</label>
	<input  type="text" name="nama_lengkap" class="form-control" value="<?php echo set_value('nama_lengkap') ?>"  required/>
	</div>
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Tempat Lahir</label>
	<input  type="text" name="tmp_lahir" class="form-control" value="<?php echo set_value('tmp_lahir') ?>" />
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Tanggal Lahir</label>
	<input id="datepicker" type="text" name="tgl_lahir" class="form-control" value="<?php echo set_value('tgl_lahir') ?>" />
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
	<label>Jenis Kelamin</label>
		<select class="form-control" name="jn_kelamin">
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
	</div>
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Pendidikan</label>
		<select class="form-control" name="pendidikan">
			<option value="TK">TK</option>
			<option value="SD">SD</option>
		</select>
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Anak ke-</label>
	<input type="text" name="anak_ke" class="form-control" value="<?php echo set_value('anak_ke') ?>" />
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Jumlah Saudara</label>
	<input  type="text" name="jml_sdr" class="form-control" value="<?php echo set_value('jml_sdr') ?>" />
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Nama Orangtua/Wali</label>
	<input  type="text" name="nama_ow" class="form-control" value="<?php echo set_value('nama_ow') ?>" />
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Pendidikan Orangtua/Wali</label>
		<select class="form-control" name="pend_ow">
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA">SMA</option>
			<option value="Diploma">Diploma</option>
			<option value="Sarjana">Sarjana</option>
		</select>
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Pekerjaan</label>
	<input  type="text" name="pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan') ?>" />
	</div>	
</div>
<div class="col-md-4">
		<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="alamat">
		<?php echo set_value('alamat') ?>
		</textarea>
		</div>
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>No Kontak</label>
	<input  type="text" name="no_kontak" class="form-control" value="<?php echo set_value('no_kontak') ?>" />
	</div>	
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Status</label>
		<select class="form-control" name="status">
			<option value="Registrasi Ulang">Registrasi Ulang</option>
			<option value="Diterima">Diterima</option>
		</select>
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
<?php echo form_close(); ?>