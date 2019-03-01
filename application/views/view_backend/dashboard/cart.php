<div class="col-sm-12 myuser">
	<div class="grid">
		<div class="panel panel-default">
			<div class="panel-heading black-chrome">List Data</div>
			<div class="panel-body "  style=" overflow: scroll;">
				<div class="col-md-12 div-list-shirt">
					
					<?php echo form_open('cart_controller/update'); ?>
					<table id="list-cart-admin" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Title Product</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Barcode Product</th>
								<th>First Name</th>
								<th>last Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php  $no = 1; foreach ($cart_content as $items):?>
							
							<tr>
								<td><?= $no++;?></td>
								<td><?php echo $items['name']; ?></td>
								<td>
									<?php echo form_input('cart[' . $items['id'] . '][qty]', $items['qty']); ?>
									<?php echo form_hidden('cart[' . $items['id'] . '][rowid]', $items['rowid']); ?>
								</td>
								<td><?php echo $items['price']; ?></td>
								<td><?php echo $items['barcode']; ?></td>
								<td><?php echo $items['firstname']; ?></td>
								<td><?php echo $items['lastname']; ?></td>
								<td><?php echo $items['email']; ?></td>
								<td>
									<button type="submit" class="btn btn-success">Edit &nbsp;<i class=" glyphicon glyphicon-edit"></i></button>			
									
									<?php
									$path = '<span class="btn btn-danger"><i class=" glyphicon glyphicon-remove"></i>&nbsp;Delete</span>';
									echo anchor('cart_controller/remove/' . $items['rowid'], $path); ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
</div>