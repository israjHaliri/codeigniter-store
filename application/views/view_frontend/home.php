<div class="col-md-12 carousel-front">
	<div class="row">
		<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
					<div class="thumbnail">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/image/shirt.jpg">
					</div>
				</li>
				<li data-target="#thumbnail-preview-indicators" data-slide-to="1">
					<div class="thumbnail">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/image/pants.jpg">
					</div>
				</li>
				<li data-target="#thumbnail-preview-indicators" data-slide-to="2">
					<div class="thumbnail">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/image/hat.jpg">
					</div>
				</li>
			</ol>
			<div class="carousel-inner">
				<div class="item slides active">
					<div class="slide-1"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>Open Price</h1>
							<h1>RP. 120.000 for Shirt</h1>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-2"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>Open Price</h1>
							<h1>RP. 120.000 for Pants</h1>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-3"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>Open Price</h1>
							<h1>RP. 120.000 for Mercand</h1>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div> 
	</div>
</div>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 header-content"><h4>Hot List</h4></div>
			<div class="col-md-12">
				<!-- <div class="col-md-12" style="margin-bottom:10px;" align="right"><a href="<?php echo base_url().'home_controller/detail_product' ?>" class="btn btn-info">See All Hot List &nbsp;<i class="glyphicon glyphicon-arrow-right"></i></a></div> -->
				<?php
				if (count($list_product_hot_limit) > 0) {
					foreach($list_product_hot_limit as $row)
					{

						?>
						<div class="col-sm-3 col-md-3">
							<div class="thumbnail content-post-child" >
								<h4 class="text-center"><span class="label label-info"><?php $brand=$row['brand_shirt']; echo substr($brand,0,10);?></span></h4>
								<img  class="img-responsive" src= "<?php echo base_url().'assets/image/product/'.$row['image_shirt']; ?>">
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
												<input type="hidden" name="barcode_product" value="<?php echo $row['barcode_shirt'] ?>">
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
