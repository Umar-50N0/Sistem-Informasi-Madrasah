 <p>
 	<a href="<?php echo base_url('admin/daftar/tambah') ;?>" class="btn btn-primary">
 		<i class="fa fa-plus"></i> Tambah
 	</a>
 </p>
 <?php
 // tampilkan notifikasi
 if ($this->session->flashdata('sukses')){
 	echo '<div class="alert alert-success">';
 	echo $this->session->flashdata('sukses');
 	echo '</div>';
 }
 ?>
 
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
	<th>No</th>
	<th>Gambar</th>
	<th>ID Santri</th>
	<th>Status</th>
	<th>Keterangan</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach ($daftar as $daftar){
	;?>
<tr class="odd gradeX">
	<td><?php echo $i ?></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$daftar->gambar) ?>" width="60"/></td>
    <td><?php echo $daftar->id_santri ?></td>
    <td><?php echo $daftar->status ?></td>
    <td><?php echo $daftar->keterangan ?></td>
    <td>
    	<a href="<?php echo base_url('admin/daftar/edit/'.$daftar->id_daftar);?>" class="btn btn-primary btn-sm"
    	title="Edit Site">
    	<i class="fa fa-edit"></i>
    	</a>
    	
    	<?php
    	//Delete
    	include('delete.php');
    	?>
    </td>
</tr>
<?php $i++ ; } ?>
</tbody>
</table>