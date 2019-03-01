<div class="col-sm-12">
	<div class="grid">
		<div class="panel panel-default">
			<div class="panel-heading black-chrome">Add Data</div>
			<div class="panel-body "  style=" overflow: scroll;">
				<div align="center" class="col-md-12" style="margin-left:25px;">
					<?php if(isset($_SESSION)) {
						echo $this->session->flashdata('flash_data');
					} ?>
				</div>
				<div class="col-md-12">
					<?php echo form_open_multipart('backend_controller/user_controller/insert_data'); ?>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="firstname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lastname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="active">
							<option value="1">Active</option>
							<option value="0">Non Active</option>
						</select>
					</div>
					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name="level">
							<option value="admin">Admin</option>
							<option value="guest">Guest</option>
						</select>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="userfile" class="form-control" id="input-foto" accept="image/x-png, image/gif, image/jpeg , image/jpg">
						<br>
						<img class="show_foto" src="#" id="div_image">
					</div>
					<input type="submit" name="save" value="save" class="btn btn-success">
					<?php echo form_close();?> 
				</div>
			</div>
		</div>
	</div>
</div>