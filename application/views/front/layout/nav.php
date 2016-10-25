<header id="header">
<div class="top-bar">
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <img class="img-responsive" src="<?php echo base_url('assets/images/header.jpg')?>"/>
        </div>            
        </div>
	</div><!--/.container-->
</div><!--/.top-bar-->
		<!-- Navigasi -->
        <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
        	<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        	</div>
				<!-- Menu bar -->
        	<div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url()?>">Beranda</a></li>
                <li><a href="<?php echo base_url('home/profil')?>">Profil</a></li>
                <li class="dropdown">
               		 <a href="<?php echo base_url('home/prosedur')?>" class="dropdown-toggle" data-toggle="dropdown">
               		 Pendaftaran<i class="fa fa-angle-down"></i></a>
                	<ul class="dropdown-menu">
                		<li><a href="<?php echo base_url('home/prosedur')?>">Daftar</a></li>
                		<li><a href="<?php echo base_url('admin/santri/data_santri')?>">Lihat Data</a></li>
                	</ul>
                </li>
                <li><a href="<?php echo base_url('home/kegiatan')?>">Kegiatan</a></li>
                <li><a href="<?php echo base_url('login')?>" target="_blank" class="btn btn-primary"><i class="fa fa-key">Login</i></a></li>
            </ul>
        	</div> <!-- /. Menu bar -->
        </div><!--/.container-->
        </nav><!--/Navigasi-->
</div>		
</header><!--/header-->
