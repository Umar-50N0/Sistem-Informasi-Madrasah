<div >

<div class="col-md-10">	
<img src="
    <?php echo base_url('assets/upload/image/thumbs/'.$santri->foto) ?>" width="120"/>
</div>
</div>

<div >
<div class="col-md-4">
	<label>No Registrasi</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->id_santri ?></label>
</div>
</div>

<div >
<div class="col-md-4">
	<label>Nama Lengkap</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->nama_lengkap ?></label>
</div>
</div>

<div >
<div class="col-md-4">
	<label>Tempat, Tanggal Lahir</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->tmp_lahir ?>, <?php echo $santri->tgl_lahir ?></label>
</div>
</div>

<div >
<div class="col-md-4">
	<label>Jenis Kelamin</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->jn_kelamin ?></label>
</div>
</div>

<div >
<div class="col-md-4">
	<label>Pendidikan</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->pendidikan ?></label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>Anak Ke</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->anak_ke ?> dari <?php echo $santri->jml_sdr ?> bersaudara</label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>Nama Orangtua/Wali</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->nama_ow ?></label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>Pendidikan Orangtua/Wali</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->pend_ow ?></label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>Pekerjaan Orangtua/Wali</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->pekerjaan ?></label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>Alamat</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->alamat ?></label>
</div>
</div>

<div>
<div class="col-md-4">
	<label>No yang bisa dihubungi</label>
</div>
<div class="col-md-6">	
<label><?php echo $santri->no_kontak ?></label>
</div>
</div>

<div>
<div class="col-md-12">
	<a href="<?php echo base_url('admin/report/pdf/'.$santri->id_santri);?>" 
    	class="btn btn-primary btn-sm"
    	title="Download PDF">
    	<i class="fa fa-download"></i> Download PDF
    	</a>
</div>

</div>