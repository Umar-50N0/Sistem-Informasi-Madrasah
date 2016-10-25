<div class="container">
 <p>

 <?php
 // tampilkan notifikasi
 if ($this->session->flashdata('sukses')){
 	echo '<div class="alert alert-success">';
 	echo $this->session->flashdata('sukses');
 	echo '</div>';
 }
 ?>
 
<div class="row text-center  ">
    	<div class="col-md-12 wow fadeInDown" >
        	<h2> TATA CARA PENDAFTARAN SANTRI BARU</h2><br />
        </div>
        <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                <p align="justify">Orangtua/Wali dapat mendatangi langsung DTA Nurul Anwar 
                untuk mendaftarkan putra/putrinya melalui staf DTA Nurul Anwar</p><hr />
                <p align="justify">DTA Nurul Anwar menerima pendaftaran santri baru kapan saja.</p><hr />
                <p align="justify">Orangtua/Wali harap membawa berkas yang dibutuhkan seperti: <br />
                	fotokopi akta kelahiran<br />
                	fotokopi KTP<br/>
                	pas foto 2x3 dan 3x4 sebanyak 4 lembar</p><hr />
                <p align="justify">Bagi Orangtua/Wali yang tidak bisa datang langsung ke DTA Nurul Anwar, dapat
                mendaftarkan putra/putrinya secara online</p>
                <p align="justify">Orangtua/Wali yang mendaftarkan putra/putrinya secara online, harap datang ke DTA Nurul Anwar untuk registrasi ulang dengan membawa berkas seperti yang disebutkan diatas</p>
                </div>
                <div class="panel-footer">
                	<a href="<?php echo(base_url('daftar_santri/tambah'))?>"  class="btn btn-primary" >Daftar Online</a>
                </div>
            </div>
        </div>
        
        </div>
        
</div> <!-- akhir container --> 
</div>