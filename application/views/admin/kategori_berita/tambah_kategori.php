<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Tambah
</button>
<!--Modals -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
            </div>
<div class="modal-body"> <!-- Body modal -->
<?php
// Validasi inputan
echo validation_errors('<div class="alert alert-warning">','</div>');
//open form
echo form_open(base_url('admin/kategori_berita'));
?>
<div class="col-md-8">
	<div class="form-group">
	<label>Kategori Berita</label>
	<input  type="text" name="nama_kategori" class="form-control" value="
	<?php echo set_value('nama_kategori') ?>" placeholder="Kategori Berita" required/>
	</div>
</div>
<div class="col-md-4">	
	<div class="form-group">
	<label>Urutan</label>
	<input  type="text" name="urutan" class="form-control" value="
	<?php echo set_value('urutan') ?>" placeholder="urutan"/>
	</div>	
</div>

<div class="col-md-12">	
	<div class="form-group">
	<label>Keterangan</label>
	<textarea name="keterangan" class="form-control" placeholder="Keterangan">
	<?php echo set_value('keterangan')?></textarea>
	</div>
	
	    <div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" 
		value="Save"/>
		<input type="reset" name="reset" class="btn btn-default" 
		value="Reset"/>
    </div>	
</div>
<?php echo form_close(); ?>
<div class="clearfix"></div>
</div> <!-- akhir body modal -->
            
    <div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
        </div> <!--akhir modal konten -->
    </div> <!--akhir modal dialog -->
</div> <!-- Akhir Modals-->