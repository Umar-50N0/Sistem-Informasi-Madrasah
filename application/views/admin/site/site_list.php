 <p>
 	<a href="<?php echo base_url('admin/site/tambah') ;?>" class="btn btn-primary">
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
	<th>Nama</th>
	<th>Contact Person</th>
	<th>Email</th>
	<th>Alamat</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach ($site as $site){
	;?>
<tr class="odd gradeX">
	<td><?php echo $i ?></td>
    <td><?php echo $site->nama_site ?></td>
    <td><?php echo $site->contact ?></td>
    <td><label><?php echo $site->email ?></label></td>
    <td><?php echo $site->alamat ?></td>
    <td>
    	<a href="<?php echo base_url('admin/site/edit/'.$site->id_site);?>" class="btn btn-primary btn-sm"
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