<?php 
if($this->session->userdata('username')){
	redirect('backend_controller/dashboard_controller/index');
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
		<form action="<?= site_url('forgot_password_controller/forgot_password') ?>" method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div align="center">
				<button type="submit" class="btn btn-success">Send</button>
			</div>
			<?php echo form_close(); ?>
		</div>	
		<div class="col-md-4"></div>	
	</form>
</div>


