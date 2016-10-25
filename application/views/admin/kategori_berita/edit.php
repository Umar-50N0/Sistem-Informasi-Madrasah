<?php
// Validasi inputan
echo validation_errors('<div class="alert alert-warning">','</div>');
//open form
echo form_open(base_url('admin/kategori_berita/edit/'.$kategori_berita->id_kategori_berita));
?>
<div class="col-md-8">
	<div class="form-group">
	<label>Kategori Berita</label>
	<input  type="text" name="nama_kategori" class="form-control" value="
	<?php echo $kategori_berita->nama_kategori ?>" placeholder="Kategori Berita" required/>
	</div>
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Urutan</label>
	<input  type="text" name="urutan" class="form-control" value="
	<?php echo $kategori_berita->urutan ?>" placeholder="urutan"/>
	</div>	
</div>

<div class="col-md-12">	
	<div class="form-group">
	<label>Keterangan</label>
	<textarea name="keterangan" class="form-control" placeholder="Keterangan">
	<?php echo $kategori_berita->keterangan ?></textarea>
	</div>
	
	    <div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" 
		value="Save"/>
		<input type="reset" name="reset" class="btn btn-default" 
		value="Reset"/>
    </div>	
</div>
<?php echo form_close(); ?>