<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 header-content"><h4>All Pant</h4></div>
			<div class="col-md-12">
				<?php
				if (count($list_data_pant) > 0) {
					foreach($list_data_pant as $row)
					{

						?>
						<div class="col-sm-3 col-md-3">
							<div class="thumbnail content-post-child" >
								<h4 class="text-center"><span class="label label-info"><?php $brand=$row['brand_pant']; echo substr($brand,0,10);?></span></h4>
								<img  class="img-responsive" src= "<?php echo base_url().'assets/image/product/'.$row['image_pant']; ?>">
								<div class="caption">
									<div class="col-md-12 desc">
										<div align="center" class="col-md-12 col-xs-12 title-product">
											<?php $title=$row['title_product']; echo substr($title,0,8);?>
										</div>
										<div align="center" class="col-md-12 col-xs-12 price">
											<?php $price=$row['price_product'];echo "Rp : "; echo substr($price,0,8);?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<a href="<?php echo base_url().'home_controller/detail_product/'.$row['slug']?>" class="btn btn-primary btn-product"><span class="glyphicon glyphicon-search"></span> Detail</a> 
										</div>
										<div class="col-md-6">
											<?php echo form_open_multipart('cart_controller/add'); ?>
												<input type="hidden" name="id_product" value="<?php echo $row['id_product'] ?>">
												<input type="hidden" name="title_product"  value="<?php echo $row['title_product'] ?>">
												<input type="hidden" name="barcode_product" value="<?php echo $row['barcode_pant'] ?>">
												<input type="hidden" name="price_product" value="<?php echo $row['price_product'] ?>">
											<button type="submit" name="save" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
											<?php echo form_close();?> 
										</div>
									</div>
								</div>
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