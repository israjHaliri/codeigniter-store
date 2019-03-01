<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=merchand_data.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Title Product</th>
			<th>Price Product</th>
			<th>Date Publish</th>
			<th>Brand</th>
			<th>Barcode </th>
			<th>Size </th>
			<th>Describe</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach($list_data as $row):?>
		<tr>
			<td><?= $no++;?></td>
			<td><?php echo $row->title_product ?></td>
			<td><?php echo $row->price_product ?></td>
			<td><?php echo $row->date_publish ?></td>
			<td><?php echo $row->brand_merchand ?></td>
			<td><?php echo $row->barcode_merchand ?></td>
			<td><?php echo $row->size_merchand ?></td>
			<td><?php echo $row->describe_merchand ?></td>
		</tr>
	<?php endforeach ?>
</tbody>
</table>