<div class=" col-md-12 login-content">
  <div align="center">
    <?php if(isset($_SESSION)) {
      echo $this->session->flashdata('flash_data');
    } ?>
  </div>
  <div class="col-md-4"></div>  
  <div class="col-md-4">
    <?php echo form_open('register_controller/submit'); ?>
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control">
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
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group panel-captcha">
      <div class="image" align="center" style="margin-bottom:10px;"><?php echo $captcha_img;?></div>
      <div class="input-group">
        <input name="captcha" class="form-control" required>
        <span class="input-group-addon" id="basic-addon2">&nbsp;&nbsp;<?php echo "<a href='#' data-url='".base_url()."' class ='refresh'><i class='fa fa-refresh'></i>&nbsp;perbarui gambar</a>";?></span>
      </div>
      <?php
      $wrong = $this->input->get('cap_error');
      if($wrong)
      {
        ?>
        <span style="color:red;">Wrong Input capthca,please try again</span>
        <?php
      }
      ?>
    </div>
    <div align="center">
      <button type="submit" name="register" class="btn btn-success">Sign Up</button>
    </div>
    <?php echo form_close();?> 
  </div>  
  <div class="col-md-4"></div>  
</div>
