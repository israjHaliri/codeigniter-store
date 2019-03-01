<div class="col-sm-12">
	<div class="grid">
		<div class="panel panel-default">
			<div class="panel-heading black-chrome">Edit Data</div>
			<div class="panel-body "  style=" overflow: scroll">
				<div align="center">
					<?php if(isset($_SESSION)) {
						echo $this->session->flashdata('flash_data');
					} ?>
				</div>
				<div class="col-md-12">
					<?php foreach ($data_edit as $val) {?>
					<div class="col-md-12">
						<?php echo form_open_multipart('backend_controller/pant_controller/edit_data') ?>
						<div class="form-group">
							<input type="hidden" name="id_pant" class="form-control" value="<?php echo $val->id_pant ?>">
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title_product" class="form-control" value="<?php echo $val->title_product ?>" required>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price_product" class="form-control" value="<?php echo $val->price_product ?>" required>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date"  name="date_publish" class="form-control"  value="<?php echo $val->date_publish ?>" required>
						</div>
						<div class="form-group">
							<label>Barcode</label>
							<input type="text" name="barcode_pant" class="form-control " value="<?php echo $val->barcode_pant ?>" readonly>
						</div>
						<div class="form-group">
							<label>Brand</label>
							<input type="text" name="brand_pant" class="form-control" value="<?php echo $val->brand_pant ?>" required>
						</div>
						<div class="form-group">
							<label>Size</label>
							<select class="form-control" name="size_pant">
								<option value="XXS" <?php if($val->size_pant == 'XXS'){ echo 'selected'; } ?> >XXS</option>
								<option value="XS" <?php if($val->size_pant == 'XS'){ echo 'selected' ;} ?> >XS</option>
								<option value="S" <?php if($val->size_pant == 'S'){ echo 'selected'; } ?> >S</option>
								<option value="M" <?php if($val->size_pant == 'M'){ echo 'selected'; } ?>>M</option>
								<option value="L" <?php if($val->size_pant == 'XL'){ echo 'selected'; } ?> >L</option>
								<option value="XL" <?php if($val->size_pant == 'XL'){ echo 'selected'; } ?> >XL</option>
								<option value="XXL" <?php if($val->size_pant == 'XXL'){ echo 'selected'; } ?> >XXL</option>
							</select>
						</div>
						<div class="form-group">
							<label>Descirbe</label>
							<textarea name="describe_pant" class="ckeditor" class="form-control"  required><?php echo $val->describe_pant ?></textarea> 
						</div>
						<div class="form-group">
							<label>Image</label>
							<input  type="file" name="userfile" id="input-foto" accept="image/x-png, image/gif, image/jpeg , image/jpg" class="form-control" >
							<br>
							<img class="show_foto" id="div_image_edit" src= "<?php echo base_url().'assets/image/product/'.$val->image_pant ?>">
						</div>
						<input type="submit" name="save" value="save" class="btn btn-success">		
						<?php echo form_close()?>
					</div>		
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>