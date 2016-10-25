<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $santri->id_santri ?>" title="Hapus Data">
    <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $santri->id_santri ?>" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data User?</h4>
            </div>
        	<div class="modal-body">
            Apakah Anda yakin ingin menghapus data user?
        	</div>
    	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           	<a href="<?php echo base_url('admin/dashboard/delete/'.$santri->id_santri) ?>" class="btn btn-primary">
           	<i class="fa fa-trash-o"></i> Ya, Hapus data ini
           	</a>
        </div>
        </div>
    </div>
</div>