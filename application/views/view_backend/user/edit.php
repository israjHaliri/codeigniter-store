<div class="col-sm-12">
	<div class="grid">
		<div class="panel panel-default">
			<div class="panel-heading black-chrome">Edit Data</div>
			<div class="panel-body "  style=" overflow: scroll;">
				<div align="center">
					<?php if(isset($_SESSION)) {
						echo $this->session->flashdata('flash_data');
					} ?>
				</div>
				<div class="col-md-12">
					<?php foreach ($data_edit as $val) {?>
					<?php echo form_open_multipart('backend_controller/user_controller/edit_data'); ?>
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" name="id_user" class="form-control" value="<?php echo $val->id_user ?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $val->username ?>" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="firstname" class="form-control" value="<?php echo $val->firstname ?>" readonly>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lastname" class="form-control" value="<?php echo $val->lastname ?>" readonly>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="<?php echo  base64_decode($val->password) ?>" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $val->email ?>" readonly>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="active">
								<option value="1" <?php if($val->active == '1'){ echo 'selected'; } ?> >Active</option>
								<option value="0" <?php if($val->active == '0'){ echo 'selected'; } ?>>Non Active</option>
							</select>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="level">
								<option value="admin" <?php if($val->level == 'admin'){ echo 'selected'; } ?> >Admin</option>
								<option value="guest" <?php if($val->level == 'guest'){ echo 'selected'; } ?>>Guest</option>
							</select>
						</div>		
						<div class="form-group">
							<label>Image</label>
							<input  type="file" name="userfile" id="input-foto" accept="image/x-png, image/gif, image/jpeg , image/jpg" class="form-control" value="<?php echo $val->image ?>" >
							<br>
							<img class="show_foto" id="div_image_edit" src= "<?php echo base_url().'assets/image/'.$val->image ?>">
						</div>
						<input type="submit" name="save" value="save" class="btn btn-success">				
					</div>
					<?php echo form_close();?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>