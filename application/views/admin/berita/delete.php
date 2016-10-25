<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $berita->id_berita ?>" title="Delete Berita">
    <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data Berita?</h4>
            </div>
        	<div class="modal-body">
            Apakah Anda yakin ingin menghapus data berita?
        	</div>
    	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           	<a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-primary">
           	<i class="fa fa-trash-o"></i> Ya, Hapus data ini
           	</a>
        </div>
        </div>
    </div>
</div>