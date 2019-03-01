<div class="col-sm-12 myuser">
   <div class="grid">
      <div class="panel panel-default">
         <div class="panel-heading black-chrome">List Data</div>
         <div class="panel-body "  style=" overflow: scroll;">
            <div class="col-md-12 div-list-shirt">
               <table id="list-shirt" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Title Product</th>
                        <th>Price Product</th>
                        <th>Brand</th>
                        <th>Barcode Shirt</th>
                        <th>Image Shirt</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no_id=1; $no = 1; foreach($list_data as $row):?>
                     <tr>
                        <td><?= $no++;?></td>
                        <td><?php echo $row->title_product ?></td>
                        <td><?php echo $row->price_product ?></td>
                        <td><?php echo $row->brand_shirt ?></td>
                        <td><?php echo $row->barcode_shirt ?></td>
                        <td align="center"><img class="index_foto" src= "<?php echo base_url().'assets/image/product/'.$row->image_shirt; ?>"></td>
                        <td>
                           <a href=""><?php echo anchor(base_url().'backend_controller/shirt_controller/delete_data/'. $row->id_shirt  ,'<button class="btn btn-danger">Delete &nbsp;<i class=" glyphicon glyphicon-remove"></i></button>') ?></a>
                           <a href=""><?php echo anchor(base_url().'backend_controller/shirt_controller/edit/'.$row->slug,'<button class="btn btn-success">Edit &nbsp;<i class=" glyphicon glyphicon-edit"></i></button>') ?></a>
                        </td>
                     </tr>
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>