
<div class=" col-md-12 login-content">
	<div class="col-md-4"></div>  
	<div class="col-md-4">
		<?php echo form_open('contact_us_controller/submit'); ?>
		<div class="form-group">
			<label>name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<div class="input-group">
				<input type="text" name="email" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
				<div class="input-group-btn">
					<select type="button" style="padding: 7px 12px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default dropdown-toggle" name="type_email" class="dropdown-menu">
						<option value="@gmail.com">@gmail.com</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Password Email</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>Subject</label>
			<input type="text" name="subject" class="form-control">
		</div>
		<div class="form-group">
			<label>Message</label>
			<textarea type="text" name="msg" class="form-control" style="resize: none;"></textarea>
		</div>
		<div align="center">
			<button type="submit" name="register" class="btn btn-success">Send</button>
		</div>
		<?php echo form_close();?> 
	</div>  
	<div class="col-md-4"></div>  
</div>
