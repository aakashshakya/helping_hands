<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th width="24"><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th width="17">Id</th>
    <th width="113">Material Name</th>
    <th width="64">Material Quantity</th>
    <th width="67">Type</th>
     <th width="67">Description</th>
    <th width="42">Status</th>
    <th width="67">Action</th>
  </tr>
 <?php foreach($materials as $material){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $material['material_id']?></td>
    <td><?php echo $material['material_name']?></td>
    <td><?php echo $material['material_quantity']?></td>
    <td><?php echo $material['type_name']?></td>
    <td><?php echo $material['description']?></td>
    <td><?php echo $material['status']?></td>
    <td><a href="<?php echo site_url('materials/admin/materials/edit/'.$material['material_id'])?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)" class="btn btn-danger" onclick="return material.delete('<?php echo $material['material_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>