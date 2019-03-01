<!-- <?php  print_r($search_keyword); ?> -->
<div class="col-md-12 search-form">
	<?php echo form_open_multipart('search_controller/index'); ?>
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<input type="text" name="search_keyword" class="form-control" aria-label="..."></li>
	</div>
	<div class="col-md-5">
		<div class="col-md-4">
			<select class="form-control" name="category">
				<option value="all">All Category</option>
				<option value="shirt">Shirt</option>
				<option value="pant">Pant</option>
				<option value="merchand">Merchand</option>
			</select>
		</div>
		<div class="col-md-4">
			<select class="form-control" name="min-price">
				<option value="0">min price</option>
				<option value="500000">500.000</option>
				<option value="200000">200.000</option>
				<option value="100000">100.000</option>
				<option value="50000">50.000</option>
				<option value="10000">10.000</option>
			</select>
		</div>
		<div class="col-md-4">
			<select class="form-control" name="max-price">
				<option value="1000000000000">max price</option>
				<option value="50000">50.000</option>
				<option value="100000">100.000</option>
				<option value="200000">200.000</option>
				<option value="500000">500.000</option>
				<option value="1000000">1000.000</option>
			</select>
		</div>
	</div>
	<div class="col-md-1" align="right">
		<button type="submit" name="search" class="btn btn-info btn-search">Search <i class="glyphicon glyphicon-search"></i></button></a>
	</div>
	<div class="col-md-1"></div>
	<?php echo form_close();?>
</div>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 header-content">
					
					<?php 
					if (!empty($search_keyword)) 
					{
						echo "<h4>Result </h4>";
					}
					else if (empty($search_keyword)) 
					{
						echo "<h4>All Product </h4>";	
					}
					?>
			</div>
			<div class="col-md-12">
				<?php
				if (count($list_product) > 0) {
					foreach($list_product as $row)
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
											<a href="<?php echo base_url().'/home_controller/detail_product/'.$row['slug']?>" class="btn btn-primary btn-product"><span class="glyphicon glyphicon-search"></span> Detail</a> 
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

<?php  echo "<div class='col-md-12' align='center'>".$this->pagination->create_links()."</div>";?>