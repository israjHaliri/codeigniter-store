<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 header-content"><h4>Detail Product</h4></div>
			<div class="col-md-3" align="center">hot product</div>
			<div class="col-md-8 detail-product">
				<?php
				if (count($data_detail) > 0) {
					foreach($data_detail as $row)
					{

						?>
						<div class="col-md-3">
							<img  class="img-responsive img-main" src= "<?php echo base_url().'assets/image/product/'.$row['image_shirt']; ?>">
						</div>
						<div class="col-md-9">
							<div class="col-md-6 title">
								<?php echo $row['title_product']; ?>
							</div>
							<div class="col-md-6 brand" align="right">
								Brand : <span class="detail_brand"> <?php echo  $row['brand_shirt']; ?></span>
							</div>
							<div class="col-md-12 head-price">Price : <span class="price"><?php echo $row['price_product'];?></span></div>
							<div class="col-md-12 desc"><?php echo  $row['describe_shirt']; ?></div>
							<div class="col-md-12 date" align="right"><?php echo  $row['date_publish']; ?></div>
							<div class="col-md-12 btn_char">
								<?php echo form_open_multipart('cart_controller/add'); ?>
								<input type="hidden" name="id_product" value="<?php echo $row['id_product'] ?>">
								<input type="hidden" name="title_product"  value="<?php echo $row['title_product'] ?>">
								<input type="hidden" name="barcode_product" value="<?php echo $row['barcode_shirt'] ?>">
								<input type="hidden" name="price_product" value="<?php echo $row['price_product'] ?>">
								<button type="submit" name="save" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
								<?php echo form_close();?> 
							</div>
						</div>
						<?php
					}
				} 
				else 
				{
					echo "
					<div class='alert alert-info' role='alert'>
						<a href='' class='alert-link'>Data Not Found</a>
					</div>
					";
				}

				?>
			</div>
		</div> 
	</div>
</div>

<?php  echo "<div class='col-md-12' align='center'>".$this->pagination->create_links()."</div>";?>