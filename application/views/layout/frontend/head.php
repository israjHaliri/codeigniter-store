<!DOCTYPE html>
<html>
<head>
	<title>Whole Saler</title>
	<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/frontend/custom.css')?>" rel="stylesheet">
</head>
<body>
	<div class="green col-md-12">
		<div class="col-md-12 head1-front ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<ul>			
							<li>
								<span class="first-menu">
									<a href="<?php echo site_url('login_controller/index')?>">
										<?php 
										$email=$this->session->userdata('email');
										if (isset($email))
										{
											echo "Dashboard";
										}
										else
										{
											echo "Login";
										}    
										?>
									</a>
								</span>
							</li>
							<li><span class="first-menu"><a href="<?php echo site_url('register_controller/index')?>">Register</a></span></li>
							<li><span class="end-menu"><a href="<?php echo site_url('home_controller/index')?>">Home</a></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 head2-front">
			<div class="container">
				<nav class="navbar navbar-default yellow">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo site_url('home_controller/index')?>"><span class="brand"><strong>O</strong><small>boss!</small></span></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li><a href="<?php echo base_url('home_controller/all_shirt')?>">Shirt</a></li>
							<li><a href="<?php echo base_url('home_controller/all_pant')?>">Pants</a></li>
							<li><a href="<?php echo base_url('home_controller/all_merchand')?>">Merchand</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url('search_controller/index')?>"><button class="btn btn-info btn-search">Search <i class="glyphicon glyphicon-search"></i></button></a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div><!-- /.container-fluid -->
		</div>
		<div class="col-md-12 image-head"><img src="<?php echo base_url(); ?>assets/image/splash.png"></div>
	</div>