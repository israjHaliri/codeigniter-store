<div class="col-sm-12 myuser">
   <div class="grid">
      <div class="panel panel-default">
         <div class="panel-heading black-chrome">List Data</div>
         <div class="panel-body "  style=" overflow: scroll;">
            <div class="col-md-12 div-list-pant">
               <table id="list-pant" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Title Product</th>
                        <th>Price Product</th>
                        <th>Brand</th>
                        <th>Barcode pant</th>
                        <th>Image pant</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no_id=1; $no = 1; foreach($list_data as $row):?>
                     <tr>
                        <td><?= $no++;?></td>
                        <td><?php echo $row->title_product ?></td>
                        <td><?php echo $row->price_product ?></td>
                        <td><?php echo $row->brand_pant ?></td>
                        <td><?php echo $row->barcode_pant ?></td>
                        <td align="center"><img class="index_foto" src= "<?php echo base_url().'assets/image/product/'.$row->image_pant; ?>"></td>
                        <td>
                           <a href=""><?php echo anchor(base_url().'backend_controller/pant_controller/delete_data/'. $row->id_pant  ,'<button class="btn btn-danger">Delete &nbsp;<i class=" glyphicon glyphicon-remove"></i></button>') ?></a>
                           <a href=""><?php echo anchor(base_url().'backend_controller/pant_controller/edit/'. $row->slug,'<button class="btn btn-success">Edit &nbsp;<i class=" glyphicon glyphicon-edit"></i></button>') ?></a>
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