 <p>
 	<a href="<?php echo base_url('admin/user/tambah') ;?>" class="btn btn-primary">
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
	<th>Nama </th>
	<th>Username</th>
	<th>Email</th>
	<th>Akses Level</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach ($user as $user){
	;?>
<tr class="odd gradeX">
	<td><?php echo $i ?></td>
    <td><?php echo $user->nama ?><br>
    </td>
    <td><?php echo $user->username ?></td>
    <td><label><?php echo $user->email ?></label></td>
    <td><?php echo $user->akses_level ?></td>
    <td>
    	<a href="<?php echo base_url('admin/user/edit/'.$user->id_user);?>" class="btn btn-primary btn-sm"
    	title="Edit User">
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