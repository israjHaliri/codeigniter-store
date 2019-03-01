<div class="row">
	<div class="col-md-12 nav-table myuser" >
		<div class="grid">
			<form  action="<?php echo site_url('backend_controller/user_controller/index'); ?>" method="post">
				<div class="col-md-4" align="left" >
					<div class="input-group search" style=" padding-top:10px;">
						<input type="text" class="form-control" name="keyword">
						<span class="input-group-btn">
							<button class="btn btn-default" name="search" type="submit"><i class=" glyphicon glyphicon-search" ></i></button>							
						</span>
					</div>		
				</div>
				<div class="col-md-4" style=" padding-top:10px;">
					<?php 
					if (!empty($_SESSION['sess_search_keyword'])) 
					{
						echo '<button class="btn btn-default" name="search" type="submit"><i class=" glyphicon glyphicon-search" ></i> Show All Data</button>';
					}
					?>
				</div>
				<div class="col-md-4 td-action" align="right" style=" padding-top:10px;">
					<a class="btn btn-success" href="<?php echo site_url('backend_controller/user_controller/insert')?>">New &nbsp; <i class=" glyphicon glyphicon-plus"></i></a>
				</div>
			</form>
		</div>
	</div>
	<div class="col-sm-12 myuser">
		<div class="grid">
			<div class="panel panel-default">
				<div class="panel-heading black-chrome">List Data</div>
				<div class="panel-body "  style=" overflow: scroll;">
					<table class="table table-no-margin table-striped table-bordered table-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Email</th>	
								<th>Status</th>
								<th>Level</th>
								<th>Images</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1; 
							if (count($list_data) > 0) {
								foreach($list_data as $row)
								{
									echo "<div class=\"letter\">";
									?>

									<tr>
										<td><?= $no++;?></td>	
										<td valign="top"><?php echo $row['username']; ?></td>
										<td valign="top"><?php echo $row['email']; ?></td>
										<td valign="top"><?php echo $row['active']; ?></td>
										<td valign="top"><?php echo $row['level']; ?></td>
										<td align="center"><img class="index_foto" src= "<?php echo base_url().'assets/image/'.$row['image']; ?>"></td>
										<td align="center" class="td-action">
											<a href=""><?php echo anchor(base_url().'backend_controller/user_controller/delete_data/'. $row['id_user'],'<button class="btn btn-danger">Delete &nbsp;<i class=" glyphicon glyphicon-remove"></i></button>') ?></a>
											<a href=""><?php echo anchor(base_url().'backend_controller/user_controller/edit/'. $row['slug'],'<button class="btn btn-success">Edit &nbsp;<i class=" glyphicon glyphicon-edit"></i></button>') ?></a>
										</td>
									</tr>

									<?php
									echo "</div>";
								}

							} else {
								echo "
								<tbody>
									<tr>
										<td colspan=7;>
											<div class='alert alert-info' role='alert'>
												<a href='' class='alert-link'>Data Not Found</a>
											</div>
										</td>
									</tr>
								</tbody>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php  echo "<div class='col-md-12' align='center'>".$this->pagination->create_links()."</div>";?>
</div>




