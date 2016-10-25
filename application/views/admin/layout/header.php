<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ;?>">Dashboard</a> 
    </div>
	<div style="color: white;
		padding: 15px 50px 5px 50px;
		float: right;
		font-size: 16px;"> 
		<?php
			date_default_timezone_set("Asia/Jakarta");
			echo date ('d M Y');
		// ambil id dari user_model dengan id dari data login
		$id_user	= $this->session->userdata('id');
		$user_login	=$this->user_model->detail($id_user);
		?>
		 &nbsp; 
		 <a href="<?php echo base_url('admin/dashboard/profil') ?>" class="btn btn-danger square-btn-adjust">
		 <i class="fa fa-user"></i> <?php echo $user_login->nama ?> (<?php echo $user_login->username ?>)</a>
		<a href="<?php echo base_url('login/logout') ;?>" class="btn btn-danger square-btn-adjust">
		<i class="fa fa-sign-out" ></i>Logout</a> 
	</div>
</nav>   