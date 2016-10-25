<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        <!-- Modul Daftar -->        
        <li>
        	<a href="#"><i class="fa fa-user"></i> Pendaftaran
        	<span class="fa arrow"></span>
        	</a>
            <ul class="nav nav-second-level">
            <!--<li> <a href="<?php echo base_url('admin/daftar') ;?>">Data Pendaftaran</a> </li>-->
            <!--<li> <a href="<?php echo base_url('admin/daftar/tambah') ;?>">Tambah Pendaftaran</a> </li> -->
            <li> <a href="<?php echo base_url('admin/santri') ;?>">Data Santri</a> </li>
            <li> <a href="<?php echo base_url('admin/santri/tambah') ;?>">Tambah Santri</a> </li>
            </ul>
        </li>
        Modul Berita       
        <li>
        	<a href="#"><i class="fa fa-newspaper-o"></i> Berita
        	<span class="fa arrow"></span>
        	</a>
            <ul class="nav nav-second-level">
            <li> <a href="<?php echo base_url('admin/berita') ;?>">Data Berita</a> </li>
            <li> <a href="<?php echo base_url('admin/berita/tambah') ;?>">Tambah Berita</a> </li>
            <li> <a href="<?php echo base_url('admin/kategori_berita') ;?>">Kategori Berita</a> </li>
            </ul>
        </li>
        <!-- Modul Site -->        
        <!--<li>
        	<a href="#"><i class="fa fa-home"></i> Site
        	<span class="fa arrow"></span>
        	</a>
            <ul class="nav nav-second-level">
            	<li> <a href="<?php echo base_url('admin/site') ;?>">Data Situs</a> </li>
            	<li> <a href="<?php echo base_url('admin/site/tambah') ;?>">Tambah Site</a> </li>
            </ul>
        </li> -->
        
        <!-- Modul User -->        
        <li>
        	<a href="#"><i class="fa fa-user"></i> Administrator
        	<span class="fa arrow"></span>
        	</a>
            <ul class="nav nav-second-level">
            <li> <a href="<?php echo base_url('admin/user') ;?>">Data Admin</a> </li>
            <li> <a href="<?php echo base_url('admin/user/tambah') ;?>">Tambah Admin</a> </li>
            </ul>
        </li>  
        </ul>
     </div>
</nav>  
        <!-- /. NAV SIDE  -->
<div id="page-wrapper" >
	<div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $title ;?></h2>   
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
    <div class="row">
        <div class="col-md-12">
        <!-- Advanced Tables -->
        	<div class="panel panel-default">
            <div class="panel-body">
            <div class="table-responsive">