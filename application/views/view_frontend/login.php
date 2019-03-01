<?php 
if(isset($_COOKIE['remember_me_cookie'])) 
{
	if ($level=$this->session->userdata('level')=='admin') 
	{
		redirect('backend_controller/dashboard_controller/index');
	}
	else if($level=$this->session->userdata('level')=='guest')
	{
		redirect('backend_controller/dashboard_controller/dashboard_user');
	}
	
}
?>
<div class=" col-md-12 login-content">
	<div class="col-md-4"></div>	
	<div class="col-md-4">
		<div align="center">
			<?php if(isset($_SESSION)) {
				echo $this->session->flashdata('flash_data');
			} ?>
		</div>
		<br>
		<form action="<?= site_url('login_controller/auth') ?>" method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<div class="checkbox" align="center">
				<label>
					<input type="checkbox" autocomplete="off" id="remember_checkbox" data-url="<?php echo base_url(); ?>" name="remember_me_checkbox" > Remember me
				</label>
			</div>
			<div align="center" class="form-group">
				<button type="submit" class="btn btn-success" id="btn-login">Login</button>
			</div>
			<div class="form-group" align="center">
				<a  href="<?php echo site_url('forgot_password_controller/index')?>" style="color:black !Important;">Forgot Password</a>
			</div>
			<?php echo form_close(); ?>
		</div>	
		<div class="col-md-4"></div>	
	</form>
</div>


