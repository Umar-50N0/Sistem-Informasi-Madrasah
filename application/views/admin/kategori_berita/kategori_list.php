 <p>
<?php
// Pop Up Modal tambah berita
 include ('tambah_kategori.php');
?>
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
	<th>Nama Kategori</th>
	<th>Urutan</th>
	<th>Keterangan</th>
	<th>Slug Kategori Berita</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach ($kategori_berita as $kategori_berita){
	;?>
<tr class="odd gradeX">
	<td><?php echo $i ?></td>
    <td><?php echo $kategori_berita->nama_kategori ?></td>
    <td><?php echo $kategori_berita->urutan ?></td>
    <td><label><?php echo $kategori_berita->keterangan ?></label></td>
    <td><?php echo $kategori_berita->slug_kategori_berita ?></td>
    <td>
    	<a href="<?php echo base_url('admin/kategori_berita/edit/'.$kategori_berita->id_kategori_berita);?>" 
    	class="btn btn-primary btn-sm"
    	title="Edit Kategori Berita">
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