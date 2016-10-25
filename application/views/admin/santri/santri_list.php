 <p>
 	<a href="<?php echo base_url('admin/santri/tambah') ;?>" class="btn btn-primary">
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
    <td><?php echo $santri->nama_lengkap ?></td>
    <td><?php echo $santri->tmp_lahir ?>, <?php echo $santri->tgl_lahir ?></td>
    <td><label><?php echo $santri->jn_kelamin ?></label></td>
    <td><?php echo $santri->nama_ow ?></td>
    <td><?php echo $santri->alamat ?></td>
    <td><?php echo $santri->status ?></td>
    <td>
    	<a href="<?php echo base_url('admin/santri/detail/'.$santri->id_santri);?>" 
    	class="btn btn-primary btn-sm"
    	title="Lihat detail">
    	<i class="fa fa-info"></i>
    	</a>
    	<!--<a href="<?php echo base_url('admin/pdf/'.$santri->id_santri);?>" 
    	class="btn btn-primary btn-sm"
    	title="Lihat detail">
    	<i class="fa fa-info"></i>
    	</a>-->
    	
    	<a href="<?php echo base_url('admin/santri/edit/'.$santri->id_santri);?>" 
    	class="btn btn-primary btn-sm"
    	title="Edit Data Santri">
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