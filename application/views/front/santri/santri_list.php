<div class="container" >
<div id="page-inner">
<div class="row">
<div class="row text-center  ">
    	<div class="col-md-12 wow fadeInDown" >
        	<h2> Data Calon Santri</h2><br />
        </div>
</div>
 <?php
 // tampilkan notifikasi
 if ($this->session->flashdata('sukses')){
 	echo '<div class="alert alert-success">';
 	echo $this->session->flashdata('sukses');
 	echo '</div>';
 }
 ?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                      
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
	<th>No</th>
	<th>Nama Lengkap</th>
	<th>Tempat, Tanggal Lahir</th>
	<th>Jenis Kelamin</th>
	<th>Nama Orangtua/Wali</th>
	<th>Alamat</th>
	<th>Status</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach ($santri as $santri){
	;?>
<tr class="odd gradeX">
	<td><?php echo $i ?></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$santri->foto) ?>" width="60"/>
    <?php echo $santri->nama_lengkap ?></td>
    <td><?php echo $santri->tmp_lahir ?>, <?php echo $santri->tgl_lahir ?></td>
    <td><label><?php echo $santri->jn_kelamin ?></label></td>
    <td><?php echo $santri->nama_ow ?></td>
    <td><?php echo $santri->alamat ?></td>
    <td><?php if($santri->status=="Diterima"){ echo $santri->status; } else {
    	echo "Registrasi Ulang"; };?> </td>
    <td>
    	<a href="<?php echo base_url('admin/santri/detail_santri/'.$santri->id_santri);?>" 
    	class="btn btn-primary btn-sm"
    	title="Lihat detail">
    	<i class="fa fa-info"></i>
    	</a>
    	
    </td>
</tr>
<?php $i++ ; } ?>
</tbody>
</table>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  --> 
 
</div>
</div>
</div>