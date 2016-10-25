 <?php
 // tampilkan notifikasi
 if ($this->session->flashdata('sukses')){
 	echo '<div class="alert alert-success center wow fadeInDown">';
 	echo $this->session->flashdata('sukses');
 	echo '</div>';
 }
 ?>
 
<div class="container">
    <div class="center wow fadeInDown">
        <h2>SELAMAT DATANG</h2>

    </div>

    <div class="row">
        <div class="features">
            <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                	<a href="<?php echo(base_url('home/prosedur'))?>"><i class="fa fa-adjust"></i></a>
                    <h2>Pendaftaran Santri Baru</h2>
                    <h3>Daftarkan Putra/Putri anda di DTA Nurul Anwar.</h3>
                </div>
            </div><!--/.col-md-4-->

        	<div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                    <a href="<?php echo base_url('home/profil') ?>"><i class="fa fa-info"></i></a>
                    <h2>Profil DTA Nurul Anwar</h2>
                    <h3>Lihat profil DTA Nurul Anwar. Sejarah berdiri, Legitimasi, Struktur organisasi, 
                           Bangunan, Guru pengajar</h3>
                </div>
            </div><!--/.col-md-4-->

        </div> 
    </div><!--/.row-->
            
    <div class="row">
        <div class="features">

        	<div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                    <a href="<?php echo base_url('home/kegiatan') ?>"><i class="fa fa-film"></i></a>
                    <h2>Kegiatan</h2>
                    <h3>Lihat kegiatan santri. </h3>
                </div>
            </div><!--/.col-md-4-->
        </div><!--/.services-->
    </div><!--/.row-->
</div>